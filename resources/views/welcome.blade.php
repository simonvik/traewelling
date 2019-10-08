<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ env('APP_NAME') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #fff;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                z-index: 3;
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                z-index: 3;
                text-align: center;
                position: absolute;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #fff;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .videoContainer {
                position: relative;
                width: 100%;
                height: 100%;
                background-attachment: scroll;
                overflow: hidden;
            }
            .videoContainer video {
                min-width: 100%;
                min-height: 100%;
                position: relative;
                z-index: 1;
            }
            .videoContainer .overlay {
                height: 100%;
                width: 100%;
                position: absolute;
                top: 0px;
                left: 0px;
                z-index: 2;
                background-image: linear-gradient(#d4353e, #a20b12);
                opacity: 0.8;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="videoContainer">
                <div class="overlay"></div>
                <video loop muted autoplay class="fullscreen-bg__video">
                    <source src="{{ asset('img/vid1.mp4') }}" type="video/mp4">
                </video>
            </div>
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/dashboard') }}">{{__('menu.dashboard')}}</a>
                    @else
                        <a href="{{ route('login') }}">{{__('menu.login')}}</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">{{__('menu.register')}}</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    {{ env('APP_NAME') }}
                </div>

                <div class="links">
                    <a href="{{ url('/auth/redirect/twitter') }}">Twitter</a>
                    <a href="{{ url('/auth/redirect/Github') }}">Github</a>
                    <a href="{{ url('/login') }}">Mastodon</a>
                </div>
                <div class="links">
                    <a href="{{ url('/leaderboard') }}">{{__('menu.leaderboard')}}</a>
                    <a href="{{ url('/statuses/active') }}">{{__('menu.active')}}</a>
                </div>
            </div>
        </div>
    </body>
</html>
