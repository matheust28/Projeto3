<?php
include 'conexao.php'; 
$buscar_cadastros = "SELECT * FROM tb_cliente ";
$query_cadastros = mysqli_query($connx, $buscar_cadastros); 

?>

<!DOCTYPE HTML>
<html lang="pt-br"> 
   <head>
    <title>Nosso Crud - Bem Vindo!</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <link rel="icon" href="./shutterstock_519298150.jpg" type="image/x-icon">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <style>
      .topo {
        position: relative;
        background-color: rgb(9, 9, 9);
        width: 100%;
        top: 0px;
        height: 185px;
        padding: 20px;        
        margin-bottom: 50px;      
        align-items: center;
      }
      table.header{
        font-family: Arial, Helvetica, sans-serif;
        font-weight: bolder;
        font-size: larger;        
      }
      #cadastroForm{
        position: relative;
        top: 15px;
        align-self: center;       
        background-image: linear-gradient(to right, lightgrey, white, lightgrey);
        border-radius: 8px;
        padding: 20px;
        margin-top: 10px;
        margin-bottom: 120px;
        margin-left: auto;
        margin-right: auto;
        width: 85%;       
      }      
      #cadastroForm.input{
        border-radius: 5px;
        padding: 5px;
        margin-top: 5px;
        margin-bottom: 5px;        
      }
      #cadastroForm.td{
        width: 25%;
        color: rgb (102, 151, 99);
      }
      #cadastroForm.button{
        width: 25%;
        color: rgb (102, 151, 99);
      }    
      .listagem {
        margin-top: 10px;
      }
      .listagem table {
        margin: 0 auto;
      }
      .listagem th{
        padding: 5px;
      }
      .listagem td {
        padding: 5px;
      }
      #cadbtn {
        background-color: green;
        font-weight: bold;
        border-radius: 5px;
        color: whitesmoke;
        border-style: none;
        height: 31px;
        padding: 4px;
        width:90px;        
      }
      #editbtn{
        font-weight: bold;
        border-radius: 5px;
        color: whitesmoke;
        border-style: none;
        height: 35px;
        padding: 4px;
        width:70px;
      }
      #excluibtn{
        background-color: orangered;
        font-weight: bold;
        border-radius: 5px;
        color: whitesmoke;
        border-style: none;
        height: 35px;
        padding: 4px;
        width:70px;
      }
      #largura1, #largura2{
        width: 430px;
      }
      #largura3 {
        width: 50px;
      }
      #largura4 {
        width: 100px;
      }
      #espaco1{
        border-radius: 4px;
        width: 440px;
        border-width:  1px;
        border-style: groove;
      }      
      #espaco2{
        position: relative;
        border-radius: 4px;
        width: 440px;
        border-width:  1px;
        border-style: groove;
      }
      #espaco3 {        
        border-radius: 4px;
        width: 45px;
        border-width:  1px;
        border-style: groove;
      }
      #espaco4 {
        border-radius: 4px;
        width: 160px;
        border-width:  1px;
        border-style: groove;
      }
      #cadastrar{
        border-spacing: 10px;
      }
      
    </style>  

   </head>
   <body>
  
   <div class="topo"><!--Div para acomodar a parte de cadastro -->

       <form id="cadastroForm" action="cadastro.php" method="post"><!--Quando clicar em submit, vai mandar os dados do formulário para a página cadastro.php-->
         
          <table id="cadastrar">
           <thead id="cabecalhosuperior"> <!--Cabeçalho da tabela de cadastro-->
             <th><!--Coluna reservada para o ID--></th>
             <th>Nome</th>
             <th>e-mail</th>
             <th>DDD</th>
             <th>Celular</th>
           </thead>
           <tbody>
             <td><!--Coluna reservada para o ID--></td>
             <td id="largura1"> <input id="espaco1" type="text" name="nome" maxlength="50"placeholder="Informe o nome completo" required> </td>
             <td id="largura2"> <input id="espaco2" type="email" name="email" maxlength="50"placeholder="Informe o e-mail "required>  </td>
             <td id="largura3"> <input id="espaco3" type="text" name="ddd" maxlength="2" placeholder="DDD com 2 dígitos" required>  </td>
             <td id="largura4"> <input id="espaco4" type="text" name="telefone" maxlength="9" placeholder="Celular com 9 dígitos" required> </td>
             <td> 
             
               <button 
                  type="button" 
                  class="btn btn-primary" id="cadbtn"
                  onclick="validarCadastro()">Cadastrar
                </button> 
             </td>
           </tbody>
         </table>  
       </form>
    </div><!--Fim da div do cadastro -->
        
    <div class="listagem"><!--Div para acomodar a parte de edição, exclusão e listagem -->
      <table class="lista">
        <thead> <!--Cabeçalho da tabela-->
          <th>ID</th>
          <th>Nome</th>
          <th>Email</th>
          <th>DDD</th>
          <th>Celular</th>
          <th>Ações</th>
        </thead>
        <tbody><!--Corpo da tabela-->
           <?php 
           while ($receber_cadastros = mysqli_fetch_array($query_cadastros)) //roda enquanto houver registros no banco de dados, busca no array
           {
           $id = $receber_cadastros ['id'];
           $nome = $receber_cadastros ['nome'];
           $email = $receber_cadastros ['email'];
           $ddd = $receber_cadastros ['ddd'];
           $telefone = $receber_cadastros ['telefone'];               
           ?>
            <tr><!--Linha 1 da tabela-->
               <td scope="row"><?php echo $id; ?></td> 
               <td><?php echo $nome; ?></td>
               <td><?php echo $email; ?></td>
               <td><?php echo $ddd; ?></td>
               <td><?php echo $telefone; ?></td>

               <td><!--Início da célula que contém o Botão "Editar" -->
                   <button class="btn btn-primary" id = "editbtn" data-toggle="modal" data-target="#editModal<?php echo $id; ?>">Editar</button>
                   <!-- Modal de edição -->
                   <div class="modal fade" id="editModal<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                     <div class="modal-dialog" role="document">
                         <div class="modal-content">
                             <div class="modal-header">
                                 <h5 class="modal-title" id="editModalLabel">Editar Dados</h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                   <span aria-hidden="true">&times;</span>
                                 </button>
                              </div><!--fim da div modal header -->
                              <div class="modal-body">
                                 <!-- Formulário de edição -->
                                 <form action="editar.php" method="post">
                                   <div class="form-group">
                                     <input type="hidden" name="id" value="<?php echo $receber_cadastros ['id']; ?>">
                                   </div>
                                   <div class="form-group">
                                     <label for="editNome">Nome</label>
                                     <input type="text" placeholder="Informe o nome completo" required class="form-control" id="editNome" name="nome" value="<?php echo $receber_cadastros ['nome']; ?>">
                                   </div>
                                   <div class="form-group">
                                     <label for="editEmail">e-mail</label>
                                     <input type="email" placeholder="Informe o e-mail" required class="form-control" id="editEmail" name="email" value="<?php echo $receber_cadastros ['email']; ?>">
                                    </div>
                                   <div class="form-group">
                                     <label for="editDDD">DDD</label>
                                     <input type="text" pattern="[0-9]{2}" maxlength="2" placeholder="Informe o DDD com 2 dígitos" required class="form-control" id="editDDD" name="ddd" value="<?php echo $receber_cadastros ['ddd']; ?>">
                                    </div>
                                    <div class="form-group">
                                     <label for="editTelefone">Celular</label>
                                     <input type="text" pattern="[0-9]{9}" maxlength="9" placeholder="Informe o celular com 9 dígitos" required class="form-control" id="editTelefone" name="telefone" value="<?php echo $receber_cadastros ['telefone']; ?>">
                                    </div>                          
                                    <div class="modal-footer">
                                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                       <button type="submit" class="btn btn-primary" onclick="confirmarEdicao()">Salvar</button>                                     
                                    </div>
                                   </form><!--fim do formulário de edição -->                       
                                </div><!--fim da div modal body -->
                           </div><!--fim da div modal content -->                               
               </td><!-- Fim da célula que contém o botão editar -->

               <td><!-- Início da célula que contém o botão excluir -->
                <form action="excluir.php" method="post"><!--Quando clicar em submit, vai mandar os dados do formulário para a página excluir.php-->
                  <input type="hidden" name="id" value ="<?php echo $id; ?>">  <!--Hidden serve para que o campo id não seja exibido-->
                  <input type="submit" id = "excluibtn" value = "Excluir" onclick="confirmarExclusao()">
                </form>
               </td><!-- Fim da célula que contém o botão excluir -->

             </tr><!--Fim da linha 1 da tabela-->

           <?php }; /**fechamento do while */ ?>

         </tbody><!--Fim do corpo da tabela-->

       </table><!-- Fim da tabela "lista" -->

     </div><!-- Fim da div "listagem" -->
     
     <script>
        
        function validarCadastro() {//início de função que valida o formato dos campos do cadastro
          
          var nome = document.getElementsByName('nome')[0].value;
          var email = document.getElementsByName('email')[0].value;
          var ddd = document.getElementsByName('ddd')[0].value;
          var telefone = document.getElementsByName('telefone')[0].value;  
          var resposta = confirm("Confirma o cadastro?");
          // Realiza a validação dos formatos dos campos
          var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
          var dddRegex = /^\d{2}$/;
          var telefoneRegex = /^\d{9}$/;
          // Verifica se os campos estão preenchidos
          if (nome === '' || email === '' || ddd === '' || telefone === '') {
          alert('Por favor, preencha todos os campos.');
          return false;
          }        
          // Emite mensagens sobre os erros
          if (!email.match(emailRegex)) {
          alert('Por favor, insira um endereço de e-mail válido.');
          return false;
          }
          if (!ddd.match(dddRegex)) {
          alert('Por favor, insira um DDD válido com 2 dígitos numéricos.');
          return false;
          }
          if (!telefone.match(telefoneRegex)) {
          alert('Por favor, insira um número de telefone válido com 9 dígitos numéricos.');
          return false;
          }
          //Confirma com o usuário se deseja cadastrar os dados
          if (resposta == true) {
          document.getElementById("cadastroForm").submit();
          } else {
          // Limpar os campos do formulário
          document.getElementById("cadastroForm").reset();
          }
        }//fim da função de valida o formato dos campos do cadastro
          

       
        function confirmarEdicao() {
          
        var resposta = confirm("Confirma as alterações?");
        if (resposta == false) {
        event.preventDefault();
        }
        }   

        function confirmarExclusao() {
        var resposta = confirm("Atenção: Não será possível desfazer essa ação! Deseja excluir permanentemente este registro?");
        if (resposta == false) {
        event.preventDefault();
        }
        }
      </script>
     
   </body>
</html>