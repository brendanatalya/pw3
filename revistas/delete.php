<?php 
  include("functions.php"); 

  try {
    if (isset($_GET['id'])){
        delete($_GET['id']);
    } else {
        throw new Exception("ERRO: ID não definido.");
    }
  } catch (Exception $e) {
    throw $e;
  }
  
?>