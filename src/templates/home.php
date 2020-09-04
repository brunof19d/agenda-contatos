<?php
require_once "config.php";
$titulo_page = 'Meus Contatos';
$link_ativo = 'home';
require_once "includes/header.php";
require_once "controllers/home.php";
include "templates/alert-mensagens.php";

?>

<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th scope="col" width="5%">#</th>
                <th scope="col">Nome</th>
                <th scope="col">E-mail</th>
                <th scope="col">Telefone</th>
                <th scope="col" colspan="2" width="5%"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contatos as $contato) : ?>
                <tr>
                    <th scope="row"><?= $contato->getId(); ?></th>
                    <td><?= htmlspecialchars($contato->getNome()); ?></td>
                    <td><?= htmlspecialchars($contato->getEmail()); ?></td>
                    <td><?= htmlspecialchars($contato->getTelefone()); ?></td>
                    <td>
                        <a href="<?= SITE_URL . "src/templates/" ?>editar.php?id=<?= $contato->getId(); ?>" title="Editar" class="btn btn-success btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>
                    <td>
                        <a href="<?= SITE_URL . "src/templates/" ?>excluir.php?id=<?=$contato->getId();?>" title="Excluir" class="btn btn-danger btn-sm">
                            <i class="far fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>