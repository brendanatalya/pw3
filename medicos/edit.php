<?php 
    require_once "functions.php"; 
    if  (!isset($_SESSION)) session_start();
    if (!isset($_SESSION["user"])) { //verifica se tem um usuaro logado
        $_SESSION["message"] = "Você precisa estar logado para acessar esse recurso!";
        $_SESSION["type"] = "danger";
    }
    edit();
    include (HEADER_TEMPLATE);

    if (!empty($medico['foto'])) {
        $fotoedit = $medico['foto'];
    } else{
        $fotoedit = "semimagem.jpg";
    }

    if (isset($_SESSION["user"])): 
?>

        <h2>Atualizando o Médico <?php echo $medico['id']; ?></h2>

        <form action="edit.php?id=<?php echo $medico['id']; ?>" method="post" enctype="multipart/form-data">
            <hr />
            <div class="row">
                <div class="form-group col-md-7">
                    <label for="nome">Nome</label>
                    <input type="text" id="nome" class="form-control" name="medico['nome']" maxlength="80" value="<?php echo $medico['nome']; ?>" required>
                </div>

                <div class="form-group col-md-3">
                    <label for="crm">CRM</label>
                    <input type="text" id="crm" class="form-control" name="medico['crm']" maxlength="6" value="<?php echo $medico['crm']; ?>" required>
                </div>

                <div class="form-group col-md-2">
                    <label for="nasc">Data de Nascimento</label>
                    <input type="date"  id="nasc" class="form-control" name="medico['nasc']" value="<?php echo formatadata($medico['nasc'], "Y-m-d"); ?>" required>
                </div>
            </div>
            
            <div class="row">
                <div class="form-group col-md-5">
                    <label for="endereco">Endereço</label>
                    <input type="text" id="endereco" class="form-control" name="medico['endereco']" maxlength="80" value="<?php echo $medico['endereco']; ?>" required>
                </div>

                <div class="form-group col-md-3">
                    <label for="bairro">Bairro</label>
                    <input type="text" id="bairro" class="form-control" name="medico['bairro']" maxlength="80" value="<?php echo $medico['bairro']; ?>" required>
                </div>
                
                <div class="form-group col-md-2">
                    <label for="cep">CEP</label>
                    <input type="text" id="cep" class="form-control" name="medico['cep']" maxlength="8" value="<?php echo $medico['cep']; ?>" required>
                </div>
                
                <div class="form-group col-md-2">
                    <label for="cad">Data de Cadastro</label>
                    <input type="date"  id="cad" class="form-control" name="medico['created']" disabled value="<?php echo formatadata($medico['created'], "Y-m-d"); ?>">
                </div>
            </div>
            
            <div class="row">
                <div class="form-group col-md-5">
                    <label for="cidade">Município</label>
                    <input type="text"  id="cidade" class="form-control" name="medico['cidade']" maxlength="80" value="<?php echo $medico['cidade']; ?>" required>
                </div>
                
                <div class="form-group col-md-2">
                    <label for="telefone">Telefone</label>
                    <input type="tel"  id="telefone" class="form-control" name="medico['telefone']" maxlength="11" value="<?php echo $medico['telefone']; ?>" required>
                </div>
                
                <div class="form-group col-md-2">
                    <label for="celular">Celular</label>
                    <input type="tel"  id="celular" class="form-control" name="medico['celular']" maxlength="11" value="<?php echo $medico['celular']; ?>" required>
                </div>
                
                <div class="form-group col-md-1">
                    <label for="estado">UF</label>
                    <input type="text" id="estado"  class="form-control" name="medico['estado']" maxlength="2" value="<?php echo $medico['estado']; ?>"required>
                </div>              
            </div>

            <div class="row">
                <div class="mb-3 col-12">
                    <label for="foto" class="form-label">Foto</label>
                    <input class="form-control" type="file" name="foto" id="foto" maxlength="30" accept="image/*">
                    <img class="fotoestilo" id="foto-preview" src="fotos/<?php echo $fotoedit;?>" data-original-src="fotos/<?php echo $fotoedit; ?>">
                </div>
            </div>
            
            <div id="actions" class="row mt-2">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-info"><i class="fa-solid fa-heart-circle-check"></i> Salvar</button>
                    <button href="index.php" class="btn btn-dark"><i class="fa-solid fa-circle-xmark"></i> Cancelar</button>
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