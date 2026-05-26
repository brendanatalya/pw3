<?php

    require_once "../config.php";
    require_once DBAPI;

    $medicos = null;
    $medico = null;

    // Listagem de Medicos

    function index() {
        global $medicos;
        $medicos = find_all("medico");
    }

    function upload ($pastadestino, $arquivodestino, $tipoarquivo, $nometemp, $tamanhoarquivo) {
        //upload da foto
        try {
            $nomearquivo = basename($arquivodestino); //nome do arquivo
            $uploadOk = 1;

            //verificando se o arquivo é uma imagem
            if (isset($_POST["submit"])) {
                $check = getimagesize($nometemp);
                if ($check !== false) {
                    $_SESSION["message"] = "O arquivo é uma imagem - " . $check["mime"] . ".";
                    $_SESSION["type"] = "info";

                    $uploadOk = 1;
                } else {
                    $uploadOk = 0;
                    throw new Exception("O arquivo não é uma imagem!");
                }
            }

            //verificando se o arquivo ja existe na pasta
            if (file_exists($arquivodestino)) {
                $uploadOk = 0;
                throw new Exception("Desculpe, o arquivo já existe!");
            }

            //verificando o tamanho do arquivo
            if ($tamanhoarquivo > 5000000) {
                $uploadOk = 0;
                throw new Exception("Desculpe, mas o arquivo é muito grande!");
            }

            //aceitando apenas certos tipos de formatos
            if ($tipoarquivo != "jpg" && $tipoarquivo != "png" && $tipoarquivo != "jpeg" && $tipoarquivo != "gif") {
                $uploadOk = 0;
                throw new Exception("Desculpe, mas so sao permitidos arquivos de imagem JPG, JPEG, PNG E GIF!");
            }

            //verificando se uploadok esta como 0 por algum erro
            if ($uploadOk == 0) {
                throw new Exception("Desculpe, mas o arquivo nao pode ser enviado");
            } else {
                //se tudo estiver certinho, tentamos fazer o upload do arquivo
                if (move_uploaded_file($_FILES["foto"]["tmp_name"], $arquivodestino)) {
                    //colocando o nome do arquivo da foto do usuario no vetor
                    $_SESSION["message"] = "O arquivo " . htmlspecialchars($nomearquivo) . " foi armazenado.";
                    $_SESSION["type"] = "success";
                } else {
                    throw new Exception("Desculpe, mas o arquivo nao pode ser enviado");
                }
            }

        } catch (Exception $e) {
            $_SESSION["message"] = "Aconteceu um erro: " . $e->getMessage();
            $_SESSION["type"] = "danger";
        }
    }


    //Cadastro de Medicos

    function add() {

        if (!empty($_POST['medico'])) { 
            try {
                $now = new DateTime("now", new DateTimeZone("America/Sao_Paulo"));

                $medico = $_POST['medico'];

                if (!empty($_FILES["foto"]["name"])) {
                    //upload da foto
                    $pastadestino = "fotos/";
                    $arquivodestino = $pastadestino . basename($_FILES["foto"]["name"]); //caminho compleyo ate o arquivo que sera gravado
                    $nomearquivo = basename($_FILES["foto"]["name"]); //nome do arquivo
                    $resolucaoarquivo = getimagesize($_FILES["foto"]["tmp_name"]); 
                    $tamanhoarquivo = $_FILES["foto"]["size"]; //tamanho do arquivo em bytes
                    $nometemp = $_FILES["foto"]["tmp_name"]; //nome e caminho do arquivo no servidor
                    $tipoarquivo = strtolower(pathinfo($arquivodestino, PATHINFO_EXTENSION)); //extensao do arquivo

                    //chamada da função upload para gravar a imagem
                    upload($pastadestino, $arquivodestino, $tipoarquivo, $nometemp, $tamanhoarquivo);

                    //$medico["foto"] = $nomearquivo;
                }

                else {
                    $nomearquivo = "";
                }

                $medico["foto"] = $nomearquivo;
                $medico['created'] = $now->format("Y-m-d H:i:s");
                $medico['modified'] = $now->format("Y-m-d H:i:s");
                save("medico", $medico); 
                header("Location: index.php");
                
            } catch (Exception $e) {
                $_SESSION["message"] = "Aconteceu um erro: " . $e->getMessage();
                $_SESSION["type"] = "danger";
            }
        }
    }

    //Atualizacao/Edicao de Medico

    function edit() {

        $now = new DateTime("now", new DateTimeZone("America/Sao_Paulo"));

        if (isset($_GET['id'])) {

            $id = $_GET['id'];

            if (isset($_POST['medico'])) {
                
                $medico = $_POST['medico'];
                $medico['modified'] = $now->format("Y-m-d H:i:s");

                $currentMedico = find("medico", $id);

                // SE o usuário enviou uma nova imagem
                if (!empty($_FILES["foto"]["tmp_name"])) {

                    $target_dir = "fotos/";
                    $target_file = $target_dir . basename($_FILES["foto"]["name"]);
                    $tipoarquivo = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                    $uploadOk = 1;

                    // valida se é imagem
                    $check = getimagesize($_FILES["foto"]["tmp_name"]);
                    if ($check === false) {
                        $uploadOk = 0;
                    }

                    // verifica se já existe
                    if (file_exists($target_file)) {
                        $uploadOk = 0;
                    }

                    // tamanho máximo
                    if ($_FILES["foto"]["size"] > 500000) {
                        $uploadOk = 0;
                    }

                    // extensões permitidas
                    if (!in_array($tipoarquivo, ['jpg','jpeg','png','gif'])) {
                        $uploadOk = 0;
                    }

                    // se ocorreu algum erro, cancela somente o upload
                    if ($uploadOk == 0) {
                        echo "<h4 class='concluido'>A imagem é inválida! Mas o restante foi atualizado normalmente.</h4>";
                    } 
                    
                    else {
                        // apaga foto antiga
                        if (!empty($currentMedico['foto']) && file_exists($target_dir . $currentMedico['foto'])) {
                            unlink($target_dir . $currentMedico['foto']);
                        }

                        // faz upload da nova imagem
                        move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);
                        $medico['foto'] = basename($_FILES["foto"]["name"]);
                    }
                }

                else {
                    $medico['foto'] = $currentMedico['foto'];
                }

                // faz o update independentemente de ter foto nova ou não
                update("medico", $id, $medico);
                header("location: index.php");
                exit;
            } else {

                global $medico;
                $medico = find("medico", $id);
            } 
        } else {
            header('location: index.php');
            exit;
        }
    }

    //Visualização de um medico

    function view($id = null) {
        global $medico;
        $medico = find("medico", $id);
    }

    //Exclusão de um medico

    function delete($id = null) {

        global $medico;
        $medico = remove("medico", $id);

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

    /*gerando pdf */

    function pdf ($p = null) {
        //depois copio 

        $pdf = new PDF();
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('Times', '', 12);
        $medicos = null;

        if ($p) {
            $medicos = filter("medicos", "nome like '%" . $p . "%'");
        } else {
            $medicos = find_all ("medicos");
        }

        foreach ($medicos as $medico) {
            $pdf->Cell(0, 10, $medico['id'] . " - " . $medico['nome'] . " - " . $medico['user'], 0, 1); //mudar os negocios d bancp
        }

        /*
        for ($i=1; $i<=40;$i++)
            $pdf->Cell(0, 10, 'Printing line number ' . $i, 0, 1);
        */
        $pdf->Output();
    }