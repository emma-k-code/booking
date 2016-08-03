<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>管理者頁面</title>

    <!-- Bootstrap Core CSS -->
    <link href="../views/admin/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../views/admin/css/simple-sidebar.css" rel="stylesheet">
    
    <!-- Table CSS -->
    <link href="../views/admin/css/admin.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link href="../views/admin/css/custom.css" rel="stylesheet">
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <script>
     $(document).ready(init);
    
      function init() {
        
      }
    </script>

</head>

<body>

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="admin">
                        管理者頁面
                    </a>
                </li>
                <li>
                    <a href="newActivity">新增活動</a>
                </li>
                <li>
                    <a href="newMember">新增員工</a>
                </li>
                <li>
                    <a href="activity">活動清單</a>
                </li>
                <li>
                    <a href="member">員工清單</a>
                </li>
                <li>
                    <a href="logout">登出</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
                        <?php require_once "../BookingWeb/views/admin/{$data[0]}.php"; ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../views/admin/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../views/admin/js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>

</html>
