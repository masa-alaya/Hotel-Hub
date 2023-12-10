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


        <div class="mb-4 text-sm text-gray-600">
            {{ __('Please confirm your password before proceeding.') }}
        </div>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <!-- Password -->
            <div class="form-outline mb-2">
                <x-label for="password" :value="__('password')" />

                <x-input id="password" class="form-control form-control-lg"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>


                <x-button class="btn btn-dark btn-lg btn-block" style="width:100%;background-color:#FFB50C">
                    {{ __('confirm') }}
                </x-button>

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
