<x-GuestLayout>
    <section class="login-content overflow-hidden">
        <div class="row no-gutters align-items-center sing-in-from vh-100">
            <div class="col-md-12 col-lg-7 align-self-center">
                <a href="{{ url('/') }}" class="navbar-brand d-flex align-items-center mb-3 justify-content-center text-primary">
                    <div class="logo-normal">
                        <!-- SVG logo -->
                        <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" class="img-fluid" style="width: 80px; height: auto;">
                    </div>
                    <h2 class="logo-title ms-3 mb-0">{{ config('app.name', 'Qompac UI') }}</h2>
                </a>
                <div class="row justify-content-center pt-5">
                    <div class="col-md-9">
                        <div class="card auth-card">
                            <div class="card-body">
                                <h2 class="mb-2 text-center">{{ __("Sign In") }}</h2>
                                <p class="text-center">Inicia sesión para permanecer conectado</p>

                                <!-- Mostrar errores de validación -->
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul class="mb-0">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <!-- Formulario de Laravel -->
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" id="email" class="form-control" required autofocus>
                                    </div>

                                    <div class="form-group mt-3">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" id="password" class="form-control" required>
                                    </div>

                                    <div class="d-flex justify-content-between mt-3">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="remember" id="remember">
                                            <label class="form-check-label" for="remember">{{ __("Remember Me") }}</label>
                                        </div>
                                        <a href="{{ route('password.request') }}">{{ __("Forgot Password") }}</a>
                                    </div>

                                    <div class="d-flex justify-content-center mt-4">
                                        <button type="submit" class="btn btn-primary">{{ __("Sign In") }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-5 d-lg-block d-none bg-primary p-0 overflow-hidden d-flex align-items-center justify-content-center" style="height: 100vh;">
                <img src="{{ asset('assets/images/auth/1.svg') }}" class="img-fluid" alt="images" style="max-width: 100%; max-height: 100vh; object-fit: contain;">
            </div>
        </div>
    </section>
</x-GuestLayout>