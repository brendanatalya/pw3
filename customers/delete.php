<?php 
  include("functions.php"); 

  try {
    //se vir o id executa o delete
    if (isset($_GET['id'])){
      delete($_GET['id']);
    } else {
      throw new Exception("ERRO: ID não definido.");
    }
    } catch (Exception $e) {
    throw $e;
  }
  
?>