<?php
require_once "config.php";
$titulo_page = 'Cadastrar Contato'; // Nome da sessão da pagina.
$link_ativo = 'cadastrar'; // Seleciona o array ativo na pagina, verificar no arquivo helper.php.
require_once "includes/header.php";
require_once "controllers/cadastrar.php";
include "templates/alert-mensagens.php"; 
?>

<form class="card" method="POST">
    <div class="row p-3">
        <div class="form-group col-12">
            <label>* Nome:</label>
            <input type="text" name="nome_contato" class="form-control" placeholder="Digite o nome do contato..." required />
        </div>
        <div class="form-group col-md-6">
            <label>* E-mail:</label>
            <input type="email" name="email_contato" class="form-control" placeholder="Digite o e-mail do contato..." required />
        </div>
        <div class="form-group col-md-6">
            <label>* Telefone:</label>
            <input type="tel" name="tel_contato" class="form-control" placeholder="Digite o telefone do contato..." required />
            <small>Formato: 11987654321 ( 9 Números )</small>
        </div>
        <div class="form-group col-12">
            <button class="btn btn-success">
                Cadastrar
            </button>
        </div>
    </div>
</form>

<?php require_once "includes/footer.php"; ?>