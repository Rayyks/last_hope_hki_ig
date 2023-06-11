<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
    lang="en"
    class="light-style customizer-hide"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="{{ asset('public/sneat/') }}"
    data-template="vertical-menu-template-free"
>
<head>
    <meta charset="utf-8"/>
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>{{ __('Register') }} | {{ config('app.name') }}</title>

    <meta name="description" content=""/>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('sneat/img/favicon/favicon.ico')}}"/>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{asset('sneat/vendor/fonts/boxicons.css')}}"/>

    <!-- Core CSS -->
    <link rel="stylesheet" class="template-customizer-core-css" href="{{asset('sneat/vendor/css/core.css')}}"/>
    <link rel="stylesheet" class="template-customizer-theme-css"
          href="{{asset('sneat/vendor/css/theme-default.css')}}"/>
    <link rel="stylesheet" href="{{asset('sneat/css/demo.css')}}"/>

    <!-- Page -->
    <link rel="stylesheet" href="{{asset('sneat/vendor/css/pages/page-auth.css')}}"/>
    <!-- Toastr CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/toastr/toastr.min.css') }}" />
    <!-- Toastr JS -->
    <script src="{{ asset('vendor/toastr/toastr.min.js') }}"></script>


</head>

<body>
<!-- Content -->

<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
            <!-- Register -->
            <div class="card">
                <div class="card-body">
                        <a href="{{route('login')}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
                                <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1z"/>
                            </svg>
                        </a>
                        <!-- Logo -->
                        <h1 class="text-center text-dark">Register</h1>
                    <div class="app-brand justify-content-center">
                        <a href="{{ route('home') }}" class="app-brand-link gap-2">
                            <img src="{{ asset('logo-black.png') }}" alt="{{ config('app.name') }}" srcset="" width="155px">
                        </a>
                    </div>

                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif


                    <form id="formAuthentication" class="mb-3" style="transform: translateY(-1cm);" action="/sesi/create" method="POST">
                        @csrf
                        <div class="mb-3">
                            <x-input-form
                                name="name"
                                type="text"
                                :label="__('Nama')"
                                value="{{Session::get('name')}}"
                            />
                        </div>
                        <div class="mb-3">
                            <x-input-form
                                name="email"
                                type="email"
                                :label="__('Email')"
                                value="{{Session::get('email')}}"
                            />
                        </div>
                        <div class="mb-3">
                            <x-input-form
                                name="password"
                                type="password"
                                :label="__('model.user.password')"
                            />
                        </div>
                        <div class="mb-3">
                            <x-input-form
                                name="phone"
                                type="tel"
                                :label="__('Nomor WA / HP')"
                            />
                        </div>
                        <div class="mt-2">
                            <button class="btn btn-primary d-grid w-100" type="submit">{{ __('Register') }}</button>
                        </div>
                    </form>
                    <div>
                        <a href="{{route('login')}}">Sudah punya akun?, login di sini</a>
                    </div>
                </div>
            </div>
            <!-- /Register -->
        </div>
    </div>
</div>

<!-- / Content -->
<script>
    @if(Session::has('toastr'))
        @foreach(Session::get('toastr') as $toast)
            toastr.{{ $toast['type'] }}('{{ $toast['message'] }}', '{{ $toast['title'] }}');
        @endforeach
    @endif
</script>

</body>
</html>