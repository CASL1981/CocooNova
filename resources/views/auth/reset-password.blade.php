<x-GuestLayout>
    <x-slot name="title">
        Restablecer contraseña
    </x-slot>
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
                                <p class="text-center">Restablecer contraseña</p>
                                <!-- Session Status -->
                                <x-auth-session-statu class="mb-4" :status="session('status')" />

                                <!-- Validation Errors -->
                                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                                <!-- Formulario de Laravel -->
                                <form method="POST" action="{{ route('password.update') }}" class="mt-4">
                                @csrf
                                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $request->email) }}" required autofocus>
                            
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group mt-3">
                                        <label for="password" class="form-label">Nueva contraseña</label>
                                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                            
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                            
                                    <div class="form-group mt-3">
                                        <label for="password_confirmation" class="form-label">Confirmar nueva contraseña</label>
                                        <input type="password" name="password_confirmation" class="form-control" required>
                                    </div>

                                    <div class="d-flex justify-content-center mt-4">
                                        <button type="submit" class="btn btn-primary">Cambiar Contraseña</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-5 d-lg-block d-none bg-primary p-0 overflow-hidden d-flex align-items-center justify-content-center" style="height: 100vh;">
                <img src="{{ asset('assets/images/auth/3.svg') }}" class="img-fluid" alt="images" style="max-width: 100%; max-height: 100vh; object-fit: contain;">
            </div>
        </div>
    </section>
</x-GuestLayout>