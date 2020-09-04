<?php

require_once "config.php";

$titulo_page = 'Editar Contato';

require_once "includes/header.php";

require_once "controllers/editar.php";

include "templates/alert-mensagens.php";

?>

<form class="card" method="POST">
<input type="hidden" name="contato_id" value="<?= $contato->getId(); ?>">
    <div class="row p-3">
        <div class="form-group col-12">
            <label>* Nome:</label>
            <input type="text" name="nome_contato" class="form-control" placeholder="Digite o nome do contato..." value="<?= htmlentities($contato->getNome()); ?>" />
        </div>
        <div class="form-group col-md-6">
            <label>* E-mail:</label>
            <input type="email" name="email_contato" class="form-control" placeholder="Digite o e-mail do contato..." value="<?= htmlentities($contato->getEmail()); ?>" />
        </div>
        <div class="form-group col-md-6">
            <label>* Telefone:</label>
            <input type="tel" name="tel_contato" class="form-control" placeholder="Digite o telefone do contato..."  value="<?=htmlentities($contato->getTelefone()); ?>" />
            <small>Format: 11 98765 4321</small><br><br>
        </div>
        <div class="form-group col-12">
            <button name="atualizar_contato" class="btn btn-success">
                Salvar
            </button>
            
        </div>
    </div>
</form>