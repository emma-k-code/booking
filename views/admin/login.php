<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
    <meta charset="UTF-8" />
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
    <title>管理者頁面</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />
    <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
    <meta name="author" content="Codrops" />
    <link rel="stylesheet" type="text/css" href="../views/admin/css/login_css/demo.css" />
    <link rel="stylesheet" type="text/css" href="../views/admin/css/login_css/style.css" />
    <link rel="stylesheet" type="text/css" href="../views/admin/css/login_css/animate-custom.css" />

    <!-- Bootstrap Core CSS -->
    <link href="../views/admin/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="../views/admin/css/custom.css" />
    
    <!-- jQuery Version 1.11.1 -->
    <script src="../views/admin/js/jquery.js"></script>
    
    <script src="../views/admin/js/login.js"></script>

</head>

<body>
    <div class="container">
        <div class="row">
            <section>
                <div id="container_demo">
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form id="loginForm" method="POST" autocomplete="on">
                                <h1>Log in</h1>
                                <p>
                                    <label for="username" class="uname" data-icon="u"> Your Account </label>
                                    <input id="email" name="username" required="required" type="text" placeholder="eqoe159" />
                                </p>
                                <p>
                                    <label for="password" class="youpasswd" data-icon="p"> Your password </label>
                                    <input id="password" name="password" required="required" type="password" placeholder="eg. X8df!90EO" />
                                </p>
                                <?php echo $data;?>
                                <p class="login button">
                                    <input id="bLogin" name="bLogin" type="submit" value="Login" />
                                </p>
                               
                            </form>
                        </div>

                    </div>
                </div>
            </section>
        </div>
    </div>
</body>

</html>