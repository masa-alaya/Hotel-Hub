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



        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <div class="d-flex align-items-center mb-3 pb-1">
                <img src="/img/svg/logo.png" class="w-logo " alt="" >
              </div>
              <h5 class="fw-normal mb-3 pb-3 text-center" style="letter-spacing: 1px;color:#182966">Sign in with new Password </h5>

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div class="form-outline mb-4">
                <x-label for="email" :value="__('Eamil Address')" />

                <x-input id="email" class="form-control form-control-lg" type="email" name="email" :value="old('email', $request->email)" required autofocus />
            </div>

            <!-- Password -->
            <div class="form-outline mb-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="form-control form-control-lg" type="password" name="password" required />
            </div>

            <!-- Confirm Password -->
            <div class="form-outline mb-4">
                <x-label for="password_confirmation" :value="__('Confirm password')" />

                <x-input id="password_confirmation" class="form-control form-control-lg"
                                    type="password"
                                    name="password_confirmation" required />
            </div>
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            <div >
                <x-button class="btn btn-dark btn-lg btn-block" style="width:100%;background-color:#FFB50C">
                    {{ __('Password Reset') }}
                </x-button>
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
