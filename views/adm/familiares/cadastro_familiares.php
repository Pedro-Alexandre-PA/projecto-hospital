<?php

include("../../../database/conexao.php");

if (isset($_SESSION["id_adm"])) {
}else{

    header("location:../../../login.php");
}

require '../../../controller/ControllerPaciente.php';
$paciente = new Paciente();

$info=$paciente->selecionar();

require '../../../controller/ControllerFamiliares.php';

$usuario = new Familiares();

//cadastro 2

if(isset($_POST['cadastrar2'])){ 
 
    $nome=$_POST['nome'];
    $id_paciente=$_POST['paciente'];
    $ficha=$_POST['ficha'];
    $telefone=$_POST['telefone'];
    $morada=$_POST['morada'];

                
                    $sql=$pdo->prepare("SELECT* FROM paciente where id=$id_paciente ");

                    $sql->execute();
                    $dds= $sql->fetchAll();

                foreach ($dds as $key => $value) {

                
                if(($usuario->Cadastrar($nome,$id_paciente,$value['nome'],$telefone,$ficha,$morada)==true)){
            
                    header("location:familiares.php");
                    $_SESSION['js2']=3;
        
                }else{
                    echo '<br>
                    <div class="alert alert-danger" style="text-align:center;" role="alert">
                    Erro ao cadastrar
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
                                href="../paciente/paciente.php" aria-expanded="false">
                                <i class="me-3 fas fa-procedures" aria-hidden="true"></i> <span
                                    class="hide-menu">Pacientes</span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="familiares.php" aria-expanded="false">
                                <i class="me-3 fas fa-users" aria-hidden="true"></i><span
                                    class="hide-menu">Familíares</span></a>
                        </li>

                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="../relatorio/relatorio.php" aria-expanded="false">
                                <i class="me-3 fas fa-address-book" aria-hidden="true"></i> <span
                                    class="hide-menu">Relatório</span></a>
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
                        <h3 class="page-title mb-0 p-0">Cadastro</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="familiares.php">Familiares</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Cadastrar Familiar </li>
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
                
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-10">
                        <div class="card">
                            <div class="card-body">
                                <form class="form-horizontal form-material mx-2" method="post">
                                    <div class="form-group">
                                        <label class="col-md-12 mb-0">Nome Completo</label>
                                        <div class="col-md-12">
                                            <input name="nome" type="text" placeholder="Exemplo: Johnathan Doe"
                                                class="form-control ps-0 form-control-line">
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-sm-12">Paciente</label>
                                        <div class="col-sm-12 border-bottom">
                                            <select name="paciente" class="form-select shadow-none border-0 ps-0 form-control-line">
                                                <option value="">-- Seleciona o Paciente --</option>

                                                <?php

                                    foreach ($info as $key => $value) {

                                    echo '

                                    <option value="'.$value['id'].'">'.$value['nome'].'</option>

                                    ';

                                    }

                                    ?>         
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12 mb-0">Morada</label>
                                        <div class="col-md-12">
                                            <input name="morada" type="text" placeholder="Exemplo: Viana - Vila"
                                                class="form-control ps-0 form-control-line">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12 mb-0">Ficha</label>
                                        <div class="col-md-12">
                                            <input name="ficha" type="text" placeholder="Exemplo: 1234"
                                                class="form-control ps-0 form-control-line">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12 mb-0">Telefone</label>
                                        <div class="col-md-12">
                                            <input name="telefone" type="text" placeholder="Exemplo: 945654258"
                                                class="form-control ps-0 form-control-line">
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <div class="col-sm-12 d-flex">
                                            <button type="submit" name="cadastrar2" class="btn btn-success mx-auto mx-md-0 text-white">Cadastrar</button>
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
</body>

</html>