<?php 
	include "functions.php";
    if (!isset($_SESSION)) session_start();
    if (isset($_SESSION["user"])) {//veririca se tem um usuario logado
        if ($_SESSION["user"] != "admin") { //verifica se o usuario é admin
            $_SESSION["message"] = "Você precisa ser administrador para acessar esse recurso!";
            $_SESSION["type"] = "danger";
            header("Location:" . BASEURL . "index.php");
        }
    } else {
        $_SESSION["message"] = "Você precisa estar logado e ser administrador para acessar esse recurso!";
        $_SESSION["type"] = "danger";
        header("Location:" . BASEURL . "index.php");
    }
	view($_GET['id']);
    include (HEADER_TEMPLATE);
?>

    <h2>Usuario <?php echo $usuario['id']; ?></h2>
    <hr>

    <?php if (!empty($_SESSION['message'])) : ?>
        <div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible fade show">
            <?php echo $_SESSION['message']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php else : ?>

        <dl class="dl-horizontal">
            <dt>Nome:</dt>
            <dd><?php echo $usuario['nome']; ?></dd>

            <dt>Login:</dt>
            <dd><?php echo $usuario['user']; ?></dd>

            <dt>Senha:</dt>
            <dd style="overflow-wrap: anywhere;"><?php echo $usuario['password']; ?></dd>

            <?php 
                if (!empty($usuario['foto'])) {
                    $foto = $usuario['foto'];
                } else{
                    $foto = "semimagem.jpg";
                }
            ?>

            <dt>Foto:</dt>
            <dd><img src="fotos/<?php echo "$foto";?>"  class="img-thumbnail shadow" width="200px"></dd> 
        </dl>
    <?php endif; ?>

    <div id="actions" class="row">
        <div class="col-md-12">
            <?php if (empty($_SESSION["message"])) :?>
                <a href="edit.php?id=<?php echo $usuario['id']; ?>" class="btn btn-info"><i class="fa-solid fa-file-medical"></i> Editar</a>
            <?php endif; ?>
            <a href="index.php" class="btn btn-dark"><i class="fa-solid fa-rotate-left"></i> Voltar</a>
        </div>
    </div>
<?php clear_messages(); ?>
<?php include(FOOTER_TEMPLATE); ?>