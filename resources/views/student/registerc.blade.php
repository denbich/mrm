@extends('layouts.app')

@section('title') Zarejestruj się @endsection

@section('content')
<div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg blur border-radius-lg top-0 z-index-3 shadow position-absolute mt-4 py-2 start-0 end-0 mx-4">
          <div class="container-fluid">
            <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3" href="">
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
                  <a class="nav-link d-flex align-items-center me-2 active font-weight-bold" aria-current="page" href="">
                    <i class="fa fa-home opacity-6 text-dark me-1"></i>
                    Strona główna
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link me-2 font-weight-bold" href="">
                    <i class="fas fa-info-circle opacity-6 text-dark me-1"></i>
                    O karcie MRM
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link me-2 font-weight-bolder text-danger" href="{{ route('student.login') }}">
                    <i class="fas fa-user-circle opacity-6 text-dark me-1"></i>
                    Uczeń
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link me-2 font-weight-bold" href="">
                    <i class="fas fa-building opacity-6 text-dark me-1"></i>
                    Firma
                  </a>
                </li>
              </ul>
              <ul class="navbar-nav d-lg-block d-none">
                <li class="nav-item">
                  <a href="https://facebook.com/MRMRybnika" class="btn btn-sm mb-0 me-1 btn-primary text-dark">Facebook</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <!-- End Navbar -->
      </div>
    </div>
  </div>
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
              <div class="card card-plain mt-5">
                <div class="card-header pb-0 text-start">
                  <h4 class="font-weight-bolder">Zarejestruj się</h4>
                  <p class="mb-0">Elektroniczna Karta Rabatowa MRM</p>
                </div>
                <div class="card-body">
                  <form role="form" method="post" action="{{ route('student.register') }}">
                      @csrf
                    <div class="mb-3">
                      <input type="text" name="name" class="form-control form-control-lg" placeholder="Numer karty" aria-label="code" required>
                      @error('name')
                      <span class="text-danger small" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                    </div>
                    <div class="mb-3">
                      <input type="text" name="pin" class="form-control form-control-lg" placeholder="Jednorazowy PIN" aria-label="pin" required>
                      @error('pin')
                      <span class="text-danger small" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                    </div>
                    <div class="mb-3">
                        <input type="text" name="firstname" class="form-control form-control-lg" placeholder="Imię" aria-label="firstname" required>
                        @error('firstname')
                        <span class="text-danger small" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                      </div>
                      <div class="mb-3">
                        <input type="text" name="lastname" class="form-control form-control-lg" placeholder="Nazwisko" aria-label="lastname" required>
                        @error('lastname')
                        <span class="text-danger small" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                      </div>
                      <div class="mb-3">
                        <input type="number" name="pesel" class="form-control form-control-lg" placeholder="PESEL" aria-label="pesel" required>
                        @error('pesel')
                        <span class="text-danger small" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                      </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-2 mb-0">Zarejestruj się</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-4 text-sm mx-auto">
                    Masz już konto?
                    <a href="{{ route('student.login') }}" class="font-weight-bold">Zaloguj się</a>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
              <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signin-ill.jpg');
          background-size: cover;">
                <span class="mask bg-gradient-primary opacity-6"></span>
                <h4 class="mt-5 text-white font-weight-bolder position-relative">GRAFIKA PROMUJĄCA KARTĘ MRM</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection
