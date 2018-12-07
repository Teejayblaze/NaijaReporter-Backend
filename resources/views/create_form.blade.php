<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="{{ mix('/css/app.css') }}">
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
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
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: left;
                width: 20%;
            }

            .title {
                font-size: 24px;
            }

            .links > a {
                color: #636b6f;
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
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    Create Account
                </div>

                <div class="links">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if ( session()->has('success') )
                        <div class="alert alert-info">{{ session()->get('success') }}</div>
                    @endif
                    <form action="{{ url('/') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="corporate_name">Corporate Name</label>
                            <input type="text" name="corporate_name" id="corporate_name" class="form-control" required value="{{ old('corporate_name') }}">
                        </div>

                        <div class="form-group">
                            <label for="rc_number">RC Number</label>
                            <input type="text" name="rc_number" id="rc_number" class="form-control" required value="{{ old('rc_number') }}" maxlength="9">
                        </div>

                        <div class="form-group">
                            <label for="rc_number">Email</label>
                            <input type="text" name="email" id="email" class="form-control" required value="{{ old('email') }}">
                        </div>

                        <div class="form-group">
                            <input type="submit" value="Register" name="register" class="btn btn-primary btn-block">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="{{ mix('/js/app.js') }}"></script>
    </body>
</html>
