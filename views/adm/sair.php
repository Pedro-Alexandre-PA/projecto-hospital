<?php

unset($_SESSION['id_adm']);
unset($_SESSION['nome_adm']);
unset($_SESSION['email_adm']);
unset($_SESSION['senha_adm']);
unset($_SESSION['chave_adm']);
unset($_SESSION['foto_adm']);
unset($_SESSION['ident_adm']);

header("location:../../login.php");

?>