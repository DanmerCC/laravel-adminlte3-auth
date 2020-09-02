<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="{{asset('css/login.css')}}" rel="stylesheet">
    <title>Extranet | Login</title>
</head>
<body>
    <div class="login-container">
        <div class="login-flex shadow-sm">
            <div class="login-left">
                <div class="login-card">
                    <div class="login-header">
                        <img src="{{asset('images/logo-caen.png')}}" alt="CAEN" class="login-header__img mb-2">
                        <h1 class="login-header__title title">Ingrese sus credenciales</h1>
                    </div>
                    <form class="login-body mt-2" method="POST" action="{{route('login')}}">
                        @if(Session::has('error_message'))
                        <div class="text-center mb-3">
                            <span class="mb-5 " style="color:red">{{ Session::get('error_message') }}</span>
                        </div>
                        @endif
                        @csrf
                        <div class="input-login ">
                            <div class="input-login-icon">
                                <i class="login-icon fa fa-user"></i>
                            </div>
                            <input name="email" type="text" id="orangeForm-name3"
                            class="input-control {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{old('document_number')}}" placeholder="Email">
                        </div>
                        @if ($errors->has('email'))
                        <span style="color:red">{{$errors->first('email')}}</span>
                        @endif
                        <div class="input-login mt-4">
                            <div class="input-login-icon">
                                <span id="eye" action="hide" class="login-icon fas fa-eye"></span>
                            </div>
                            <input name='password' type="password" id="orangeForm-pass3"
                            class="input-control {{ $errors->has('password') ? ' is-invalid' : '' }}"
                            value="{{old('password')}}" placeholder="Contraseña">
                        </div>
                        @if ($errors->has('email'))
                            <span style="color:red">{{$errors->first('email')}}</span>
                            @endif
                        <div class="row ingresar mt-3">
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-login  btn-block">
                                    Ingresar
                                </button>
                            </div>
                            <div class="col-12 text-center mt-3 text-center">
                                <p>- o -</p>
                            </div>
                            <div class="col-12 text-center ">
                                <a href="#" class="btn p-2  btn-block btn-primary">
                                    <i class="fab fa-google-plus mr-2"></i> Ingresar usando Google+
                                  </a>
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>
            <div class="login-right">
                <div class="login-info">
                    <div class="login-info__description">
                        <h2 class="text-center mb-3 subtitle">Centro de altos Estudios Nacionales</h2>
                        <h2 class="text-center subtitle">La mejor calidad para estudiar <br>  cursos de  <span class="typed"> </span></h2>
                    </div>

                    <div class="login-info__redes">
                        <a class="social-link" href="#"><i class="fab fa-facebook-square"></i></a>
                        <a class="social-link ml-2" href="#"><i class="fa fa-1x fa-globe"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://use.fontawesome.com/452826394c.js"><script>
    <script src="js/app.js" charset="utf-8"></script>

    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.11"></script>

<script>

    const typed = new Typed('.typed', {
        strings: [
            '<span class="postgrado">defecto</span>',
            '<span class="postgrado">Maestria</span>',
            '<span class="postgrado">Doctorado</span>',
            '<span class="postgrado">Diplomado</span>'
            ],
            typeSpeed: 75, // Velocidad en mlisegundos para poner una letra,
            startDelay: 300, // Tiempo de retraso en iniciar la animacion. Aplica tambien cuando termina y vuelve a iniciar,
            backSpeed: 75, // Velocidad en milisegundos para borrrar una letra,
            smartBackspace: false, // Eliminar solamente las palabras que sean nuevas en una cadena de texto.
            shuffle: false, // Alterar el orden en el que escribe las palabras.
            backDelay: 1500, // Tiempo de espera despues de que termina de escribir una palabra.
            loop: true, // Repetir el array de strings
            loopCount: false, // Cantidad de veces a repetir el array.  false = infinite
            showCursor: true, // Mostrar cursor palpitanto
            cursorChar: '|', // Caracter para el cursor
            contentType: 'html', // 'html' o 'null' para texto sin formato
    });
</script>

</body>
</html>
