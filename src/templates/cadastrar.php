<?php

require_once "config.php";

$link_ativo = 'cadastrar';
require_once "includes/header.php";

?>

<div class="alert alert-danger">
    Não foi possível cadastrar o contato
</div>

<div class="alert alert-success">
    Cadastro realizado com sucesso
</div>

<form class="card" method="POST">
    <div class="row p-3">
        <div class="form-group col-12">
            <label>* Nome:</label>
            <input type="text" name="nome_contato" class="form-control" placeholder="Digite o nome do contato..." />
        </div>
        <div class="form-group col-md-6">
            <label>* E-mail:</label>
            <input type="email" name="email_contato" class="form-control" placeholder="Digite o e-mail do contato..." />
        </div>
        <div class="form-group col-md-6">
            <label>* Telefone:</label>
            <input type="tel" name="tel_contato" class="form-control" placeholder="Digite o telefone do contato..." />
        </div>
        <div class="form-group col-12">
            <button name="cadastrar_contato" class="btn btn-success">
                Cadastrar
            </button>
        </div>
    </div>
</form>

<?php require_once "includes/footer.php"; ?>