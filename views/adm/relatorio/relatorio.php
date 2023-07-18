
<?php

include("../../../database/conexao.php");

if (isset($_SESSION["id_adm"])) {
}else{

    header("location:../../../login.php");
}


require '../../../controller/ControllerRelatorio.php';
$relatorio = new Relatorio();

$pagina=1;

if(isset($_GET['pagina'])){ 
  $pagina= filter_input( INPUT_GET,"pagina",FILTER_VALIDATE_INT);
}

if (isset($pagina)) {

}else{
    $pagina=1;
}


$limite=2;

$inicio= ($pagina * $limite) - $limite;

$sql=$pdo->prepare("SELECT COUNT(nome_paciente) count FROM relatorio");

    $sql->execute();

    $registros=$sql->fetch()["count"];

    $paginas= ceil($registros / $limite);

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

    <script src="../../../resources/switalert/sweetalert2.min.js"></script>

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

                        <li class="nav-item hidden-sm-down">
                            <form class="app-search ps-3" method="post">
                                <input type="text" name="pesquisar" class="form-control" placeholder="Procurar por..."> 
                                 <a
                                    class="srh-btn"><button name="buscar" 
                                    type="submit" style="background:none;border:none;"><i class="ti-search"></i></button></a>
                            </form>
                        </li>
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
                                href="../familiares/familiares.php" aria-expanded="false">
                                <i class="me-3 fas fa-users" aria-hidden="true"></i><span
                                    class="hide-menu">Familíares</span></a>
                        </li>

                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="relatorio.php" aria-expanded="false">
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
                        <h3 class="page-title mb-0 p-0">Relatórios</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Relatório</li>
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
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-md-flex">
                                    <h4 class="card-title col-md-10 mb-md-0 mb-3 align-self-center">Relatório </h4>

                                    
                                    
                                    <a style="margin-right:0px;" href="cadastro_relatorio.php"><button class="btn " style="background-color:#2d2e30;color:#fff;width:150px;" 
                                  ><i class="fas fa-address-book"></i> Add Relatório</button></a> 
                                    
                                </div>
                                <div class="table-responsive mt-5">
                                    <table class="table stylish-table no-wrap" style="height:200px;">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0" colspan="2">Relatório</th>
                                                <th class="border-top-0">Nome</th>
                                                <th class="border-top-0">Morada</th>
                                                <th class="border-top-0">Data</th>
                                                <th class="border-top-0" style="text-align:center;">Ação</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php

                                        if(isset($_POST['buscar'])!=""){

if(($pesquisar=$_POST['pesquisar'])!=""){ 


$result=$relatorio->BuscaTotal($pesquisar,$limite,$inicio);

foreach ($result as $key => $value) {

echo '


<td style="width:50px;"><span class="round"> </span></td>
<td class="align-middle">
    <h6>Relatório</h6><small class="text-muted">Paciente</small>
</td>
<td class="align-middle">'.$value['nome_paciente'].'</td>
<td class="align-middle">'.$value['municipio'].'-'.$value['municipio'].'</td>
<td class="align-middle">'.$value['datain'].'</td>
<td class="align-middle"><a href="../pdf2.php?id='.$value['id'].';"><i class="fas fa-file-pdf"></i></a></td>
<td class="align-middle"><a href="editar_relatorio.php?id='.$value['id'].';"><i class="far fa-edit"></i></a></td>
<td class="align-middle"><a href="excluir_relatorio.php?id='.$value['id'].';"><i class="far fa-trash-alt"></i></a></td>
</tr>

';
}
}else{ 

    $sql=$pdo->prepare("SELECT* FROM relatorio ORDER BY nome_paciente limit $inicio,$limite ");

        $sql->execute();
        $dados= $sql->fetchAll();

foreach ($dados as $key => $value) {

echo '

<td style="width:50px;"><span class="round"> </span></td>
<td class="align-middle">
    <h6>Relatório</h6><small class="text-muted">Paciente</small>
</td>
<td class="align-middle">'.$value['nome_paciente'].'</td>
<td class="align-middle">'.$value['municipio'].'-'.$value['municipio'].'</td>
<td class="align-middle">'.$value['datain'].'</td>
<td class="align-middle"><a href="../pdf2.php?id='.$value['id'].';"><i class="fas fa-file-pdf"></i></a></td>
<td class="align-middle"><a href="editar_relatorio.php?id='.$value['id'].';"><i class="far fa-edit"></i></a></td>
<td class="align-middle"><a href="excluir_relatorio.php?id='.$value['id'].';"><i class="far fa-trash-alt"></i></a></td>
</tr>

';

}
}

}else{ 

    $sql=$pdo->prepare("SELECT* FROM relatorio ORDER BY nome_paciente limit $inicio,$limite ");

        $sql->execute();
        $dados= $sql->fetchAll();

foreach ($dados as $key => $value) {

echo '
<td style="width:50px;"><span class="round"> </span></td>
<td class="align-middle">
    <h6>Relatório</h6><small class="text-muted">Paciente</small>
</td>
<td class="align-middle">'.$value['nome_paciente'].'</td>
<td class="align-middle">'.$value['municipio'].'-'.$value['municipio'].'</td>
<td class="align-middle">'.$value['datain'].'</td>
<td class="align-middle"><a href="../pdf2.php?id='.$value['id'].';"><i class="fas fa-file-pdf"></i></a></td>
<td class="align-middle"><a href="editar_relatorio.php?id='.$value['id'].';"><i class="far fa-edit"></i></a></td>
<td class="align-middle"><a href="excluir_relatorio.php?id='.$value['id'].';"><i class="far fa-trash-alt"></i></a></td>
</tr>
';

}
}
   ?>                                       
                                        </tbody>
                                    </table>
                                    
<div style="text-align:center">

<a href="?pagina=<?php
if($pagina!=1){
    echo $pagina-1;
}else{
    echo $pagina;
}
 ?>"><button class="btn " style="background-color:#ccc;color:#000;"> 
 << </button>
</a>

 <p style="color:#000;font-size:12pt; display:inline"> <?php echo $pagina. "  "; ?> </p> 
 
 <a href="?pagina=<?php
if($pagina<$paginas){
    echo $pagina+1;
}else{
    echo $pagina;
}
 ?>">
  <button class="btn " style="background-color:#ccc;color:#000;"> >></button>
 </a>

</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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

    <?php


        if( isset($_SESSION['js2']) && $_SESSION['js2']==3){
        
        echo '<script src="../../../resources/js2/custom4.js"></script>';

        unset($_SESSION['js2']);
        }

        if( isset($_SESSION['js2']) && $_SESSION['js2']==5){
        
            echo '<script src="../../../resources/js2/custom5.js"></script>';
    
            unset($_SESSION['js2']);
            }

            if( isset($_SESSION['js2']) && $_SESSION['js2']==6){
        
                echo '<script src="../../../resources/js2/custom6.js"></script>';
        
                unset($_SESSION['js2']);
                }

        ?>

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
</body>

</html>