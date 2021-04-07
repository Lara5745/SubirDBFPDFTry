<?php
include_once('conn/conn.php');
$consulta=laconsulta();


if ($documentos=$consulta->fetch_assoc()) {
  echo $documentos['titulo'];
}
