
<?php
// Conectando, seleccionando la base de datos
//$link = mysql_connect('localhost', 'root', '')
//or die('No se pudo conectar: ' . mysql_error());
//echo 'Connected successfully';
//mysql_select_db('delightsuite') or die('No se pudo seleccionar la base de datos');


$con = new \PDO("mysql:host=localhost;dbname=delightsuite",'root','');
//$this->con = new \PDO("mysql:host=".HOST.";dbname=".DB,USER,PASSWORD);
$con->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

?>
