
  <?php require_once('conn/conn.php') ?> <!-- Esto ejecuta el proceso almacenado en conn.php -->


  <?php

  /***************************************************
  *************SUBIDA  A LA BASE DE DATOS*************
  ****************************************************/

  /* cogemos los datos */
  $titulo=$_POST['titulo'];
  $contenido=$_POST['contenido'];

  //Insercioón a la abse de datos
  mysqli_set_charset($con, "utf8"); //Esto permite la subida de caracteres especiales a la base de datos
  mysqli_query($con,"INSERT INTO documentos (titulo,contenido) VALUES('$titulo','$contenido')") or die("error de envio. Máximo 40 caracteres");
  echo'<h2> Registro exitoso</h2>';

   ?>

    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
         ~~~~~~~~~~~~~~~~~~~~Sintaxis de FPDF~~~~~~~~~~~~~~~~~~~~~
         ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <?php
    ob_start(); //Esta línea es VITAL ya que si hay otro proceso de FPDF al mismo tiempo se generará un error en el penúltimo código alterado

    use setasign\Fpdi\Fpdi; //Libreríaa de FPDI (Para usar un documento PDF como background)
    use setasign\Fpdi\PdfReader; //Librería para crear PDF con PHP

    require_once('fpdf/fpdf.php'); //Archivo necesario para el proceso. Esto se obtiene desde las páginas oficiales
    require_once('src/autoload.php'); //Archivo necesario para el proceso. Esto se obtiene desde las páginas oficiales

    $pdf = new Fpdi('P','mm','Letter'); //Orientación de página por defecto(P o Portrait (normal))||Unidad de medida de usuario. (En esta ocasión es milimetro)||size(El formato usado por las páginas. )

    $pageCount = $pdf->setSourceFile('plantillas/PlantillaPrueba.pdf'); //Aquí se especifica la ubicación del archivo que se quiere usar como plantilla
    $pageId = $pdf->importPage(1, PdfReader\PageBoundaries::MEDIA_BOX); //Importa la página. El segundo parámetro define el cuadro delimitador que debe usarse para transformar la página en un formulario XObject.

    $pdf->addPage(); //Agreaga una página
    $pdf->useImportedPage($pageId, 0, 5, 200); //Manipula margin horizontal, margin vertical, escala

    $pdf->SetFont("Arial","B",15); //Define (Nombre de fuente, estilo de fuente (B/bold),tamaño de la fuente)
    $pdf->SetXY(42,1); //Coordenadas sobre la plantilla (eje x, eje y)
    $pdf->Cell(10,30,utf8_decode($titulo)); //Tamaño de la celda y su contenigo (tamaño en X, tamaño en Y, lo que será escrito)

    $pdf->SetFont("Arial","",13);
    $pdf->SetXY(28,40);
    $pdf->MultiCell( 143.5, 6, utf8_decode($contenido)); //Multicell es VITAL ya que esto permite escribir varias líneas de texto en una sola celda. Paranetros(Posición en X, distancia de interlineado, lo que será escrito)

    $pdf->Image('img/footer.jpg' , 13 ,210, 190 , 60,'JPG'); //Llamada para pegar una imágen ('ejeX,ejeY,ancho,alto,FORMATO')

   	$pdf->Output(); //VITAL para el funcionamiento de FPDF. Esto de la "salida" de PHP a un archivo PDF

    ob_end_flush(); //Esta línea es VITAL ya que si hay otro proceso de FPDF al mismo tiempo se generará un error en el penúltimo código alterado
   ?>
