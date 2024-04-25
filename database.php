<?php
$host = "localhost";
$login = "root";
$pass = "";
$name_db = "lb_pdo_goods";

$db_driver="mysql";
$dsn = "$db_driver:host=$host; dbname=$name_db";

$options = array(PDO::ATTR_PERSISTENT => true, PDO::
MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
try {
$dbh = new PDO ($dsn, $login, $pass, $options);
//echo "Connected to database<br>";
//$dbh ->query("SET CHARACTER SET utf8");
}
catch (PDOException $e) {
echo "Error!: " . $e->getMessage() . "<br/>"; die();
}
//$dbh->exec("SET CHARACTER SET 'CP1251'");


//$dbh = new PDO('mysql:host=localhost;dbname=test', $login, $pass);
//$dbh = null;







/*
$link = mysqli_connect($server, $login, $pass, $name_db);
if(!$link )
{
    echo "Помилка з'єднання";
}
*/
?>