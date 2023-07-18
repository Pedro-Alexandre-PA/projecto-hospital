<?php 

session_start();
/* 

Conexão com a BD 

*/
global $pdo;

try{
	
$pdo= new PDO('mysql:host=localhost;dbname=hospital','root','');

$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


}catch(Exception $e){

	echo '<br>
	<br>
	<div class="alert alert-danger" style="text-align:center; role="alert">
	Não foi possivel conectar-se a base de dados.\n Porfavor tente novamente mais tarde!
	</div>' ;

}

 ?>