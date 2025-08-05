<!doctype html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ config('app.name') }} | @yield('title', 'Recuperar Contraseña')</title>
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" />

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/core/libs.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/qompac-ui.min.css?v=2.0.0') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/customizer.min.css?v=2.0.0') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/custom.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/rtl.min.css') }}" />     
      
      
      <!-- Google Font -->
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">  </head>
  <body class=" ">
    <!-- loader Start -->
    <div id="loading">
      <div class="loader simple-loader">
          <div class="loader-body ">
              <img src="../assets/images/loader.webp" alt="loader" class="image-loader img-fluid ">
          </div>
      </div>
    </div>
    <!-- loader END -->
    <div class="wrapper">
      <section class="login-content overflow-hidden">
         <div class="row m-0 align-items-center  vh-100">            
           <div class="col-md-12 col-lg-7 align-self-center"> 
              <a href="/" class="navbar-brand d-flex align-items-center mb-3 justify-content-center text-primary">
                  <div class="logo-normal">
                     <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" class="img-fluid" style="width: 80px; height: auto;">
                  </div>
                  <h2 class="logo-title ms-3 mb-0" >{{ config('app.name') }}</h2>
               </a>
               <div class="row justify-content-center pt-5">
                  <div class="col-lg-8">           
                     <div class="card d-flex justify-content-center mb-0">
                        <div class="card-body">
                           <h2 class="mb-2">{{ __('Reset Password') }}</h2>
                           <p>Ingrese su dirección de correo electrónico y le enviaremos un correo electrónico con instrucciones para restablecer su contraseña.</p>
                           <!-- Session Status -->
                            <x-auth-session-statu class="mb-4" :status="session('status')" />

                            <!-- Validation Errors -->
                            <x-auth-validation-errors class="mb-4" :errors="$errors" />
                           <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                              <div class="row">
                                 <div class="col-lg-12">
                                    <div class="floating-label form-group">
                                       <label for="email" class="form-label">Email</label>
                                       <input type="email" name="email" :value="old('email')" required autofocus class="form-control" id="email" aria-describedby="email" placeholder="Ingresar Email del Usuario">
                                    </div>
                                    <input type="hidden" name="token" value="{{ request()->token }}">
                                 </div>
                              </div>
                              <button type="submit" class="btn btn-primary">{{ __('Reset') }}</button>
                           </form>
                        </div>
                     </div>  
                  </div>
               </div>              
            </div>
            <div class="col-lg-5 d-lg-block d-none bg-primary p-0 overflow-hidden d-flex align-items-center justify-content-center" style="height: 100vh;">
                <img src="{{ asset('assets/images/auth/2.svg') }}" class="img-fluid" alt="images" style="max-width: 100%; max-height: 100vh; object-fit: contain;">
            </div>
         </div>
      </section>
    </div>
    <!-- Library Bundle Script -->
    <script src="../assets/js/core/libs.min.js"></script>
    <!-- Plugin Scripts -->
    
    
    
    
    
    
    
    
    
    <!-- Slider-tab Script -->
    <script src="../assets/js/plugins/slider-tabs.js"></script>
    
    
    
    
    
    <!-- Lodash Utility -->
    <script src="../assets/vendor/lodash/lodash.min.js"></script>
    <!-- Utilities Functions -->
    <script src="../assets/js/iqonic-script/utility.min.js"></script>
    <!-- Settings Script -->
    <script src="../assets/js/iqonic-script/setting.min.js"></script>
    <!-- Settings Init Script -->
    <script src="../assets/js/setting-init.js"></script>
    <!-- External Library Bundle Script -->
    <script src="../assets/js/core/external.min.js"></script>
    <!-- Widgetchart Script -->
    <script src="../assets/js/charts/widgetcharts.js?v=2.0.0" defer></script>
    <!-- Dashboard Script -->
    <script src="../assets/js/charts/dashboard.js?v=2.0.0" defer></script>
    <!-- qompacui Script -->
    <script src="../assets/js/qompac-ui.js?v=2.0.0" defer></script>
    <script src="../assets/js/sidebar.js?v=2.0.0" defer></script>
    
  </body>
</html>