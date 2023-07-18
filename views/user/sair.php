<?php

unset($_SESSION['id_user']);
unset($_SESSION['nome_user']);
unset($_SESSION['email_user']);
unset($_SESSION['senha_user']);
unset($_SESSION['foto_user']);

header("location:../../login.php");

?>