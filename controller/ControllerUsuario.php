<?php



class Usuario {


    //Metodo para cadastras os admn

    public function Cadastrar($nome,$senha,$chave,$novo_nome){ 
        
        global $pdo;
        
        $sql=$pdo->prepare("INSERT into usuarios values(null,?,?,?,?)");

        $sql-> execute(array($nome,md5($senha),$chave,$novo_nome));

        return true;

    }

    public function selecionar(){

        global $pdo;

        $sql=$pdo->prepare("SELECT* FROM usuarios ORDER BY nome");

        $sql->execute();
        $dados= $sql->fetchAll();

        return $dados;

    }

    public function BuscaTotal($pesquisar,$limite,$inicio){

        global $pdo;
    
        $id= (int)$pesquisar;
    
        $sql=$pdo->prepare("SELECT* FROM usuarios WHERE nome like '%$pesquisar%'
        or chave like '$pesquisar%' ORDER BY nome limit $inicio,$limite ");
    
        $sql->execute();
    
        $dados= $sql->fetchAll();
    
        return $dados;
    
    }

    //Metodo para busca especifica

 public function selecaoEspeci($id){

    global $pdo;

    $sql=$pdo->prepare("SELECT* FROM usuarios where id=$id");

    $sql->execute();
    $dados= $sql->fetchAll();

    return $dados;

}
    
    
    
    //Metodo para login do adm

    public function Login($nome,$senha)
    {
        global $pdo;

         $sql = $pdo->prepare("SELECT* from usuarios WHERE nome= :nome AND senha= :senha");

            $sql->bindValue("nome", $nome);
            $sql->bindValue("senha",md5($senha));
			$sql->execute();

			if ($sql->rowCount()==1) {

				$dado= $sql->fetch();

				$_SESSION['id_adm']=$dado['id'];
				$_SESSION['nome_adm']=$dado['nome'];
                $_SESSION['senha_adm']=$dado['senha'];
                $_SESSION['chave_adm']=$dado['chave'];
                $_SESSION['foto_adm']=$dado['foto'];


				return true;

			}else{

				return false;
			}
    }
    
   
    
    
    //Metodo para atualizar os dados do adm

    public function AtualizarDados($id,$nome,$senha,$email,$novo_nome)
    {
        global $pdo;

        if($novo_nome!=""){                   
            $sql=$pdo->prepare("UPDATE usuarios set foto=? where id =$id");
              
            $sql-> execute( array($novo_nome));
            
            }


        if($senha!=""){                   
            $sql=$pdo->prepare("UPDATE usuarios set senha=? where id =$id");
              
            $sql-> execute( array(md5($senha)));
            
    
            }


        if($nome!=""){                   
            $sql=$pdo->prepare("UPDATE usuarios set nome=? where id =$id");
              
            $sql-> execute( array($nome));
            
    
            }

            return true;


    }

    // Excluir registo
    public function excluir($id)
    {
        global $pdo;
        $sql=$pdo->prepare("DELETE FROM usuarios WHERE id = $id");

        $sql->execute();

        return true;
    }
 
}



?>