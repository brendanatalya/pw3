<?php 
    require_once "functions.php"; 
    edit();
    include (HEADER_TEMPLATE);

    if (!empty($usuario['foto'])) {
        $fotoedit = $usuario['foto'];
    } else{
        $fotoedit = "semimagem.jpg";
    }
            
?>

        <h2>Atualizando o Usuario <?php echo $usuario['id']; ?></h2>
        <form action="edit.php?id=<?php echo $usuario['id']; ?>" method="post" enctype="multipart/form-data">
            <hr>
            <div class="row">
                <div class="form-group col-md-8">
                    <label for="nome">Nome</label>
                    <input type="text" id="nome" class="form-control" name="usuario[nome]" maxlength="80" value="<?php echo $usuario['nome'];?>" required>
                </div>
            </div>
            
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="usuario">Usuario (Login)</label>
                    <input type="text" id="usuario" class="form-control" name="usuario[user]" maxlength="80" value="<?php echo $usuario['user']; ?>" required>
                </div>
            </div>
            
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="senha">Senha</label>
                    <input type="password" id="senha" class="form-control" name="usuario[password]" maxlength="80" value="">
                </div>
            </div>


            <div class="row">
                <div class="form-group col-md-4"></div>
                    <label for="foto">Foto</label>
                    <input type="file"  id="foto" class="form-control" name="foto" accept="image/*"  maxlength="30">
                </div>                       
            </div>   
            
            <div class="row">
                <div class="form-group col-md-4 mt-2">
                    <label for="foto-preview">Pre-Vizualização:</label>
                    <img src="fotos/<?php echo $fotoedit?>" id="foto-preview" class="img-thumbnail shadow" width="250px" alt="Foto do usuario">
                </div>   
            </div>

            <div id="actions" class="row mt-2">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-info"><i class="fa-solid fa-user-check"></i> Salvar</button>
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
<?php include(FOOTER_TEMPLATE); ?>