<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="#" type="image/png">

    <title>{{$title}}</title>

    <link href="/admins/css/style.css" rel="stylesheet">
    <link href="/admins/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="/admins/js/html5shiv.js"></script>
    <script src="/admins/js/respond.min.js"></script>
    <![endif]-->
</head>

<body class="login-body">

<div class="container">

    <form class="form-signin" action="/admin/dologin" method="post">
        {{csrf_field()}}
        <div class="form-signin-heading text-center">
            <h1 class="sign-title">登录</h1>
            <img src="/admins/images/login-logo.png">+
        </div>
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error')}}
            </div>
        @endif
        @if (session('errors'))
            <div class="alert alert-danger">
                {{ session('errors')}}
            </div>
        @endif
        @if (session('captcha'))
            <div class="alert alert-danger">
                {{ session('captcha')}}
            </div>
        @endif
        <div class="login-wrap">
            <input type="text" class="form-control" name="name" placeholder="用户名" autofocus>
            <input type="password" class="form-control" name="password" placeholder="密码">
            <input type="text" class="form-control" name="captcha" style="width:170px" placeholder="验证码">
            <img src="{{route('captcha')}}" style="border-radius:5px;position:absolute;left:200px;top:128px" onclick='this.src=this.src += "?1"'>
            <button class="btn btn-lg btn-login btn-block"  type="submit">
                <i class="fa fa-check"></i>
            </button>

           
            <label class="checkbox">
                <input type="checkbox" value="remember-me"> Remember me
                <span class="pull-right">
                    <a data-toggle="modal" href="#myModal"> Forgot Password?</a>

                </span>
            </label>

        </div>

        <!-- Modal -->
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Forgot Password ?</h4>
                    </div>
                    <div class="modal-body">
                        <p>Enter your e-mail address below to reset your password.</p>
                        <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                        <button class="btn btn-primary" type="button">Submit</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal -->

    </form>

</div>



<!-- Placed js at the end of the document so the pages load faster -->

<!-- Placed js at the end of the document so the pages load faster -->
<script src="/admins/js/jquery-1.10.2.min.js"></script>
<script src="/admins/js/bootstrap.min.js"></script>
<script src="/admins/js/modernizr.min.js"></script>

</body>
</html>
<script>
    $('.alert-danger').delay(2000).slideUp(1000);
</script>
