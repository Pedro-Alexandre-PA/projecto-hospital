<?php

include("../../../database/conexao.php");

if (isset($_SESSION["id_adm"])) {

}else{

    header("location:../../login.php");

}

    require '../../../controller/ControllerUsuario.php';
    if ($_GET) {
    
        $globalid = $_GET["id"];
    }
    
    $user = new Usuario();
    
    
    if(isset($_POST['y'])){ 
      
    
        if ($user->excluir($globalid)==true) {
    
            $_SESSION['js2']=6;
        
            header("location:usuarios.php");
        }
    
        }elseif(isset($_POST['n'])){
          
            header("location:usuarios.php");
    
        }

?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Monsterlite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Monster admin lite design, Monster admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="Monster Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>Projecto Hospital</title>

    <link href="../../../resources/switalert/sweetalert2.min.css" rel="stylesheet" >

        <script src="../../resources/switalert/sweetalert2.min.js"></script>

    <link rel="canonical" href="https://www.wrappixel.com/templates/monster-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../../../assets/images/favicon.png">
    <!-- Custom CSS -->
    <link href="../../../assets/plugins/chartist/dist/chartist.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../../../resources/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" >
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            

                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                            <!-- dark Logo text -->
                            
                            

                        </span>
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none"
                        href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav me-auto mt-md-0 ">
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->

                        
                    </ul>

                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav">
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="../../../assets/images/users/<?php echo $_SESSION["foto_adm"]; ?>" alt="user" class="profile-pic me-2"><?php echo $_SESSION["nome_adm"]; ?>
                            </a>
                            <ul class="dropdown-menu show" aria-labelledby="navbarDropdown"></ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="../index.php" aria-expanded="false"><i class="me-3 far fa-clock fa-fw"
                                    aria-hidden="true"></i><span class="hide-menu">Tela inicial</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="../doctor/doctor.php" aria-expanded="false">
                                <i class="me-3 fas fa-user-md" aria-hidden="true"></i><span
                                    class="hide-menu">Doutores</span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="../paciente/paciente.php" aria-expanded="false">
                                <i class="me-3 fas fa-procedures" aria-hidden="true"></i> <span
                                    class="hide-menu">Pacientes</span></a>
                        </li>
                        
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="../familiares/familiares.php" aria-expanded="false">
                                <i class="me-3 fas fa-users" aria-hidden="true"></i><span
                                    class="hide-menu">Familíares</span></a>
                        </li>

                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="../relatorio/relatorio.php" aria-expanded="false">
                                <i class="me-3 fas fa-address-book" aria-hidden="true"></i> <span
                                    class="hide-menu">Relatório</span></a>
                        </li>
                        
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="usuarios.php" aria-expanded="false">
                                <i class="me-3 fas fa-user" aria-hidden="true"></i><span
                                    class="hide-menu">Usuários</span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="../perfil.php" aria-expanded="false">
                                <i class="me-3 far fa-user-circle" aria-hidden="true"></i><span
                                    class="hide-menu">Perfil</span></a>
                        </li>

                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="../sair.php" aria-expanded="false">
                                <i class="me-3 fas fa-sign-out-alt" aria-hidden="true"></i><span
                                    class="hide-menu">Sair</span></a>
                        </li>
                             
                       
                    </ul>

                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            
           


             <br>
             <br>
             <br>
             <br>
             <br>
             <br>
             <br>
             <br>
            <!-- Page Heading -->
            <div  class="d-sm-flex align-items-center justify-content-between mb-4">

                <p style="text-align: center;">

                <h1 class="h3 mb-0 text-gray-800">Tem certeza que deseja excluir?</h1>
            
                </p>


            </div>

            <!-- Content Row -->
            <div class="row">
            <div class="col-md-12">
            <br>
             <br>
            <div style="text-align: center;">

            <form method="post"  class="user">

                <a href="excluir_usuario.php?id='.$value['id'].';">
                <button type="submit" name="y" class="btn btn-danger" style="background-color:red;">Sim</button>              
                </a>

                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                <a href="excluir_usuario.php?id='.$value['id'].';">
                <button type="submit" name="n" class="btn btn-secondary">Não</button>
                </a>

            </form>

                </div>

            </div>


             </div>



                <!-- Column -->
                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->
                
                    <!-- column -->
                </div>
                <!-- ============================================================== -->
                <!-- Table -->
                <!-- ============================================================== -->
                
                <!-- ============================================================== -->
                <!-- Table -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Recent blogss -->
                <!-- ============================================================== -->
                
                <!-- ============================================================== -->
                <!-- Recent blogss -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->

    

    <script src="../../../resources/switalert/sweetalert2.min.js"></script>
    <script src="../../../assets/plugins/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../../../assets/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../../resources/js/app-style-switcher.js"></script>
    <!--Wave Effects -->
    <script src="../../../resources/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../../../resources/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../../../resources/js/custom.js"></script>
    <!--This page JavaScript -->
    <!--flot chart-->
    <script src="../../../assets/plugins/flot/jquery.flot.js"></script>
    <script src="../../../assets/plugins/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="../../../resources/js/pages/dashboards/dashboard1.js"></script>
</body>

</html>