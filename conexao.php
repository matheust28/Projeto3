<?php

$host = "localhost"; //se estivesse na web seria o endereço de onde está hospedado
$user = 'root';
$passwd = '';
$bd_name = 'exemplo_crud_basico';

//aqui conecta com o banco de dados
$connx = mysqli_connect($host, $user, $passwd, $bd_name); 

?>