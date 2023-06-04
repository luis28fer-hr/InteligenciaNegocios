<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="{{ URL::asset('css/login.css') }}" rel="stylesheet" />
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
    <div class="container">
        <form action="{{ route('login.session') }}">
            <div class="container-login">
                <div class="login-header">
                    <h1><span>S</span>ing <span>I</span>n</h1>
                    <p><b>I</b>nteligencia de <b>N</b>egocios, máximiza los resultados de tu empresa</p>
                </div>
                <div class="login-body">
                    <input class="{{ $errors->first('user') ? 'invalido' : '' }}" type="text" name="user"
                        placeholder="Usuario">
                    <input class="{{ $errors->first('password') ? 'invalido' : '' }}" type="password" name="password"
                        placeholder="Contraseña">
                    <div>
                        <span> {{ $errors->first('user') }}</span>
                        <span> {{ $errors->first('password') }}</span>
                    </div>
                </div>


                <div class="login-footer">
                    <button type="submit">Login</button>
                </div>
            </div>
        </form>

    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#264b64cc" fill-opacity="1"
            d="M0,224L60,218.7C120,213,240,203,360,202.7C480,203,600,213,720,229.3C840,245,960,267,1080,256C1200,245,1320,203,1380,181.3L1440,160L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z">
        </path>
    </svg>
</body>

</html>
