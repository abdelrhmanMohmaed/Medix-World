<!DOCTYPE html>
@php
    $dir = 'ltr';
    if (str_replace('_', '-', app()->getLocale()) == 'ar') {
        $dir = 'rtl';
    }
@endphp
<html dir="{{ $dir }}" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ __('website/web.medix-title') }} | @yield('title') </title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <!-- Fonts Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- OwlCarousel2 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <!-- Select 2 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
        integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Navbar -->
    <link rel="stylesheet" href="{{ asset('assets/styles/user/navbar.css') }}">

    <style>
        /* search navbar */
        .button-container {
            top: 75%;
            left: 50%;
            width: 75%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-custom {
            margin: 2px;
        }

        .card-bady-search::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border-radius: 5px;
            background-color: rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .btn-custom button {
            text-align: start;
        }

        .btn-custom button::after {
            display: none
        }

        .select2-selection__rendered {
            font-size: 16px !important;
        }

        /* Style for the custom select */
        .select2-container .select2-selection--single {
            background-color: #dc293b;
            border-radius: 5px;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            cursor: pointer;
            height: auto !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            color: white;
            height: calc(1.5em + .75rem);
            background-color: #dc293b;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: white
        }

        .select2 .select2-container .select2-container--default {
            width: 100% !important;
        }

        /* Focus style for the custom select */

        footer a {
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }

        /* loader */
        .loader-wrapper {
            width: 100vw;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 9999;
            background: #f9fafb;
            display: flex;
            align-items: center;
            justify-content: center
        }

        .loaded .loader-wrapper {
            visibility: hidden;
            opacity: 0;
            transition: all .8s ease-out
        }

        .loader-wrapper .loader {
            font-size: 10px;
            margin: 50px auto;
            text-indent: -9999em;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: #6571ff;
            background: linear-gradient(90deg, #6571ff 10%, transparent 42%);
            -webkit-animation: loading 1.4s linear infinite;
            animation: loading 1.4s linear infinite;
            transform: translateZ(0)
        }

        .loader-wrapper .loader.loader:before {
            width: 50%;
            height: 50%;
            background: #6571ff;
            border-radius: 100% 0 0 0;
            position: absolute;
            top: 0;
            left: 0;
            content: ""
        }

        .loader-wrapper.loader-wrapper .loader.loader:before {
            width: 50%;
            height: 50%;
            background: #6571ff;
            border-radius: 100% 0 0 0;
            position: absolute;
            top: 0;
            left: 0;
            content: ""
        }

        .loader-wrapper .loader.loader:after {
            background: #f9fafb;
            width: 75%;
            height: 75%;
            border-radius: 50%;
            content: "";
            margin: auto;
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0
        }

        @-webkit-keyframes loading {
            0% {
                transform: rotate(0deg)
            }

            to {
                transform: rotate(1turn)
            }
        }

        @keyframes loading {
            0% {
                transform: rotate(0deg)
            }

            to {
                transform: rotate(1turn)
            }
        }

        /* loader */
    </style>
    @yield('styles')
</head>

<body class="antialiased">
    <script src="{{ asset('assets/js/spinner.js') }}"></script>
