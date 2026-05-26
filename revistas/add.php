<?php 
    require_once "functions.php"; 
    if  (!isset($_SESSION)) session_start();
    if (!isset($_SESSION["user"])) { //verifica se tem um usuaro logado
        $_SESSION["message"] = "Você precisa estar logado para acessar esse recurso!";
        $_SESSION["type"] = "danger";
    }
    add();
    include (HEADER_TEMPLATE);

    if (isset($_SESSION["user"])): 
?>
        <h2>Nova Revista</h2>

        <form action="add.php" method="post" enctype="multipart/form-data">
            <hr />
            <div class="row">
                <div class="form-group col-md-7">
                    <label for="editora">Editora</label>
                    <input type="text" id="editora" class="form-control" name="revista['editora']" maxlength="100" required>
                </div>

                <div class="form-group col-md-3">
                    <label for="edicao">Edição</label>
                    <input type="text" id="edicao" class="form-control" name="revista['edicao']" maxlength="6" required>
                </div>

                <div class="form-group col-md-2">
                    <label for="lanc">Data de Lançamento</label>
                    <input type="date"  id="lanc" class="form-control" name="revista['lanc']" required>
                </div>
            </div>
            
            <div class="row">
                <div class="form-group col-md-5">
                    <label for="endereco">Endereço</label>
                    <input type="text" id="endereco" class="form-control" name="revista['endereco']" maxlength="80" required>
                </div>

                <div class="form-group col-md-3">
                    <label for="bairro">Bairro</label>
                    <input type="text" id="bairro" class="form-control" name="revista['bairro']" maxlength="50" required>
                </div>
                
                <div class="form-group col-md-2">
                    <label for="cep">CEP</label>
                    <input type="text" id="cep" class="form-control" name="revista['cep']" maxlength="8" required>
                </div>
                
                <div class="form-group col-md-2">
                    <label for="cad">Data de Cadastro</label>
                    <input type="date"  id="cad" class="form-control" name="revista['created']" disabled>
                </div>
            </div>
            
            <div class="row">
                <div class="form-group col-md-5">
                    <label for="cidade">Município</label>
                    <input type="text"  id="cidade" class="form-control" name="revista['cidade']" maxlength="100" required>
                </div>
                
                <div class="form-group col-md-2">
                    <label for="telefone">Telefone</label>
                    <input type="tel"  id="telefone" class="form-control" name="revista['telefone']" maxlength="11" required>
                </div>
                
                <div class="form-group col-md-2">
                    <label for="celular">Celular</label>
                    <input type="tel"  id="celular" class="form-control" name="revista['celular']" maxlength="11" required>
                </div>
                
                <div class="form-group col-md-1">
                    <label for="estado">UF</label>
                    <input type="text" id="estado"  class="form-control" name="revista['estado']" maxlength="2" required>
                </div>           
            </div>

            <div class="row">
                <div class="mb-3 col-12">
                    <label for="foto" class="form-label">Foto de capa</label>
                    <input class="form-control" type="file" name="foto" id="foto" maxlength="30" data-image-input>
                    <img class="fotoestilo" id="foto-preview" src="fotos/semimagem.jpg">
                </div>
            </div>
            
            <div id="actions" class="row mt-2">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-danger"><i class="fa-solid fa-heart-circle-check"></i> Salvar</button>
                    <a href="index.php" class="btn btn-dark"><i class="fa-solid fa-circle-xmark"></i> Cancelar</a>
                </div>
            </div>
        </form>
        <script>
			//preview da foto
			const foto = document.querySelector('#foto');

			foto.addEventListener('change', event => {

				const reader = new FileReader;

				reader.onload = function(event) {
					const previewFoto = document.querySelector('#foto-preview')
					previewFoto.src = event.target.result;
				}
				
				if (foto.files[0]) {
					reader.readAsDataURL(foto.files[0]);
				}
			})
		</script>
<?php
    endif; //fim do if que verifica se o usuario é admin
    if (!empty($_SESSION["message"]) && $_SESSION["type"] == "danger") :
?>
    <div class="alert alert-<?php echo $_SESSION["type"]; ?> alert-dismissible" role="alert">                
        <?php echo $_SESSION["message"]; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div> 

<?php endif; ?>
<?php include(FOOTER_TEMPLATE); ?>