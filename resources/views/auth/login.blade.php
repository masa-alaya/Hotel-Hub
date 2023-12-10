<html>
    <head>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">

    </head>
    <body>


        <section class="vh-100" >



        <div class="container-fluid  h-100" style="padding: 0;">
            <div class="row d-flex justify-content-start h-100 ">
                <div class="row g-0">
                <div class="col-md-4 col-lg-8 d-none d-lg-block">
                    <img src="/img/png/logo-back.jpg" style="width:100%;height:100%" >
                </div>
                <div class="col-md-12 col-lg-4  align-items-center">

                    <div class="row g-0">

                    <div class="col-md-12 col-lg-12 d-flex align-items-center">
                        <div class="card-body p-4 p-lg-5 text-black">

                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="d-flex align-items-center mb-3 pb-1">
                                    <img src="/img/svg/logo.png" class="w-logo " alt="" >
                                  </div>
                                  <h5 class="fw-normal mb-3 pb-3 text-center" style="letter-spacing: 1px;color:#182966">Sign into your account</h5>

                                <!-- Email Address -->
                                <div class="form-outline mb-4" >
                                    <x-label class="blue-text" for="email" :value="__('Email address')" />

                                    <x-input id="email" class="form-control form-control-lg" type="email" name="email" :value="old('email')" required autofocus />
                                </div>

                                <!-- Password -->
                                <div class="form-outline mb-4">
                                    <x-label class="blue-text" for="password" :value="__('Password')" />

                                    <x-input id="password" class="form-control form-control-lg"
                                                    type="password"
                                                    name="password"
                                                    required autocomplete="current-password" />
                                </div>

                                <x-auth-validation-errors class="mb-4" :errors="$errors"  />
                                <!-- Remember Me -->


                                <div class="pt-1 mb-4">
                                    <x-button class="btn btn-dark btn-lg btn-block" style="width:100%;background-color:#FFB50C">
                                        Login
                                    </x-button>
                                </div>
                                    @if (Route::has('password.request'))
                                        <a class="small text-muted" href="{{ route('password.request') }}">
                                            Forgot password?
                                        </a>
                                    @endif
                                    <p class="mb-5 pb-lg-2 mb-5" style="color: #393f81;">Don't have an account?
                                        <a href="{{ route('register') }}"   style="color: #393f81;" class="bold">
                                            Register here
                                        </a></p>

                                        <div class="icon-row text-center d-flex justify-content-evenly pt-5 ">

                                            <a href="https://www.linkedin.com/company/syrianvirtualuniversity" target="_blank">
                                                <img class="" src="/img/svg/link.svg" alt="Card image cap">
                                            </a>
                                            <a href="https://twitter.com/SVU_Syria" target="_blank">
                                                <img class=" " src="/img/svg/twitter.svg" alt="Card image cap">
                                            </a>
                                            <a href="http://instagram.com/syrian_virtual_university" target="_blank">
                                                <img class=" " src="/img/svg/insta.svg" alt="Card image cap">
                                            </a>
                                            <a href="https://www.facebook.com/svuonline.org" target="_blank">
                                                <img class=" " src="/img/svg/facebook.svg" alt="Card image cap">
                                            </a>

                                        </div>
                            </form>

                        </div>

                    </div>
                </div>
                </div>
            </div>

        </div>
      </div>
        </section>
        <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    </body>
</html>
