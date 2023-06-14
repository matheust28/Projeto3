<?php

include 'conexao.php';/** Quando clica no botão de cadastro na página listagem.php, abre a conexão e recebe os dados digitados no formulário*/

$nome = $_POST['nome'];
$email = $_POST['email'];
$ddd = $_POST['ddd'];
$telefone = $_POST['telefone'];

$recebendo_cadastros = "INSERT INTO /**Insere os dados recebidos na tabela do banco de dados*/
tb_cliente
VALUES ('', '$nome', '$email','$ddd','$telefone')";
$query_cadastros = mysqli_query($connx,$recebendo_cadastros);/**Validando a query */

header('location: index.php'); /**serve para voltar para a página de listagem */

?>