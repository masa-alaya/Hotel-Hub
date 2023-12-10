<html>
    <head>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>

    <div class="container-fluid  h-100  " style="padding: 0; background-image:url('img/png/logo-back.png'); background-size:cover">
        <div class="card text-center" style="width: 40rem;
        padding: 0%;
        margin-inline: auto;">
            <div class="card-header">
                Forgot your password?
            </div>
            <div class="card-body">
                <h5 class="card-title">  {{ __('No problem. Just tell us your email address and we will email you a password reset link that will allow you to choose a new one.') }}</h5>



                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <!-- Email Address -->
                    <div class="form-outline mb-2">


                        <x-input id="email" class="form-control form-control-lg" type="email" name="email" :value="old('email')" required autofocus />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-button class="btn btn-dark btn-lg btn-block" style="width:100%;background-color:#FFB50C">
                            {{ __('Send an email password reset link') }}
                        </x-button>
                    </div>
                </form>
            </div>

        </div>
    </div>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>
