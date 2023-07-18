<?php


class Paciente
{
    
    //Metodo para cadastro 

    public function Cadastrar($nome,$idade,$sexo,$peso,$altura,$data_nasc,$telefone,$bi,$provincia,$municipio
    ,$bairro,$rua,$causa_adm,$estado_adm,$alergia,$doencas,$datain,$data_adm,$data_int,$sala,$nome_doctor,$id_doctor){ 
        
        global $pdo;
        
        $sql=$pdo->prepare("INSERT into paciente values(null,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

        $sql-> execute(array($nome,$idade,$sexo,$peso,$altura,$data_nasc,$telefone,$bi,$provincia,$municipio
        ,$bairro,$rua,$causa_adm,$estado_adm,$alergia,$doencas,$datain,$data_adm,$data_int,$sala,$nome_doctor,$id_doctor));

        return true;
    }


      //selecioner
      public function selecionar(){

        global $pdo;

        $sql=$pdo->prepare("SELECT* FROM paciente ORDER BY nome ");

        $sql->execute();
        $dados= $sql->fetchAll();

        return $dados;

    }

    // Excluir registo
    public function excluir($id)
    {
        global $pdo;
        $sql=$pdo->prepare("DELETE FROM paciente WHERE id = $id");

        $sql->execute();

        return true;
    }

     //Metodo para atualizar os dados

     public function AtualizarDados($id,$nome,$idade,$sexo,$peso,$altura,$data_nasc,$telefone,$bi,$provincia,$municipio
     ,$bairro,$rua,$causa_adm,$estado_adm,$alergia,$doencas,$datain,$data_adm,$data_int,$sala,$nome_doctor,$id_doctor)
     {
         global $pdo;


         if($nome!=""){                   
            $sql=$pdo->prepare("UPDATE paciente set nome=? where id =$id");
              
            $sql-> execute( array($nome));
    
            } 

            if($idade!=""){                   
                $sql=$pdo->prepare("UPDATE paciente set idade=? where id =$id");
                  
                $sql-> execute( array($idade));
    
                }

                if($peso!=""){                   
                    $sql=$pdo->prepare("UPDATE paciente set peso=? where id =$id");
                      
                    $sql-> execute( array($peso));
            
                    }
                    if($altura!=""){                   
                        $sql=$pdo->prepare("UPDATE paciente set altura=? where id =$id");
                          
                        $sql-> execute( array($altura));
                
                
                        }

                        if($rua!=""){                   
                            $sql=$pdo->prepare("UPDATE paciente set rua=? where id =$id");
                              
                            $sql-> execute( array($rua));
                    
                            }

                            if($provincia!=""){                   
                                $sql=$pdo->prepare("UPDATE paciente set provincia=? where id =$id");
                                  
                                $sql-> execute( array($provincia));
                        
                                }

                                if($municipio!=""){                   
                                    $sql=$pdo->prepare("UPDATE paciente set municipio=? where id =$id");
                                      
                                    $sql-> execute( array($municipio));
                            
                                    }

                                    if($bairro!=""){                   
                                        $sql=$pdo->prepare("UPDATE paciente set bairro=? where id =$id");
                                          
                                        $sql-> execute( array($bairro));
                                
                                        }

                                        if($telefone!=""){                   
                                            $sql=$pdo->prepare("UPDATE paciente set telefone=? where id =$id");
                                              
                                            $sql-> execute( array($telefone));
                                    
                                    
                                            }

                                            if($data_nasc!=""){                   
                                                $sql=$pdo->prepare("UPDATE paciente set nome=? where id =$id");
                                                  
                                                $sql-> execute( array($data_nasc));
                                        
                                        
                                                }

                                                if($alergia!=""){                   
                                                    $sql=$pdo->prepare("UPDATE paciente set alergias=? where id =$id");
                                                      
                                                    $sql-> execute( array($alergia));
                                            
                                            
                                                    }

                                                    if($data_adm!=""){                   
                                                        $sql=$pdo->prepare("UPDATE paciente set data_admicao=? where id =$id");
                                                          
                                                        $sql-> execute( array($data_adm));
                                                
                                                
                                                        }

                                                        if($estado_adm!=""){                   
                                                            $sql=$pdo->prepare("UPDATE paciente set estado_admisao=? where id =$id");
                                                              
                                                            $sql-> execute( array($estado_adm));
                                                    
                                                    
                                                            }

                                                            if($doencas!=""){                   
                                                                $sql=$pdo->prepare("UPDATE paciente set antecedentes=? where id =$id");
                                                                  
                                                                $sql-> execute( array($doencas));
                                                        
                                                        
                                                                }

                                                                if($causa_adm!=""){                   
                                                                    $sql=$pdo->prepare("UPDATE paciente set causa_admisao=? where id =$id");
                                                                      
                                                                    $sql-> execute( array($causa_adm));
                                                            
                                                            
                                                                    }

                                                                    if($sala!=""){                   
                                                                        $sql=$pdo->prepare("UPDATE paciente set sala=? where id =$id");
                                                                          
                                                                        $sql-> execute( array($sala));
                                                                
                                                                
                                                                        }

                                                                        if($data_int!=""){                   
                                                                            $sql=$pdo->prepare("UPDATE paciente set data_inter=? where id =$id");
                                                                              
                                                                            $sql-> execute( array($data_int));
                                                                
                                                                    
                                                                            }

                                                                            if($sala!=""){                   
                                                                                $sql=$pdo->prepare("UPDATE paciente set nome=? where id =$id");
                                                                                  
                                                                                $sql-> execute( array($sala));

                                                                        
                                                                                }

                                                                                if($id_doctor!=""){                   
                                                                                    $sql=$pdo->prepare("UPDATE paciente set id_doctor=? where id =$id");
                                                                                      
                                                                                    $sql-> execute( array($id_doctor));
        
                                                                            
                                                                                    }

                                                                                if($nome_doctor!=""){                   
                                                                                    $sql=$pdo->prepare("UPDATE paciente set nome_doctor=? where id =$id");
                                                                                      
                                                                                    $sql-> execute( array($nome_doctor));
                                                                            
                                                                            
                                                                                    }

                                                                                    if($sexo!=""){                   
                                                                                        $sql=$pdo->prepare("UPDATE paciente set sexo=? where id =$id");
                                                                                          
                                                                                        $sql-> execute( array($sexo));
                                                                                
                                                                                        }

                                                                                        return true;
            

     }

      
 //Metodo para busca especifica

 public function selecaoEspeci($id){

    global $pdo;

    $sql=$pdo->prepare("SELECT* FROM paciente where id=$id");

    $sql->execute();
    $dados= $sql->fetchAll();

    return $dados;

}

//Metodo para buscar total

public function BuscaTotal2($pesquisar,$limite,$inicio){

    global $pdo;

    $id= (int)$pesquisar;

    $sql=$pdo->prepare("SELECT* FROM paciente WHERE nome like '%$pesquisar%' or telefone like '$pesquisar%'
    or id like '$id' or peso like '$pesquisar%' or idade like '$pesquisar%' or municipio like '$pesquisar%'
    or bairro like '$pesquisar%' or rua like '$pesquisar%' or data_admicao like '$pesquisar%'
    or estado_admisao like '$pesquisar%' or nome_doctor like '$pesquisar%' ORDER BY nome limit $inicio,$limite");

    $sql->execute();

    $dados= $sql->fetchAll();

    return $dados;

}

public function BuscaTotal($pesquisar){

    global $pdo;

    $id= (int)$pesquisar;

    $sql=$pdo->prepare("SELECT* FROM paciente WHERE nome like '%$pesquisar%' or telefone like '$pesquisar%'
    or id like '$id' or peso like '$pesquisar%' or idade like '$pesquisar%' or municipio like '$pesquisar%'
    or bairro like '$pesquisar%' or rua like '$pesquisar%' or data_admicao like '$pesquisar%'
    or estado_admisao like '$pesquisar%' or nome_doctor like '$pesquisar%' ORDER BY nome ");

    $sql->execute();

    $dados= $sql->fetchAll();

    return $dados;

}
    
}



?>