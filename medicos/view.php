<?php 
	include "functions.php";
	view($_GET['id']);
    include (HEADER_TEMPLATE);
?>

    <h2>Médico(a) <?php echo $medico['id']; ?></h2>
    <hr>

    <dl class="dl-horizontal">
        <dt>Nome:</dt>
        <dd><?php echo $medico['nome']; ?></dd>

        <dd>
            <?php 
                if (!empty($medico["foto"])) {
                    echo "<img src=\"fotos/" . $medico["foto"] . "\" class=\"fotomedico\">";
                } else {
                    echo "<img src=\"fotos/semimagem.jpg\" class=\"fotomedico\">";
                }
            ?>
        </dd>

        <dt>CPF:</dt>
        <dd><?php echo $medico['crm']; ?></dd>

        <dt>Data de Nascimento:</dt>
        <dd><?php echo formatadata($medico['nasc'], "d/m/Y"); ?></dd>
    </dl>

    <dl class="dl-horizontal">
        <dt>Endereço:</dt>
        <dd><?php echo $medico['endereco']; ?></dd>

        <dt>Bairro:</dt>
        <dd><?php echo $medico['bairro']; ?></dd>

        <dt>CEP:</dt>
        <dd><?php echo formatacep($medico['cep']); ?></dd>

        <dt>Data de Cadastro:</dt>
        <dd><?php echo formatadata($medico['created'], "d/m/Y - H:i:s"); ?></dd>

        <dt>Data da última atualização:</dt>
        <dd><?php echo formatadata($medico['modified'], "d/m/Y - H:i:s"); ?></dd>
    </dl>

    <dl class="dl-horizontal">
        <dt>Cidade:</dt>
        <dd><?php echo $medico['cidade']; ?></dd>

        <dt>Telefone:</dt>
        <dd><?php echo formatatel($medico['telefone']); ?></dd>

        <dt>Celular:</dt>
        <dd><?php echo formatatel($medico['celular']); ?></dd>

        <dt>UF:</dt>
        <dd><?php echo $medico['estado']; ?></dd>
    </dl>

    <div id="actions" class="row">
        <div class="col-md-12">
             <?php if (isset($_SESSION["user"])) : //verifica se existe usuario logado?>
                <a href="edit.php?id=<?php echo $medico['id']; ?>" class="btn btn-info"><i class="fa-solid fa-file-medical"></i> Editar</a>
            <?php endif;?>
            <a href="index.php" class="btn btn-dark"><i class="fa-solid fa-rotate-left"></i> Voltar</a>
        </div>
    </div>

<?php include(FOOTER_TEMPLATE); ?>