<?php 
    require_once "functions.php"; 
    if  (!isset($_SESSION)) session_start();
    if (isset($_SESSION["user"])) { //verifica se tem um usuaro logado
        if ($_SESSION["user"] != "admin") { // verifica se o usuario é admin
            $_SESSION["message"] = "Você precisa ser administrador para acessar esse recurso!";
            $_SESSION["type"] = "danger";
        }
    } else {
        $_SESSION["message"] = "Você precisa estar logado e ser administrador para acessar esse recurso!";
        $_SESSION["type"] = "danger";
    }

    add();
    include (HEADER_TEMPLATE);

    if (isset($_SESSION["user"]) && $_SESSION["user"] == "admin") : 
?>
        <h2>Novo Usuário</h2>

        <form action="add.php" method="post" enctype="multipart/form-data">
            <hr>
                <div class="row">
                    <div class="form-group col-md-7">
                        <label for="nome">Nome</label>
                        <input type="text" id="nome" class="form-control" name="usuario['nome']" maxlength="50" required>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-5">
                        <label for="cpf">Login</label>
                        <input type="text" id="cpf" class="form-control" name="usuario['user']" maxlength="50" required>
                    </div>
                </div>
            
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="pass">Senha</label>
                        <input type="password" id="pass" class="form-control" name="usuario['password']" maxlength="100" required>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="pass2">Confirmar a Senha</label>
                        <input type="password" id="pass2" class="form-control" name="password2" maxlength="100" required>
                    </div>
                </div>
            
                <div class="row">
                    <div class="form-group col-md-4"></div>
                        <label for="foto">Foto</label>
                        <input type="file"  id="foto" class="form-control" name="foto" accept="image/*">
                    </div>                       
                </div>   
                
                <div class="row">
                    <div class="form-group col-md-4 mt-2">
                        <label for="imagem">Pre-Vizualização:</label>
                        <img src="fotos/semimagem.jpg" id="imagem" class="img-thumbnail shadow" width="250px" >
                    </div>   
                </div>

            <div id="actions" class="row mt-2">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-info"><i class="fa-solid fa-user-check"></i> Salvar</button>
                    <a href="index.php" class="btn btn-dark"><i class="fa-solid fa-circle-xmark"></i> Cancelar</a>
                </div>
            </div>
        </form>

<?php
    endif; //fim do if que verifica se o usuario é admin
    if (!empty($_SESSION["message"])) :
?>
    <div class="alert alert-<?php echo $_SESSION["type"]; ?> alert-dismissible" role="alert">                
        <?php echo $_SESSION["message"]; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div> 

<?php
    endif; 
    include(FOOTER_TEMPLATE);
?>

 <script>
    $(document).ready(function() {
      $('#foto').on('change', function(event) {
        const file = event.target.files[0];
        if (file && file.type.startsWith('image/')) {
          const reader = new FileReader();
          reader.onload = function(e) { //carrega o arquivo lido na memoria
            $('#imagem').attr('src', e.target.result).show(); //atribui no src da imagem do preview
          };
          reader.readAsDataURL(file);
        } else {
          $('#imagem').hide().attr('src', 'fotos/semimagem.jpg');
        }
      });
    });
  </script>