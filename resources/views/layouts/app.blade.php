<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Page Title' }}</title>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/dashlite.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="nk-body bg-white npc-landing ">
<div class="nk-app-root">
    <div class="nk-main ">
        <header class="header has-header-main-s1 bg-grad-a mb-5 mb-sm-6 mb-md-7" id="home">
            <div class="header-main header-main-s1 is-sticky is-transparent on-dark">
                <div class="container header-container">
                    <div class="header-wrap">
                        <div class="header-logo">
                            <h4>
                                <a href="{{ route('home') }}" class="logo-link" wire:navigate>
                                    Inscription
                                </a>
                            </h4>
                        </div>
                        <div class="header-toggle">
                            <button class="menu-toggler" data-target="mainNav">
                                <em class="menu-on icon ni ni-menu"></em>
                                <em class="menu-off icon ni ni-cross"></em>
                            </button>
                        </div>
                        <nav class="header-menu" data-content="mainNav">
                            <ul class="menu-list ms-lg-auto">
                                <li class="menu-item">
                                    <a href="{{ route('home') }}"
                                       class="menu-link nav-link"
                                       wire:navigate
                                    >Inscription</a>
                                </li>
                                <li class="menu-item">
                                    <a
                                        href="{{ route('reserver') }}"
                                        class="menu-link nav-link"
                                        wire:navigate
                                    >Reserver une chambre</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="container">
                @if (session('success'))
                    <div class="alert alert-icon alert-success" role="alert">
                        <em class="icon ni ni-alert-circle"></em>
                        <strong>Felicitation</strong>. {{ session('success') }}
                    </div>
                @endif
                @if(session('error'))
                    <div class="alert alert-icon alert-danger" role="alert">
                        <strong>Warning</strong>. {{ session('error') }}
                    </div>
                @endif
            </div>
            <div class="header-content my-auto py-5 is-dark">
                <div class="container">
                    <div class="card p-5">
                        <div class="row justify-content-center">
                            {{ $slot }}
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </div>
</div>

<script src="{{ asset('js/bundle.js') }}"></script>
<script src="{{ asset('js/scripts.js') }}"></script>
</body>
</html>
