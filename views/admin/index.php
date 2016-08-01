<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Simple Sidebar - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="views/admin/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="views/admin/css/simple-sidebar.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link href="views/admin/css/admin.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="Admin">
                        管理者頁面
                    </a>
                </li>
                <li>
                    <a href="#">活動清單</a>
                </li>
                <li>
                    <a href="#">員工清單</a>
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
                        <table>
                          <thead>
                            <tr>
                              <th colspan="3">員工清單</th>
                            </tr>
                            <tr>
                              <th>ID</th>
                              <th colspan="2">員工名稱</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>1</td>
                              <td>Atualizar página da equipe</td>
                              <td>
                                <i class="glyphicon glyphicon-pencil button alterar"></i>
                                <i class="glyphicon glyphicon-trash button excluir"></i>
                              </td>
                            </tr>
                            <tr>
                              <td>2</td>
                              <td>Design da nova marca</td>
                              <td>
                                <i class="glyphicon glyphicon-pencil button alterar"></i>
                                <i class="glyphicon glyphicon-trash button excluir"></i>
                              </td>
                            </tr>
                            <tr>
                              <td>3</td>
                              <td>Encontrar desenvolvedor front-end</td>
                              <td>
                                <i class="glyphicon glyphicon-pencil button alterar"></i>
                                <i class="glyphicon glyphicon-trash button excluir"></i>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="views/admin/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="views/admin/js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>

</html>
