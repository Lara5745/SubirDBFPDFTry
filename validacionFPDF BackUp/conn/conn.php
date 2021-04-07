
   <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
   ~~~~~Verificar la conexión a la base de datos~~~~~~~
   ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<?php
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', 'fpdf');

$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
$consulta='';

/* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
   ~~~~~Verificar la conexión a la base de datos~~~
   ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/
if (mysqli_connect_errno()){
echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }


 /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    ~~~~~~~~~Extracción de  la base de datos~~~~~~~~
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/
 function laconsulta() {
   global $con,$consulta;
   $sql='SELECT * FROM documentos';
   return $con->query($sql);
 }

?>
