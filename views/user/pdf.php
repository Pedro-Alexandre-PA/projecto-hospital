<?php


include("../../database/conexao.php");

if (isset($_SESSION["id_adm"])) {
}else{

    header("location:../../login.php");
}


use Dompdf\Dompdf;

require_once '../../resources/dompdf/autoload.inc.php';


require '../../controller/ControllerPaciente.php';
$paciente = new Paciente();

if ($_GET) {

  $id = $_GET["id"];
}



$dados=$paciente->BuscaTotal($id); 
foreach ($dados as $key => $value) {

$html= '


    <h3 style="text-align:center">Dados iniciais</h3>

 
    <div  style="">

    <h4>Nome Completo:</h4>
    <p style="text-align:just">'.$value['nome'].'</p>

    </div>

    <div style="">

    <h4>Idade:</h4>
    <p>'.$value['idade'].'</p>

    </div>


    <div style="">

    <h4>Gênero:</h4>
    <p>'.$value['sexo'].'</p>

    </div>

    
    <br>

    <div style="">

    <h4>Peso:</h4>
    <p>'.$value['peso'].'</p>

    </div>

    <div style="">

    <h4>Altura:</h4>
    <p>'.$value['altura'].'</p>

    </div>

    <div style="">

    <h4>Data de Nascimento:</h4>
    <p>'.$value['data_nascimento'].'</p>

    </div>


    <br>

    <div style="">

    <h4>Telefone:</h4>
    <p>'.$value['telefone'].'</p>

    </div>

    <div style="">
    <h4>B.I.:</h4>
    <p>'.$value['bi'].'</p>
    </div>
    
    <br>
    <br>

    <h3 style="text-align:center">Endereço</h3>

    <h4>Província:</h4>
    <p>'.$value['provincia'].'</p>

    <h4>Municipio:</h4>
    <p>'.$value['municipio'].'</p>

    <h4>Bairro:</h4>
    <p>'.$value['bairro'].'</p>

    <h4>Rua:</h4>
    <p>'.$value['rua'].'</p>

    <h3 style="text-align:center">Historico</h3>

    <h4>Causa da admissão:</h4>
    <p>'.$value['causa_admisao'].'</p>

    <h4>Estado da admissão:</h4>
    <p>'.$value['estado_admisao'].'</p>

    <h4>Alergias:</h4>
    <p>'.$value['alergias'].'</p>

    <h4>Antecedentes:</h4>
    <p>'.$value['antecedentes'].'</p>

    <h3 style="text-align:center">Internação</h3>

    <h4>Data da admissão:</h4>
    <p>'.$value['data_admicao'].'</p>

    <h4>Data da internação:</h4>
    <p>'.$value['data_inter'].'</p>

    <h4>Sala número:</h4>
    <p>'.$value['sala'].'</p>

    <h4>Nome do doctor responsável:</h4>
    <p>'.$value['nome_doctor'].'</p>
';

}

            

  

$dompdf= new Dompdf();


$dompdf->loadHtml('

<div >

    <h1 style="text-align:center"> Hospital Américo Boa Vida</h1>

    <p style="margin-top:-10px;margin-button:10px; text-align:center"></p>

    <br>

    <hr style="height: 0.1em;">

    <h2 style="text-align:center">Relatório do estado do paciente</h2>

    <hr style="height: 0.1em;">

    <div style="">
    
    '.$html.'

    </div> 

</div> 
     ');

$dompdf->set_option('defaultFont', 'sans');

$dompdf->setPaper('A4','portrait');//landscape

$dompdf->render();

$dompdf->stream();

?>