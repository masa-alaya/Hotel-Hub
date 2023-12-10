<html>
    <head>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
    </head>
    <body>


        <section class="vh-100" >


        <!-- Validation Errors -->
        <div class="container-fluid  h-100" style="padding: 0;">
            <div class="row d-flex justify-content-start h-100 ">
                <div class="row g-0">
                <div class="col-md-4 col-lg-8 d-none d-lg-block">
                    <img src="/img/png/register-back.jpg" style="width:100%;height:100%" >
                </div>
                <div class="col-md-12 col-lg-4  align-items-center">

                    <div class="row g-0">

                    <div class="col-md-12 col-lg-12 d-flex align-items-center">
                        <div class="card-body  p-lg-5 text-black">

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="d-flex align-items-center mb-3 pb-1">
                <img src="/img/svg/logo.png" class="w-logo " alt="" >
              </div>
              <h5 class="fw-normal text-center mb-2" style="letter-spacing: 1px;color:#182966">Register a new account</h5>

            <!-- Name -->
            <div class="form-outline mb-2" >
                <x-label class="blue-text" for="name" class="blue-text" :value="__('Full Name')" />

                <x-input id="name" class="form-control form-control-lg" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="form-outline mb-2">
                <x-label class="blue-text" for="email" :value="__('Email')" />

                <x-input id="email" class="form-control form-control-lg" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Phone Number -->
            <div class="form-outline mb-2">
                <x-label class="blue-text" for="phone" :value="__('Phone')" />

                <x-input id="phone" class="form-control form-control-lg" type="tel" name="phone" :value="old('phone')" required x-data x-mask="9999 999 999"/>
            </div>

            <!-- Password -->
               <div class="form-outline mb-2">
                <x-label class="blue-text" for="password" :value="__('Password')" />

                <x-input id="password" class="form-control form-control-lg"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
               <div class="form-outline mb-2">
                <x-label class="blue-text" for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="form-control form-control-lg"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-between mt-4">
                <a class="hover:scale-110 transition-all underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
            Already have acount?
                </a>
                <br>
                <br>
                <x-auth-validation-errors class="mb-2" :errors="$errors"  style="color: #ff6219"/>

                <x-button class="btn  btn-lg btn-block" style="width:100%;background-color:#FFB50C">
                    Register
                </x-button>
            </div>

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
