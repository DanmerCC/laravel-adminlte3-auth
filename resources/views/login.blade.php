<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link href="{{asset('css/login.css')}}" rel="stylesheet">


    <title>Document</title>
</head>
<body>
    
    <div class="div-contendido"></div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 min-vh-100 d-flex flex-column justify-content-center">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 pr-0">
                        <!-- form card login -->
                        <div class="card shadow shadow-sm h-100 ">
                            <div class="card-header text-center">
                            <img src="{{asset('images/logo-caen.png') }}" class="img-logo offset-5">
                                <span class="mb-0 font-up font-bold text-secondary text-uppercase">Ingreso personal autorizado</span>
                            </div>
                            <div class="card-body">
                            <form method="GET" action="{{ route('home') }}">
                                {{csrf_field()}}
                                    <div class="md-form mb-4">
                                        <label for="orangeForm-name3">Numero de Documento </label> 
                                        <div class="input-group">
                                            <div class="input-group-append">
                                                <i class="fa fa-user prefix input-group-text"></i>
                                            </div>
                                            <input name="document_number" type="text" id="orangeForm-name3"
                                            class="form-control{{ $errors->has('document_number') ? ' is-invalid' : '' }}"
                                            autocomplete="off" maxlength="15" oninput="if(this.value.length > this.maxLength) this.value =
                                         this.value.slice(0, this.maxLength);" value="{{old('document_number')}}">
                                           
                                        </div>
                                    </div>
                                    <div class="md-form mb-4">
                                        <label for="orangeForm-pass3">Contraseña</label>  
                                            <div class="input-group">
                                                <div class="input-group-append">
                                                <span id="eye" action="hide" class="fas fa-eye prefix input-group-text"></span>
                                                </div>
                                                <input name='password' type="password" id="orangeForm-pass3"
                                                class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                value="{{old('password')}}">
                                            </div>
                                        
                                    </div>
                                    <div class="row ingresar ">
                                        <div class="col-xs-12 mb-2 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-success  btn-block">
                                                    INGRESAR
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 mb-2 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <div class="text-center">
                                                <a class="btn btn-secondary  btn-block" href="">
                                                    REGISTRARSE
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                            <!--/card-block-->
                        </div>

                        <!-- /form card login -->
                    </div>
                    <div class="titulo col-xl-6 text-center">
                        
                    <h1 class="text-uppercase">Centro de altos Estudios Nacionales</h1>
                    <h2 class="">La mejor calidad para estudiar <br>  cursos de  <span class="typed"> </span></h2>

                    <div class="redes-sociales">
                        <i class="fab fa-facebook-square" style="font-size: 15px;"></i>
                        <i class="fa fa-1x fa-globe"></i>
                    </div>
                     </div>

                </div>
                <!--/row-->
            </div>
            <!--/col-->
        </div>
        <!--/row-->
    </div>
    <!--/container-->

    <script src="https://use.fontawesome.com/452826394c.js"><script>
    <script src="js/app.js" charset="utf-8"></script>

    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.11"></script>

<script>

    const typed = new Typed('.typed', {
        strings: [
            '<i class="postgrado">defecto</i>',
            '<i class="postgrado">Maestria</i>',
            '<i class="postgrado">Doctorado</i>',
            '<i class="postgrado">Diplomado</i>'
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