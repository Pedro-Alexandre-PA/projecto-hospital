<?php


class Relatorio
{
    
    //Metodo para cadastro 

    public function Cadastrar($id_doctor,$nome_paciente,$doenca,$data_internacao,$nome_doctor,$idade,$provincia,$municipio,$bairro,$rua,$texto,$datain){ 
        
        global $pdo;
        
        $sql=$pdo->prepare("INSERT into relatorio values(null,?,?,?,?,?,?,?,?,?,?,?,?)");

        $sql-> execute(array($id_doctor,$nome_paciente,$doenca,$data_internacao,$nome_doctor,$idade,$provincia,$municipio,$bairro,$rua,$texto,$datain));

        return true;
    }


      //selecioner
      public function selecionar(){

        global $pdo;

        $sql=$pdo->prepare("SELECT* FROM relatorio ORDER BY nome ");

        $sql->execute();
        $dados= $sql->fetchAll();

        return $dados;

    }

    // Excluir registo
    public function excluir($id)
    {
        global $pdo;
        $sql=$pdo->prepare("DELETE FROM relatorio WHERE id = $id");

        $sql->execute();

        return true;
    }

     //Metodo para atualizar os dados

     public function AtualizarDados($id,$nome_paciente,$doenca,$data_internacao,$nome_doctor,$idade,$bairro,$rua,$texto,$id_paciente)
     {
         global $pdo;


         if($nome_paciente!=""){ 

            $sql=$pdo->prepare("UPDATE relatorio set nome_paciente=? where id =$id");
              
            $sql-> execute( array($nome_paciente));
    
            }else{
    
            } 
            
            if($id_paciente!=""){ 

                $sql=$pdo->prepare("UPDATE relatorio set nome_paciente=? where id =$id");
                  
                $sql-> execute( array($id_paciente));
        
                }else{
        
                } 

            if($idade!=""){                   
                $sql=$pdo->prepare("UPDATE relatorio set idade=? where id =$id");
                  
                $sql-> execute( array($idade));
        
        
                }else{
        
                }

                        if($rua!=""){                   
                            $sql=$pdo->prepare("UPDATE relatorio set rua=? where id =$id");
                              
                            $sql-> execute( array($rua));
                    
                            }else{
                    
                            }


                                    if($bairro!=""){                   
                                        $sql=$pdo->prepare("UPDATE relatorio set bairro=? where id =$id");
                                          
                                        $sql-> execute( array($bairro));
                                
                                        
                                
                                        }else{
                                
                                        }


                                                if($doenca!=""){                   
                                                    $sql=$pdo->prepare("UPDATE relatorio set doenca=? where id =$id");
                                                      
                                                    $sql-> execute( array($doenca));
                                            
                                            
                                                    }else{
                                            
                                                    }


                                                                if($texto!=""){                   
                                                                    $sql=$pdo->prepare("UPDATE relatorio set texto=? where id =$id");
                                                                      
                                                                    $sql-> execute( array($texto));
                                                            
                                                            
                                                                    }else{
                                                            
                                                                    }



                                                                        if($data_internacao!=""){                   
                                                                            $sql=$pdo->prepare("UPDATE relatorio set data_internacao=? where id =$id");
                                                                              
                                                                            $sql-> execute( array($data_internacao));
                                                                    
                                                                    
                                                                            }else{
                                                                    
                                                                            }

                                        

                                                                              if($nome_doctor!=""){                   
                                                                                    $sql=$pdo->prepare("UPDATE relatorio set nome_doctor=? where id =$id");
                                                                                      
                                                                                    $sql-> execute( array($nome_doctor));
                                                                            
                                                                            
                                                                                    }else{
                                                                            
                                                                                    }

    
        return true;                                                                            

     }


     public function AtualizarDados2($id,$texto)
     {
         global $pdo;


         if($texto!=""){                   
            $sql=$pdo->prepare("UPDATE relatorio set texto=? where id =$id");
              
            $sql-> execute( array($texto));
    
    
            }else{
    
            } 


            return true;  

        } 
 //Metodo para busca especifica

 public function selecaoEspeci($id){

    global $pdo;

    $sql=$pdo->prepare("SELECT* FROM relatorio where id=$id");

    $sql->execute();
    $dados= $sql->fetchAll();

    return $dados;

}

//Metodo para buscar total

public function BuscaTotal($pesquisar,$limite,$inicio){

    global $pdo;

    $id= (int)$pesquisar;

    $sql=$pdo->prepare("SELECT* FROM relatorio WHERE nome_paciente like '%$pesquisar%'
    or id like '$id' or idade like '$pesquisar%' or municipio like '$pesquisar%'
    or bairro like '$pesquisar%' or rua like '$pesquisar%' or data_internacao like '$pesquisar%'
    or nome_doctor like '$pesquisar%' ORDER BY nome_paciente limit $inicio,$limite");

    $sql->execute();

    $dados= $sql->fetchAll();

    return $dados;

}


public function BuscaTotal2($pesquisar){

    global $pdo;

    $id= (int)$pesquisar;

    $sql=$pdo->prepare("SELECT* FROM relatorio WHERE nome_paciente like '%$pesquisar%'
    or id like '$id' or idade like '$pesquisar%' or municipio like '$pesquisar%'
    or bairro like '$pesquisar%' or rua like '$pesquisar%' or data_internacao like '$pesquisar%'
    or nome_doctor like '$pesquisar%' ORDER BY nome_paciente");

    $sql->execute();

    $dados= $sql->fetchAll();

    return $dados;

}

}



?>