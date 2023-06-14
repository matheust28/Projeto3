<?php

include 'conexao.php';/** Quando clica no botão de editar na página listagem.php, abre a conexão e recebe os dados digitados no formulário*/

$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$ddd = $_POST['ddd'];
$telefone = $_POST['telefone'];

$recebendo_cadastros = "UPDATE  tb_cliente /**altera/edita na tabela os dados recebidos pelo formulário*/
 SET
   nome = '$nome', 
   email ='$email', 
   ddd ='$ddd',
   telefone = '$telefone'
   WHERE id = '$id'";

$query_cadastros = mysqli_query($connx, $recebendo_cadastros); // Validando a query 

header('location: index.php'); //serve para voltar para a página de listagem 

?>