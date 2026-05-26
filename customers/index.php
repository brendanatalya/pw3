<?php
    include("functions.php");
    index();
    include(HEADER_TEMPLATE);
?>
        <header>
            <div class="row">
                <div class="col-sm-6">
                    <h2>Clientes</h2>
                </div>
                <div class="col-sm-6 text-right h2">
                    <?php if (isset($_SESSION["user"])) : //verifica se existe usuario logado?>
                        <a class="btn btn-info" href="add.php"><i class="fa-solid fa-user-plus"></i> Novo Cliente</a>
                    <?php endif;?>
                    <a class="btn btn-dark" href="index.php"><i class="fa-solid fa-retweet"></i> Atualizar</a>
                </div>
            </div>
        </header>

        <hr>

        <div class="tabelaresponsiva">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th width="30%">Nome</th>
                        <th>CPF/CNPJ</th>
                        <th>Celular</th>
                        <th>Atualizado em</th>
                        <th>Opções</th>
                    </tr>
                </thead>
                <tbody>
                <?php if ($customers) : ?>
                <?php foreach ($customers as $customer) : ?>
                    <tr>
                        <td><?php echo $customer['id']; ?></td>
                        <td><?php echo $customer['nome']; ?></td>
                        <td><?php echo $customer['cpf_cnpj']; ?></td>
                        <td><?php echo formatatel($customer['celular']); ?></td>
                        <td><?php echo formatadata($customer['modified'], "d/m/Y - H:i:s"); ?></td>
                        <td class="actions text-right botao">
                            <a href="view.php?id=<?php echo $customer['id']; ?>" class="btn btn-sm btn-dark diminuir mb-2"><i class="fa-solid fa-eye"></i> Visualizar</a>
                            <?php if (isset($_SESSION["user"])) : //verifica se existe usuario logado?>
                                <a href="edit.php?id=<?php echo $customer['id']; ?>" class="btn btn-sm btn-secondary diminuir mb-2"><i class="fa-solid fa-file-medical"></i> Editar</a>
                                <a href="#" class="btn btn-sm btn-light diminuir mb-2" data-bs-toggle="modal" data-bs-target="#delete-modal" data-customer="<?php echo $customer['id']; ?>">
                                    <i class="fa-solid fa-trash-can"></i> Excluir
                                </a>
                            <?php endif;?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="6">Nenhum registro encontrado.</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>

<?php

    include "modal.php"; 
    include(FOOTER_TEMPLATE); 

?>