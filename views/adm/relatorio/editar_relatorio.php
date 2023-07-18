<?php

include("../../../database/conexao.php");

if (isset($_SESSION["id_adm"])) {
}else{

    header("location:../../../login.php");
}

require '../../../controller/ControllerRelatorio.php';
require '../../../controller/ControllerPaciente.php';
if ($_GET) {

    $id = $_GET["id"];
}

$relatorio = new Relatorio();
$paciente = new Paciente();
$dados=$relatorio->SelecaoEspeci($id);


if(isset($_POST['atualizar'])){ 


    $nome_paciente=$_POST['nome'];

    $texto=$_POST['texto'];
                    
    if(isset($_POST['nome']) &&  $_POST['nome']!=""){ 

        $sql=$pdo->prepare("SELECT* FROM paciente where nome =?");
                        
                $sql-> execute( array($nome));

                $result= $sql->fetchAll();

                foreach ($result as $key => $value) {
                    
                    if(($relatorio->AtualizarDados($id,$value['nome'],
                    $value['antecedentes'],$value['data_inter'],
                    $value['nome_doctor'],$value['idade'],$value['provincia'],$value['municipio'],
                    $value['bairro'],$value['rua'],$texto,$value['id'])==true)){

                        $_SESSION['js']=5;
                        
                            header("location:relatorio.php");
            
                    }else{
                        echo '<div class="alert alert-danger" role="alert">
                        Erro ao Atualizar!
                      </div>';
                    }

                }
                
                }else{


                    if(($relatorio->AtualizarDados2($id,$texto)==true)){

                        $_SESSION['js']=5;
                        
                            header("location:relatorio.php");
            
                    }else{
                        echo '<div class="alert alert-danger" role="alert">
                        Erro ao Atualizar!
                      </div>';
                    }


                }
      
      

        

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
    <link rel="canonical" href="https://www.wrappixel.com/templates/monster-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../../../assets/images/favicon.png">
    <!-- Custom CSS -->
    <link href="../../../resources/css/style.min.css" rel="stylesheet">

    <!-- ATT -->
    <link href="../../../resources/trumbowyg/dist/ui/trumbowyg.min.css" rel="stylesheet">

    <!-- ATT -->
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
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
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
                                    class="hide-menu">Doctores</span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="../pacientes/paciente.php" aria-expanded="false">
                                <i class="me-3 fas fa-procedures" aria-hidden="true"></i> <span
                                    class="hide-menu">Pacientes</span></a>
                        </li>
                        
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="../familiares/familiares.php" aria-expanded="false">
                                <i class="me-3 fas fa-users" aria-hidden="true"></i><span
                                    class="hide-menu">Familíares</span></a>
                        </li>

                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="relatorio.php" aria-expanded="false">
                                <i class="me-3 fas fa-address-book" aria-hidden="true"></i> <span
                                    class="hide-menu">Relatórios</span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="../usuario/usuarios.php" aria-expanded="false">
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
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="page-title mb-0 p-0">Editar</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="relatorio.php">Relatório</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Editar Dados</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body profile-card">
                                <center class="mt-4"> <img src="../../../assets/images/users/normal.png"
                                        class="rounded-circle" width="150" />
                                    <h4 class="card-title mt-2"><?php 
                                    foreach ($dados as $key => $value) {


                                    echo $value['nome_paciente'];

                                    } ?></h4>

                                    <h6 class="card-subtitle">Paciente</h6>
                                    <div class="row justify-content-center">
                                        <div class="col-4">
                                            </div>
                                        <div class="col-4">
                                            </div>
                                    </div>
                                </center>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <div class="card-body">
                                <form method="post" class="form-horizontal form-material mx-2">
                                <div class="form-group">
                                        <label class="col-sm-12">Paciente</label>
                                        <div class="col-sm-12 border-bottom">
                                            <select name="nome" class="form-select shadow-none border-0 ps-0 form-control-line">
                                                <option value="">-- Seleciona o Paciente --</option>

                                                <?php


                                                $result= $paciente->selecionar();

                                                foreach ($result as $key => $value) {

                                                    echo ' <option value="'.$value['nome'].'">'.$value['nome'].'</option>' ;
                                                    
                                                    }

                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12 mb-0">Texto do Doctor</label>
                                        <br>
                                        <br>
                                        <div class="col-md-12">

                                        <textarea  name="texto" id="trumbowyg-editor" rows="3" style="
                                        border:solid 1px #5F6D7E; "  required></textarea>

                                        </div>
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <div class="col-sm-12 d-flex">
                                            <button name="atualizar" type="submit" class="btn btn-success mx-auto mx-md-0 text-white">Atualizar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
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
    
    <script src="../../../resources/trumbowyg/dist/trumbowyg.min.js"></script>
    <script>
    $('#trumbowyg-editor').trumbowyg({
    btns: [
        
        ['viewHTML'],
        ['undo', 'redo'], // Only supported in Blink browsers
        ['formatting'],
        ['strong', 'em', 'del'],
        ['superscript', 'subscript'],
        ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
        ['unorderedList', 'orderedList'],
        ['horizontalRule'],
        ['removeformat'],
        ['fullscreen']

         ],
    autogrow: true
    });
    </script>
    <!-- =============================== ATT =============================== -->
</body>

</html>