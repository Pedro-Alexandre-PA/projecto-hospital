<?php

include("database/conexao.php");

require 'ControllerUsuario.php';
require 'ControllerFamiliares.php';

// instancia da classe taxista
$u = new Usuario();
$f = new Familiares();

$x=0;
//Login do Adm
if(isset($_POST['login'])){ 

    
        if (isset($_POST['nome']) && isset($_POST['senha'])&& $_POST['nome']!="" && $_POST['senha']!=""){
  
            $nome = addslashes($_POST['nome']);
            $senha =addslashes($_POST['senha']);
          
            //verificando login
                if(($u->login($nome,$senha))==true){

                    if (isset($_SESSION['id_adm'])) {
                    
                        if ($_SESSION['chave_adm']=="Administrador") {
                    
                            header("location:views/adm/index.php");
                            $_SESSION['js2']=3;
                    
                        }

                     
                    }else{
                        
                        header("location:login.php");
                    }

                }else if(($f->login($nome,$senha))==true){

                    if (isset($_SESSION['id_user'])) {
                    
                   
                            $_SESSION['js2']=3;
                            
                    
                            header("location:views/user/index.php");
                        }
                     
                    }else{

                        $_SESSION['js2']=9;
                        
                    }

                } else{

                    $_SESSION['js2']=10;
                
            }
    }else{

          
 }

?>