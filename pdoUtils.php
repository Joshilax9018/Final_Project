<?php
/*============================================================================

DB Utility functions

==============================================================================*/
class pdoUtil{

private $servername = "mysql:dbname=svj28;host=sql2.njit.edu";
private $username = "svj28";
private $password = "vlAtaFzRh";
protected static  $conn;


//Making constructor Private so that it can be instantiated only once

private function __construct()
{
try {
self::$conn = new PDO("mysql:host=$this->servername;dbname=svj28", $this->username, $this->password);
// set the PDO error mode to exception
self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
echo "Connected successfully <br>";
print_r($_SESSION);
//    header("Location: https://web.njit.edu/~svj28/Final_Project/todolist.php");

}
catch(PDOException $e)
{
echo "Connection failed: " . $e->getMessage();
}
}


public static function getDBConnection(){
if(!self::$conn){
new pdoUtil();
}
return self::$conn;
}


}

?>