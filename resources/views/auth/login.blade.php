<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Sistemas Ventas Rolast | LOGIN</title>
    <link rel="icon" type="image/png" href="" />
    <link rel="stylesheet" href="../../vendors/iconfonts/font-awesome/css/all.min.css">
    <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../../vendors/css/vendor.bundle.addons.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../../css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../../images/favicon.png" />

    <style>
        form {
            max-width: 360px;
            border: 2px solid #dedede;
            padding: 38px;
            margin-top: 25px;
            border-radius: 25px;
            background-color:transparent ;

            /* background: #fff; */
        }
        body {
            background-color: #ecf0f5;
            background-image: url('../assets/img/fondologin.png');
            background-repeat: no-repeat;
        }
    </style>
</head>
<body>
<center>
    <form class="form-signin" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}
        <h2 class="h3 mb-3 font-weight-normal" style="color:black">Sistema de Ventas</h2>
        <hr>
        <div class="form-group">
            <label for="in_usu_nombre" >Usuario</label>
            <input type="text" id="email" alue="{{old("email")}}" name="email" class="form-control" placeholder="Usuario" required >
            @if ($errors->has('email'))
                <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
            @endif
        </div>
        <div class="form-group">
            <label for="in_usu_clave" >Contraseña</label>

            <input type="password" id="password" name="password" class="form-control" placeholder="*******" required>
            @if ($errors->has('password'))
                <span class="help-block"><strong>{{ $errors->first('password') }}</strong>
                    </span>
            @endif
        </div>
        <label class="checkbox">
            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recordar
            <span class="pull-right"> <a href="{{ route('password.request') }}"> Olvido su Contraseña?</a></span>
        </label>
        <hr>
        <button class="btn btn-lg btn-outline-success btn-block" type="submit">Ingresar</button>
        <a>

        </a>
    </form>
</center>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="../../vendors/js/vendor.bundle.base.js"></script>
<script src="../../vendors/js/vendor.bundle.addons.js"></script>
<!-- endinject -->
<!-- inject:js -->
<script src="../../js/off-canvas.js"></script>
<script src="../../js/hoverable-collapse.js"></script>
<script src="../../js/misc.js"></script>
<script src="../../js/settings.js"></script>
<script src="../../js/todolist.js"></script>
<!-- endinject -->
</body>
</html>
