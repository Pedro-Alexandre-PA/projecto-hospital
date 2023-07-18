<?php

include("controller/Usuario.php");



?>
<!doctype html>
<html lang="pt">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="resources/css/novo.css" rel="stylesheet" >
    <link href="resources/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link href="resources/switalert/sweetalert2.min.css" rel="stylesheet" >
    <script src="resources/switalert/sweetalert2.min.js"></script>
    <style>

    .input:hover{
      
      transition:1s;

      border-bottom: solid 2px #39ace7;
      background-color:#fff;
      
    }

    .input{

      background-color:#F6F6F6;
      margin-top:20px;

      border:none;
      border-bottom: solid 2px #fff;
      transition:1s;

    }

    .input2:hover{
      
      transition:1s;

      border-bottom: solid 2px #39ace7;
      background-color:#fff;
      
    }

    .input2{

      background-color:#F6F6F6;
      margin-top:20px;

      border:none;
      border-bottom: solid 2px #fff;
      transition:1s;

    }

    </style>

  </head>
  
  <body  style="background-image: url('assets/img/img3.jpg');
   background-size: 1360px 700px;">


  <div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div  style="margin-top: 20px;">
      <h1 style="font-weight: 900em;">Login</h1>
    </div>
    <br>

    <!-- Login Form -->
    <form method="post" >
    <input class="input2" type="text" style=" text-align:center; padding-top:5px;
      padding-botton:25px; width:380px; height:60px;" id="Nome"  name="nome" placeholder="Nome">
      
      <input class="input" type="password" style=" text-align:center; padding-top:5px;
      padding-botton:25px; width:380px; height:60px;" id="Senha"  name="senha" placeholder="Senha">
      <br>
      <br>
      <input type="submit" class="fadeIn fourth" name="login" value="Entrar">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      
    </div>

    <?php

if($x==1){
  
  echo '<script src="resources/js2/custom.js"></script>';
}elseif($x==2){
  
  echo '<script src="resources/js2/custom2.js"></script>';
}
?>

  </div>
</div>




    <script src="resources/bootstrap/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <script src="resources/switalert/sweetalert2.min.js"></script>
    
    
   
  </body>
</html>

