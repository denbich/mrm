@extends('layouts.app')

@section('title') Karta Rabatowa @endsection

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
                  <a class="nav-link d-flex align-items-center me-2 font-weight-bolder text-danger" aria-current="page" href="{{ route('student.card') }}">
                    <i class="fa fa-home opacity-6 text-dark me-1"></i>
                    Zobacz kartę
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link me-2 font-weight-bolder" href="">
                    <i class="fas fa-info-circle opacity-6 text-dark me-1"></i>
                    Partnerzy
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link me-2 font-weight-bolder" href="{{ route('student.login') }}">
                    <i class="fas fa-user-circle opacity-6 text-dark me-1"></i>
                    Ustawienia
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link me-2 font-weight-bolder" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-building opacity-6 text-dark me-1"></i>
                    Wyloguj się
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
            <div class="col-xl-5 col-lg-6 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
              <div class="card card-plain">
                <div class="card-header pb-0 text-start mt-5">
                  <h4 class="font-weight-bolder">Elektroniczna Karta Rabatowa MRM</h4>
                  <h6 style="color:green;"><i class="fas fa-check-circle"></i> Karta jest ważna do: 30 czerwca 2022 r.</h6>
                  <p class="mb-0">Właściciel: {{ $student->firstname }} {{ $student->lastname }}</p>
                  <p class="mb-0">PESEL: {{ Crypt::decrypt($student->pesel) }}</p>
                  <p class="mb-0">Szkoła: {{ $student->school->name }}</p>
                  <p class="mb-2">Numer karty: {{ $student->card->code }}</p>

                  <button class="btn btn-primary mb-2" id="genetateqrcode">Generuj kod dla przedsiębiorcy</button> <br>

                  <div id="qrcodediv" class="d-none">
                    {!! QrCode::size(120)->generate($student->card->code); !!} <br>
                  </div>

                  <small>Data pobrania informacji: {{ date('H:i:s d.m.Y') }} r.</small>
                </div>
                <div class="card-body">

                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-4 text-sm mx-auto">

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

@section('script')
<script>
    $( document ).ready(function() {
    $('#genetateqrcode').click(function() {
        $('#qrcodediv').removeClass('d-none');
    });
});
</script>
@endsection
