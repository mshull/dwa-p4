<?php 
    $domarr = explode(".", $_SERVER['HTTP_HOST']); 
    $subdomain = (count($domarr) > 2) ? $domarr[0] : '';
    $subdomain = strtolower($subdomain);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Login to CRM</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport">
<meta content="" name="description">
<meta content="" name="author">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
<link href="/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
<link href="/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
<link href="/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
<link href="/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="/assets/global/css/components-rounded.min.css" rel="stylesheet" id="style_components" type="text/css" />
<link href="/assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
<link href="/assets/pages/css/login-5.min.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="favicon.ico" />
</head>
<body class=" login">

    <!-- form -->
    <div class="user-login-5">
        <div class="row bs-reset">
            <div class="col-md-6 bs-reset">
                <div class="login-bg" style="background-image:url(/assets/custom/orgs/<?php echo $subdomain; ?>/img/bg2.jpg)">
                    <img class="login-logo" style="width: 200px;" src="/assets/custom/img/<?php echo $subdomain; ?>.png" /> </div>
            </div>
            <div class="col-md-6 login-container bs-reset">
                <div class="login-content">
                    <h1>CRM Login</h1>
                    <p>Please use the form below to login to your CRM system. If you would prefer to skip logging in every time you visit please check the "Remember Me" checkbox, or click the "Forgot Password" link if you need to reset your password.</p>
                    <form action="/" class="login-form" method="post">

                        {!! csrf_field() !!}
                        
                        <div class="alert alert-danger display-hide">
                            <button class="close" data-close="alert"></button>
                            <span>Enter any username and password. </span>
                        </div>

                        @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                <button class="close" data-close="alert"></button>
                                <ul class="errors">
                                @foreach ($errors->all() as $error)
                                    <li><span class="fa fa-exclamation-circle"></span> {{ $error }}</li>
                                @endforeach
                                </ul>
                            </div>
                        @endif

                        @if (session('status'))
                            <div class="alert alert-success">
                                <button class="close" data-close="alert"></button>
                                <span class="fa fa-exclamation-circle"></span> {{ session('status') }}
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-xs-6">
                                <input class="form-control form-control-solid placeholder-no-fix form-group" type="text" autocomplete="off" placeholder="Username" name="email" value="{{ old('email') }}" required/> </div>
                            <div class="col-xs-6">
                                <input class="form-control form-control-solid placeholder-no-fix form-group" type="password" autocomplete="off" placeholder="Password" name="password" required/> </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="rem-password">
                                    <p>Remember Me
                                        <input type="checkbox" class="rem-checkbox" name="remember" />
                                    </p>
                                </div>
                            </div>
                            <div class="col-sm-8 text-right">
                                <div class="forgot-password">
                                    <a href="javascript:;" id="forget-password" class="forget-password">Forgot Password?</a>
                                </div>
                                <button class="btn blue" type="submit">Sign In</button>
                            </div>
                        </div>
                    </form>
                    <!-- BEGIN FORGOT PASSWORD FORM -->
                    <form class="forget-form" action="{{ url('/password/email') }}" method="post">
                        <h3>Forgot Password ?</h3>
                        <p> Enter your e-mail address below to reset your password. </p>
                        <div class="form-group">
                            <input class="form-control placeholder-no-fix form-group" type="text" autocomplete="off" placeholder="Email" name="email" /> </div>
                        <div class="form-actions">
                            <button type="button" id="back-btn" class="btn grey btn-default">Back</button>
                            <button type="submit" class="btn blue btn-success uppercase pull-right">Submit</button>
                        </div>
                    </form>
                    <!-- END FORGOT PASSWORD FORM -->
                </div>
                <div class="login-footer">
                    <div class="row bs-reset">
                        <div class="col-xs-5 bs-reset">
                            <ul class="login-social">
                                <li>
                                    <a href="mailto:mshull@g.harvard.edu">
                                        <i class="icon-speech"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-xs-7 bs-reset">
                            <div class="login-copyright text-right">
                                <p>Copyright &copy; P4.ShullWorks.com <?php echo Date('Y'); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- scripts -->
    <script src="/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
    <script src="/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
    <script src="/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src="/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
    <script src="/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
    <script src="/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
    <script src="/assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
    <script src="/assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
    <script src="/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
    <script src="/assets/global/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
    <script src="/assets/global/scripts/app.min.js" type="text/javascript"></script>
    <script src="/assets/custom/orgs/<?php echo $subdomain; ?>/js/main.js" type="text/javascript"></script>

</body>
</html>