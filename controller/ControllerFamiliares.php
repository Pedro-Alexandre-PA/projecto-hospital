<?php


class Familiares
{
    
    //Metodo para cadastro 

    public function Cadastrar($nome,$id_paciente,$nome_paciente,$telefone,$ficha,$morada){ 
        
        global $pdo;
        
        $sql=$pdo->prepare("INSERT into familiar values(null,?,?,?,?,?,?)");

        $sql-> execute(array($nome,$id_paciente,$nome_paciente,$telefone,$ficha,$morada));

        return true;
    }

    public function Login($nome,$senha)
    {
        global $pdo;

         $sql = $pdo->prepare("SELECT* from familiar WHERE nome= :nome AND ficha= :senha");

            $sql->bindValue("nome", $nome);
            $sql->bindValue("senha",$senha);
			$sql->execute();

			if ($sql->rowCount()==1) {

				$dado= $sql->fetch();

				$_SESSION['id_user']=$dado['id'];
				$_SESSION['nome_user']=$dado['nome'];
                $_SESSION['senha_user']=$dado['senha'];
                $_SESSION['foto_user']=$dado['foto'];
                $_SESSION['id_paciente']=$dado['id_paciente'];


				return true;

			}else{

				return false;
			}
    }


      //selecioner
      public function selecionar(){

        global $pdo;

        $sql=$pdo->prepare("SELECT* FROM familiar ORDER BY nome ");

        $sql->execute();
        $dados= $sql->fetchAll();

        return $dados;

    }

    // Excluir registo
    public function excluir($id)
    {
        global $pdo;
        $sql=$pdo->prepare("DELETE FROM familiar WHERE id = $id");

        $sql->execute();

        return true;
    }

     //Metodo para atualizar os dados

     public function AtualizarDados($id,$nome,$id_paciente,$nome_paciente,$telefone,$ficha,$morada)
     {
         global $pdo;


         if($nome!=""){                   
            $sql=$pdo->prepare("UPDATE familiar set nome=? where id =$id");
              
            $sql-> execute( array($nome));
    
    
            }

        if($nome!=""){ 

                $sql=$pdo->prepare("UPDATE familiar set nome=? where id =$id");
                  
                $sql-> execute( array($nome));
        
                }

            if($id_paciente!=""){  

            $sql=$pdo->prepare("UPDATE familiar set id_paciente=? where id =$id");
            
            $sql-> execute( array($id_paciente));
    
            }

        
            if($nome_paciente!=""){  

                $sql=$pdo->prepare("UPDATE familiar set nome_paciente=? where id =$id");
                
                $sql-> execute( array($nome_paciente));
        
                }
         
         if($telefone!=""){   

            $sql=$pdo->prepare("UPDATE familiar set telefone=? where id =$id");
              
            $sql-> execute( array($telefone));
    
            }


         if($ficha!=""){  

            $sql=$pdo->prepare("UPDATE familiar set ficha=? where id =$id");
              
            $sql-> execute( array($ficha));
    
            }

         if($morada!=""){  

            $sql=$pdo->prepare("UPDATE familiar set morada=? where id =$id");
              
            $sql-> execute( array($morada));
    
            }

        return true;

     }

      
 //Metodo para busca especifica

 public function selecaoEspeci($id){

    global $pdo;

    $sql=$pdo->prepare("SELECT* FROM familiar where id=$id");

    $sql->execute();
    $dados= $sql->fetchAll();

    return $dados;

}

//Metodo para buscar total

public function BuscaTotal($pesquisar,$limite,$inicio){

    global $pdo;

    $id= (int)$pesquisar;

    $sql=$pdo->prepare("SELECT* FROM familiar WHERE nome like '%$pesquisar%' or telefone like '$pesquisar%'
    or ficha like '$pesquisar' or morada like '$pesquisar%' or nome_paciente like '$pesquisar%' ORDER BY nome limit $inicio,$limite  ");

    $sql->execute();

    $dados= $sql->fetchAll();

    return $dados;

}
    
}



?>