<?php


include("../../database/conexao.php");

if (isset($_SESSION["id_adm"])) {
}else{

    header("location:../../login.php");
}


use Dompdf\Dompdf;

require_once '../../resources/dompdf/autoload.inc.php';


require '../../controller/ControllerRelatorio.php';

$relatorio = new Relatorio();

if ($_GET) {

  $id = $_GET["id"];
}



$dados= $relatorio->selecaoEspeci($id); 

foreach ($dados as $key => $value) {

$html= '

<div style="width:900px; margin: 0 auto;margin-left:50px;">

<p style="text-align:just"> O(A) Sr.'.$value['nome_paciente'].','.$value['idade'].' de idade, natural de '.$value['provincia'].', no município de '.$value['municipio'].', no bairro '.$value['bairro'].',<br> rua '.$value['rua'].' internado aos
'.$value['data_internacao'].'.</p>

<h4>Indicações Do Doctor</h4>
<p>'.$value['texto'].'</p>

<br>


<h5 style="margin-top:500px" >Doctor: '.$value['nome_doctor'].'</h5> <h5 style="text-align:just">Data: '.$value['datain'].'</h5>

<div>

';


}

            

  

$dompdf= new Dompdf();


$dompdf->loadHtml('

<div >

    <h1 style="text-align:center"> Hospital Américo Boa Vida</h1>

    <p style="margin-top:-10px;margin-button:10px; text-align:center"></p>

    <br>

    <hr style="height: 0.1em;">

    <br>

    <h3 style="margin-left:50px;">Relatório Médico</h3>


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