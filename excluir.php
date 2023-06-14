<?php

include 'conexao.php';/** Quando clica no botão de excluir na página listagem.php, abre a conexão e recebe os dados digitados no formulário*/

$id = $_POST['id'];

$recebendo_cadastros = "DELETE FROM tb_cliente WHERE id = '$id'"; /**Exclui da tabela o id recebido ao se clicar no botão excluir*/

$query_cadastros = mysqli_query($connx,$recebendo_cadastros); /**Validando a query */

header('location: index.php'); /**serve para voltar para a página de listagem */

?>