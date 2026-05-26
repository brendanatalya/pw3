<?php
    require_once "../config.php";
    require_once DBAPI;

    $customers = null;
    $customer = null;

    //Listagem de Clientes

    function index() {
        global $customers;
        $customers = find_all("cliente");
    }

    //Cadastro de Clientes

    function add() {

        if (!empty($_POST['customer'])) { 
            
            $today = new DateTime('now', new DateTimeZone("America/Sao_Paulo"));

            $customer = $_POST['customer'];
            $customer['modified'] = $customer['created'] = $today->format("Y-m-d H:i:s");
            
            save("cliente", $customer); 
            header("location: index.php"); 
        }
    }

    //Atualizacao/Edicao de Cliente

    function edit() {

        $now = new DateTime("now", new DateTimeZone("America/Sao_Paulo")); //a data atual

        if (isset($_GET['id'])) { //verifica se existe o id

            $id = $_GET['id'];

            if (isset($_POST['customer'])) {

                $customer = $_POST['customer'];
                $customer['modified'] = $now->format("Y-m-d H:i:s");

                update("cliente", $id, $customer);
                header("location: index.php");
            } else {

                global $customer;
                $customer = find("cliente", $id); //caso nao exista, vai colocar o id na global e procurar o registro
            } 
        } else {
            header('location: index.php');
        }
    }

    //Visualização de um Cliente

    function view($id = null) {
        global $customer;
        $customer = find("cliente", $id);
    }

    //Exclusão de um Cliente

    function delete($id = null) {

        global $customer;
        $customer = remove("cliente", $id);

        header("location: index.php");
    }

    //formata data

    function formatadata($data, $formato) {
        
        $df = new DateTime($data, new DateTimeZone("America/Sao_Paulo")); 
        return $df->format($formato);

    }

    //formata telefone

    function formatatel($telefone) {
        
        $tel = "(". substr($telefone,0,2) . ")" . substr($telefone,2,5) . "-" . substr($telefone,7,4);
        return $tel;

    }

    //formata cep

    function formatacep($cep) {
        
        $ceppronto = substr($cep,0,5) . "-" . substr($cep,5,3);
        return $ceppronto;

    }