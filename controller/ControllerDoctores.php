<?php


class Doctor
{
    
    //Metodo para cadastro 

    public function Cadastrar($nome,$especialidade,$email,$morada,$telefone,$novo_nome){ 
        
        global $pdo;
        
        $sql=$pdo->prepare("INSERT into doctor values(null,?,?,?,?,?,?)");

        $sql-> execute(array($nome,$especialidade,$email,$morada,$telefone,$novo_nome));

        return true;
    }

      //selecioner
      public function selecionar(){

        global $pdo;

        $sql=$pdo->prepare("SELECT* FROM doctor ORDER BY nome ");

        $sql->execute();
        $dados= $sql->fetchAll();

        return $dados;
    }

    // Excluir registo
    public function excluir($id)
    {
        global $pdo;
        $sql=$pdo->prepare("DELETE FROM doctor WHERE id = $id");

        $sql->execute();

        return true;
    }

     //Metodo para atualizar os dados

     public function AtualizarDados($id,$nome,$especialidade,$email,$morada,$telefone,$novo_nome)
     {
         global $pdo;


         if($especialidade!=""){                   
            $sql=$pdo->prepare("UPDATE doctor set horario=? where id =$id");
              
            $sql-> execute( array($especialidade));
    
            } 

            if($nome!=""){                   
         $sql=$pdo->prepare("UPDATE doctor set nome=? where id =$id");
           
         $sql-> execute( array($nome));
 
         }
         
         if($telefone!=""){                   
            $sql=$pdo->prepare("UPDATE doctor set telefone=? where id =$id");
              
            $sql-> execute( array($telefone));
    
            }


         if($email!=""){                   
            $sql=$pdo->prepare("UPDATE doctor set email=? where id =$id");
              
            $sql-> execute( array($email));
    
            }

         if($morada!=""){                   
            $sql=$pdo->prepare("UPDATE doctor set morada=? where id =$id");
              
            $sql-> execute( array($morada));

            }

            return true;

     }

      
 //Metodo para busca especifica

 public function selecaoEspeci($id){

    global $pdo;

    $sql=$pdo->prepare("SELECT* FROM doctor where id=$id");

    $sql->execute();
    $dados= $sql->fetchAll();

    return $dados;

}

//Metodo para buscar total

public function BuscaTotal($pesquisar,$limite,$inicio){

    global $pdo;

    $id= (int)$pesquisar;

    $sql=$pdo->prepare("SELECT* FROM doctor WHERE nome like '%$pesquisar%' or telefone like '$pesquisar%'
    or id like '$id' or morada like '$pesquisar%' or especialidade like '$pesquisar%' ORDER BY nome limit $inicio,$limite ");

    $sql->execute();

    $dados= $sql->fetchAll();

    return $dados;

}
    
}



?>