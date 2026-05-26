<?php 
    require("fpdf.php");

    class PDF extends FPDF {
        //header da pagina

        function Header() {

            $this->SetFillColor(33, 37, 41);
            $this->Rect(0, 0, 210, 28, "F");
            //logo
            $this->Image("../imagens/icon.png", 10, 6, 10);
            //fonte: Arial vold 15
            $this->SetFont("Arial", "B", 20);
            //move to the right
            //$this->Cell(40);
            //titulo
            $this->setTextColor(255, 255, 255);
            $this->Cell(180, 10, iconv("UTF-8", "ISO-8859-1", "Listagem de Usuários"), "B", 0, "C");
            //quebra de linha
            $this->Ln(20);
        }

        function Footer () {

            //posicao a 1.5 cm do fim da pagina
            $this->SetY(-15);
            $this->SetFillColor(33, 37, 41); // mesma cor do header
            $this->Rect(0, $this->GetY(), 210, 20, "F");

            $this->SetDrawColor(100, 150, 180); // azul um pouco mais escuro
            $this->Line(10, $this->GetY(), 200, $this->GetY());

            //arial iatlic 8
            $this->SetFont("Arial", "I", 8);
            //numero da pagina
            $this->setTextColor(255, 255, 255);
            $this->Cell(0, 10, converteTexto("Página ") . $this->PageNo() . " de {nb}", 0, 0, "C");
        }
    }

    function converteTexto($str) {
        $str = iconv("UTF-8", "windows-1252", $str);
        return $str;
    }

?>