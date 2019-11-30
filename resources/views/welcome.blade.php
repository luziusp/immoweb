<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Immoweb</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                background-image: url("Startseite.jpeg");
                background-size: 100%;
                color: #ffffff;
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
                justify-content: left;
                margin-left: 40px;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
                text-align: left;
                margin-left: 18px;
            }

            .links > a {
                color: #ffffff;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 500;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .options > a {
                color: #8b4513;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 700;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .footer {
              color: white;
              text-align: center;
              font-size: 11px;
              font-weight: 40;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right options">
                    @auth
                        <a href="{{ url('/home') }}">Logout</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                      @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Immoweb
                </div>

                <div class="links">
                    <a href="http://localhost:8888/tenants">Mieter</a>
                    <a href="http://localhost:8888/rooms">Wohnungen</a>
                    <a href="http://localhost:8888/contracts">Verträge</a>
                    <a href="http://localhost:8888/billing">Rechnungen</a>
                    <a href="http://localhost:8888/overview">Overview</a>
                </div>
            </div>
        </div>
    </body>
    <footer class=footer> <p>Copyright © Immoweb 2019</p></footer>
</html>
