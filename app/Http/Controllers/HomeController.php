<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\User;
use App\Models\School;
use App\Models\Student;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class HomeController extends Controller
{
    public function login()
    {
        return view('student.login');
    }

    public function student_login(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|max:255',
            'password' => 'required|max:255',
        ]);

        if (Auth::attempt($validate) == true && Auth::user()->role == 'student' && Student::where('user_id', Auth::id())->count() == 1)
        {
            return redirect()->route('student.card');
        } else {
            return back()->withErrors(['name' => __('')]);
        }

    }

    public function register()
    {
        $schools = School::all();
        return view('student.register', ['schools' => $schools]);
    }

    public function student_register(Request $request)
    {
        //dd($request->all());
        $validate = $request->validate([
            'code' => 'required|max:255|unique:users,name',
            'pin' => 'required|max:255',
            'password' => 'required|confirmed|min:8',
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'pesel' => 'required|numeric|digits:11',
            'school' => 'required',
            'checkbox' => 'required',
        ]);

        if (Student::where('pesel', Crypt::encrypt($request->pesel))->get()->count() == 0)
        {
            $card = Card::where('code', $request->code)->where('password', $request->pin)->first();
            if ($card != null)
            {
                $user = User::create([
                    'name' => $validate['code'],
                    'email' => $validate['email'],
                    'password' => Hash::make($validate['password']),
                    'role' => 'student',
                ]);

                $student = Student::create([
                    'user_id' => $user->id,
                    'school_id' => $validate['school'],
                    'card_id' => $card->id,
                    'firstname' => $validate['firstname'],
                    'lastname' => $validate['lastname'],
                    'pesel' => Crypt::encrypt($validate['pesel']),
                ]);

                $login = [
                    'name' => $validate['code'],
                    'password' => $validate['password']
                ];

                Auth::attempt($login);

                return redirect()->route('student.card');

            } else {
                return back()->with(['carderr' => true]);
            }

        } else {
            return back()->with(['peselerr' => true]);
        }
    }

    public function card()
    {
        QrCode::size(250)->format('png')->generate('ItSolutionStuff.com', public_path('images/qrcode.png'));
        $student = Student::where('user_id', Auth::id())->with('card', 'school')->first();
        return view('student.card', ['student' => $student]);
    }

    public function logout(Request $request)
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('student.login');
    }

    public function loginr()
    {
        return redirect()->route('student.card');
    }

    public function redirect()
    {
        if (Auth::check())
        {
            return redirect()->route('student.card');
        } else {
            return redirect()->route('student.login');
        }
    }
}
