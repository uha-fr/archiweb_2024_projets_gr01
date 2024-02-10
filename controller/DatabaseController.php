<?php

  $serv = "localhost";
  $usr = "root";
  $pwd = "";
  $bdd = "manger";

  $connection;

function connect_bdd()
{
  global $serv,$usr,$pwd,$bdd,$connection;
  $connection = new mysqli($serv, $usr, $pwd, $bdd);
  
  if($connection->connect_error){
    return false;
  }

  else{
    return true;
  }

}

function close_bdd()
{
    global $connection;
    $connection->close();
}

function getConnection(){
    global $connection;
    return $connection;
}





?>