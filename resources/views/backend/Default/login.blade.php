
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="/backend/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/backend/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="/backend/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/backend/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="/backend/plugins/iCheck/square/blue.css">

    <!-- CSS -->
    <link rel="stylesheet" href="{{asset("//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css")}}"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="{{asset("//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css")}}"/>
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="{{asset("//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css")}}"/>
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="{{asset("//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css")}}"/>

    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">

    <div class="login-logo">
        <a href=""><b>Yeni Haberler </b> CMS</a>
    </div>

    <div class="login-box-body">
        <form action="{{action('Backend\DefaultController@authenticate')}}" method="post">
            @csrf

            <p class="login-box-msg">Email ve Şifrenizi Giriniz</p>

            @if(session()->has('error'))
                <div class="alert alert-danger">
                    {{session('error')}}
                </div>

            @elseif(session()->has('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
            @endif


            <div class="form-group has-feedback">
                <input type="email" class="form-control" placeholder="Email" name="email" value="{{old('email')}}">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Şifre" name="password" value="{{old('password')}}">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>

            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox" name="remember_token" {{old('remember_token') ? 'checked' : ''}}> Beni Hatırla
                        </label>
                    </div>
                </div>

                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Giriş Yap</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="/backend/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="/backend/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="/backend/plugins/iCheck/icheck.min.js"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
        });
    });
</script>
</body>
</html>

