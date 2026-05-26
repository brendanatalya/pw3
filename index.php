<?php
    require_once "config.php"; 
    require_once DBAPI; 
    include(HEADER_TEMPLATE); 
    $db = open_database();

	/*
		na hora de fazer acesso e verificar o usuario, bloqeuar o acesso da pagina e dar a mensagem de erro (isos noa ta funcionando)
		baixar o fpdf e implementar, falta o codigo do fpdf
	*/
?>
	<?php if ($db) : ?>

	<h1>Clientes</h1>
	<hr>
	<div class="row justify-content-center">
		<?php if (isset($_SESSION["user"])) : //verifica se existe usuario logado?>
			<div class="col-xs-6 col-sm-3 col-md-3 mb-3">
				<a href="customers/add.php" class="btn btn-dark w-100">
					<div class="row">
						<div class="col-xs-12 text-center">
							<i class="fa-solid fa-user-plus fa-5x"></i>
						</div>
						<div class="col-xs-12 text-center">
							<p>Novo Cliente</p>
						</div>
					</div>
				</a>
			</div>
		<?php endif;?>

		<div class="col-xs-6 col-sm-3 col-md-3">
			<a href="customers" class="btn btn-outline-dark w-100">
				<div class="row">
					<div class="col-xs-12 text-center">
						<i class="fa-solid fa-users fa-5x"></i>
					</div>
					<div class="col-xs-12 text-center">
						<p>Clientes</p>
					</div>
				</div>
			</a>
		</div>
	</div>

	<h1>Médicos</h1>
	<hr>

	<div class="row mt-5 justify-content-center">
		<?php if (isset($_SESSION["user"])) : //verifica se existe usuario logado?>
			<div class="col-xs-6 col-sm-3 col-md-3 mb-3">
				<a href="medicos/add.php" class="btn btn-info w-100 ">
					<div class="row">
						<div class="col-xs-12 text-center">
							<i class="fa-solid fa-heart-circle-plus fa-5x"></i>
						</div>
						<div class="col-xs-12 text-center">
							<p>Novo Médico</p>
						</div>
					</div>
				</a>
			</div>
		<?php endif;?>

		<div class="col-xs-6 col-sm-3 col-md-3">
			<a href="medicos" class="btn btn-outline-info w-100">
				<div class="row">
					<div class="col-xs-12 text-center">
						<i class="fa-solid fa-user-doctor fa-5x"></i>
					</div>
					<div class="col-xs-12 text-center">
						<p>Médicos</p>
					</div>
				</div>
			</a>
		</div>
	</div>

	<h1>Revistas</h1>
	<hr>

	<div class="row mt-5 justify-content-center">
		<?php if (isset($_SESSION["user"])) : //verifica se existe usuario logado?>
			<div class="col-xs-6 col-sm-3 col-md-3 mb-3">
				<a href="revistas/add.php" class="btn btn-danger w-100 ">
					<div class="row">
						<div class="col-xs-12 text-center">
							<i class="fa-solid fa-file-circle-plus fa-5x"></i>
						</div>
						<div class="col-xs-12 text-center">
							<p>Nova Revista</p>
						</div>
					</div>
				</a>
			</div>
		<?php endif;?>

		<div class="col-xs-6 col-sm-3 col-md-3">
			<a href="revistas" class="btn btn-outline-danger w-100">
				<div class="row">
					<div class="col-xs-12 text-center">
						<i class="fa-solid fa-newspaper fa-5x"></i>
					</div>
					<div class="col-xs-12 text-center">
						<p>Revistas</p>
					</div>
				</div>
			</a>
		</div>
	</div>



	<?php if (isset($_SESSION["user"])) : //verifica se existe usuario logado?>
		<?php if ($_SESSION["user"] == "admin") : //verifica se esta logado como admin?>

			<h1>Usuarios</h1>
			<hr>
			
			<div class="row mt-5 justify-content-center">
				<div class="col-xs-6 col-sm-3 col-md-3 mb-3">
					<a href="usuarios/add.php" class="btn btn-dark w-100 ">
						<div class="row">
							<div class="col-xs-12 text-center">
								<i class="fa-solid fa-user-gear fa-5x"></i>
							</div>
							<div class="col-xs-12 text-center">
								<p>Novo Usuário</p>
							</div>
						</div>
					</a>
				</div>

				<div class="col-xs-6 col-sm-3 col-md-3">
					<a href="usuarios" class="btn btn-outline-dark w-100">
						<div class="row">
							<div class="col-xs-12 text-center">
								<i class="fa-solid fa-users-gear fa-5x"></i>
							</div>
							<div class="col-xs-12 text-center">
								<p>Usuários</p>
							</div>
						</div>
					</a>
				</div>
			</div>
		<?php endif; ?>
	<?php endif; ?>
	<?php else : ?>
		<?php if (!empty($_SESSION["message"])) : ?>
			<div class="alert alert-<?php echo $_SESSION["type"];?> alert-dismissible" role="alert">
				<p><strong>ERRO:</strong> Não foi possível Conectar ao Banco de Dados!</p>
				<?php echo $_SESSION["message"];?>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
			<?php clear_messages()?>
		<?php endif;?>
	<?php endif; ?>

	<?php include(FOOTER_TEMPLATE); ?>