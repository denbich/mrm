@extends('layouts.app')

@section('title') Zarejestruj kartę @endsection

@section('content')
<nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3 navbar-transparent mt-4">
    <div class="container">
      <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 text-white" href="">
        <img src="{{ url('/assets/img/logos/mrm.png') }}" style="max-height:60px;" alt="">
      </a>
      <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon mt-2">
          <span class="navbar-toggler-bar bar1"></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </span>
      </button>
      <div class="collapse navbar-collapse" id="navigation">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center me-2 font-weight-bold" aria-current="page" href="">
              <i class="fa fa-home opacity-6  me-1"></i>
              Strona główna
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link me-2 font-weight-bold" href="">
              <i class="fa fa-info-circle opacity-6  me-1"></i>
              O karcie MRM
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link me-2 font-weight-bold text-danger" href="{{ route('student.login') }}">
              <i class="fas fa-user-circle opacity-6  me-1"></i>
              Uczeń
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link me-2 font-weight-bold" href="">
              <i class="fas fa-building opacity-6  me-1"></i>
              Firma
            </a>
          </li>
        </ul>
        <ul class="navbar-nav d-lg-block d-none">
          <li class="nav-item">
            <a href="https://facebook.com/MRMRybnika" class="btn btn-sm mb-0 me-1 bg-gradient-light">Facebook</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
  <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signup-cover.jpg'); background-position: top;">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5 text-center mx-auto">
            <h1 class="text-white mb-2 mt-5">Zarejestruj się</h1>
            <p class="text-lead text-white">Elektroniczna Karta Rabatowa MRM</p>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center">
        <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
          <div class="card z-index-0">
            <div class="card-body">
                @if (session('peselerr') == true)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                    <span class="alert-text"><strong>Błąd!</strong> Na ten pesel jest już zarejestrowane konto!</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                @if (session('carderr') == true)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                    <span class="alert-text"><strong>Błąd!</strong> Na tą kartę jest już zarejestrowane konto!</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
              <form role="form" method="post" action="{{ route('student.register') }}">
                  @csrf
                  <div class="mb-3">
                    <input type="text" name="code" class="form-control form-control-lg" placeholder="Numer karty" aria-label="code" value="{{ old('code', '') }}" required>
                    @error('code')
                    <span class="text-danger small" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                  </div>
                  <div class="mb-3">
                    <input type="text" name="pin" class="form-control form-control-lg" placeholder="Jednorazowy PIN" aria-label="pin" value="{{ old('pin', '') }}" required>
                    @error('pin')
                    <span class="text-danger small" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                  </div>
                  <div class="mb-3">
                    <input type="password" name="password" class="form-control form-control-lg" placeholder="Hasło" aria-label="password" required>
                    @error('password')
                    <span class="text-danger small" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                  </div>
                  <div class="mb-3">
                    <input type="password" name="password_confirmation" class="form-control form-control-lg" placeholder="Powtórz hasło" aria-label="password_confirmation" required>
                    <small>Hasło musi składać się z minimum 8 znaków</small>
                  </div>
                  <div class="mb-3">
                      <input type="text" name="firstname" class="form-control form-control-lg" placeholder="Imię" aria-label="firstname" value="{{ old('firstname', '') }}" required>
                      @error('firstname')
                      <span class="text-danger small" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                    </div>
                    <div class="mb-3">
                      <input type="text" name="lastname" class="form-control form-control-lg" placeholder="Nazwisko" aria-label="lastname" value="{{ old('lastname', '') }}" required>
                      @error('lastname')
                      <span class="text-danger small" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                    </div>
                    <div class="mb-3">
                        <input type="email" name="email" class="form-control form-control-lg" placeholder="Adres email" aria-label="email" value="{{ old('email', '') }}" required>
                        @error('email')
                        <span class="text-danger small" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                      </div>
                    <div class="mb-3">
                      <input type="text" name="pesel" class="form-control form-control-lg" placeholder="PESEL" aria-label="pesel" value="{{ old('pesel', '') }}" required>
                      @error('pesel')
                      <span class="text-danger small" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Szkoła, do której uczęszczasz</label>
                        <select class="form-control form-control-lg" name="school" id="" placeholder="Wybierz szkołę...">
                            <option disabled>Wybierz szkołę...</option>
                            @foreach ($schools as $school)
                                <option value="{{ $school->id }}">{{ $school->name }}</option>
                            @endforeach
                        </select>
                        @error('school')
                        <span class="text-danger small" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                      </div>
                <div class="form-check form-check-info text-start">
                  <input name="checkbox" class="form-check-input" type="checkbox" id="flexCheckDefault" required>
                  <label class="form-check-label" for="flexCheckDefault">
                    Akceptuję <a href="javascript:;" class="text-dark font-weight-bolder">Regulamin Karty Rabatowej MRM</a>
                  </label>
                  @error('checkbox')
                      <span class="text-danger small" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary w-100 my-4 mb-2">Zarejestruj się</button>
                </div>
                <p class="text-sm mt-3 mb-0">Masz już konto? <a href="{{ route('student.login') }}" class="text-dark font-weight-bolder">Zaloguj się</a></p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <footer class="footer py-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mb-4 mx-auto text-center">
          <a href="javascript:;" target="_blank" class="text-dark me-xl-5 me-3 mb-sm-0 mb-2">
            Facebook
          </a>
          <a href="javascript:;" target="_blank" class="text-dark me-xl-5 me-3 mb-sm-0 mb-2">
            Regulamin
          </a>
          <a href="javascript:;" target="_blank" class="text-dark me-xl-5 me-3 mb-sm-0 mb-2">
            Polityka Prywatności
          </a>
        </div>
      </div>
      <div class="row">
        <div class="col-8 mx-auto text-center mt-1">
          <p class="mb-0 text-dark">
            Copyright © {{ date('Y') }} Młodzieżowa Rada Miasta Rybnika.
          </p>
        </div>
      </div>
    </div>
  </footer>

@endsection
