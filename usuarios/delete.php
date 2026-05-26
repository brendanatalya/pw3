<?php 
  include("functions.php"); 

  if (isset($_GET["id"]))
  {
    try
    {
      //consultando o usuario para obter o nome do arquivo da foto
      $usuario = find("usuarios", $_GET["id"]);
      //chamando a função delete para apagar o usuario do banco de dados
      delete($_GET["id"]);
      //apagando o arquivo de foto do usuario na pasta de fotos
      unlink("fotos/" . $usuario["foto"]);
    } catch (Exception $e) {
        $_SESSION["message"] = "Não foi possivel realizar a operação: " . $e->GetMessage();
        $_SESSION["type"] = "danger";
    }
  }

?>