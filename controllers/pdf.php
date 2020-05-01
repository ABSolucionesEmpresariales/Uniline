<?php
session_start();
require_once '../Modelos/Conexion.php';
require('../APIs/fpdf/fpdf.php');
very();

function very()
{
    $conexion = new Modelos\Conexion();
    $numero_certificado = '';

    $comprovar = $conexion->consultaPreparada(
        array($_SESSION['idusuario'], $_SESSION['idcurso']),
        "SELECT url_certificado FROM inscripcion WHERE alumno = ? AND curso = ?",
        2,
        "ii",
        false,
        null
    );
    if ($comprovar[0][0] == "") {
        $numero_certificado = round(microtime(true));
        $conexion->consultaPreparada(
            array($numero_certificado . ".pdf", $_SESSION['idusuario'], $_SESSION['idcurso']),
            "UPDATE inscripcion SET url_certificado = ? WHERE alumno = ? AND curso = ?",
            1,
            "sii",
            false,
            null
        );
        crear_certificado($numero_certificado);
    } else {
        $separacion = explode(".", $comprovar[0][0]);
        $numero_certificado = $separacion[0];
        crear_certificado($numero_certificado);
    }
}


function crear_certificado($numero_certificado)
{
    $_SESSION['idusuario'] = "20";
    $_SESSION['idcurso'] = "1";

    $conexion = new Modelos\Conexion();
    $conexion->cambiarDatos();
    $result = $conexion->consultaPreparada(
        array($_SESSION['idusuario'], $_SESSION['idcurso']),
        "SELECT u.nombre,ci.nombre,DATE_FORMAT(c.fecha_inicio,'%W %d de %M '),DATE_FORMAT(c.fecha_fin,'%W %d de %M del %Y') FROM usuario u INNER JOIN inscripcion c ON c.alumno = u.idusuario INNER JOIN curso ci ON ci.idcurso = c.curso WHERE u.idusuario = ? AND c.curso = ?",
        2,
        "ii",
        false,
        null
    );

    $alumno = $result[0][0];
    $curso = "'" . $result[0][1] . "'";
    $fecha_inicial = $result[0][2];
    $fecha_final = $result[0][3];

    $fechaFinal = "Del $fecha_inicial al $fecha_final ";



    class PDF extends FPDF
    {
        // Cabecera de página

        function Header()
        {
            // Logo
            $this->Image('../img/certificacion.png', 0, 0, 300);
            // Arial bold 15
            // Movernos a la derecha
            $this->Cell(20);
            // Título
            // Salto de línea
            $this->Ln(20);
        }

        function Footer()
        {
            $conexion = new Modelos\Conexion();


            $nom_Maestro = $conexion->consultaPreparada(
                array($_SESSION['idcurso']),
                "SELECT u.nombre 
                FROM usuario u 
                INNER JOIN curso c 
                ON c.profesor = u.idusuario
                WHERE c.idcurso = ?",
                2,
                "i",
                false,
                null
            );

            $notas = $conexion->consultaPreparada(
                array($_SESSION['idusuario'], $_SESSION['idcurso']),
                "SELECT url_certificado FROM inscripcion WHERE alumno = ? AND curso = ?",
                2,
                "ii",
                false,
                null
            );
            $separacion = explode(".", $notas[0][0]);
            $numero_certificado = $separacion[0];

            $maestro = $nom_Maestro[0][0];

            $texto_certificado = "Número de certificado: " . $numero_certificado;

            // Posición: a 1,5 cm del final
            $this->SetY(-20);
            // Arial italic 8
            $this->SetFont('Arial', 'I', 12);
            $this->SetTextColor(1, 102, 147);
            // Número de página
            $this->Cell(152, 8, utf8_decode(''), 0, 0, 'C');
            $this->Cell(90, 6, utf8_decode($maestro), 0, 1, 'C');


            $this->Cell(90, 8, utf8_decode(''), 0, 1, 'C');
            $this->SetTextColor(255, 255, 255);
            $this->Cell(70, 6, utf8_decode($texto_certificado), 0, 1, 'C');
        }
    }

    $pdf = new PDF("L");
    $pdf->AddPage();


    $pdf->Cell(19, 88, utf8_decode(''), 0, 1, 'C');

    $pdf->Cell(152, 8, utf8_decode(''), 0, 0, 'C');

    $pdf->SetTextColor(1, 102, 147);
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(60, 8, utf8_decode($alumno), 0, 1, 'C');

    $pdf->Cell(19, 1, utf8_decode(''), 0, 1, 'C');

    $pdf->Cell(152, 6, utf8_decode(''), 0, 0, 'C');

    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(60, 6, utf8_decode('Por hacer acreditado sactisfactoriamente el curso:'), 0, 1, 'C');
    $pdf->SetFont('Arial', 'I', 12);

    $pdf->Cell(152, 6, utf8_decode(''), 0, 0, 'C');
    $pdf->Cell(60, 6, utf8_decode($curso), 0, 1, 'C');
    $pdf->SetFont('Arial', 'B', 12);

    $pdf->Cell(152, 6, utf8_decode(''), 0, 0, 'C');
    $pdf->Cell(60, 6, utf8_decode($fechaFinal), 0, 1, 'C');
    $pdf->Cell(152, 6, utf8_decode(''), 0, 0, 'C');
    $pdf->Cell(60, 6, utf8_decode("En la Escuela Al Reves de AB 'Uniline'"), 0, 1, 'C');



    /*  $pdf->Output();  */
    $pdf->Output("D", "$numero_certificado.pdf");
}
