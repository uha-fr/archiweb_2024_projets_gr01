<?php

class DatabaseController
{
  private $serv = "localhost";
  private $usr = "root";
  private $pwd = "";
  private $bdd = "manger";

  private $connection;

  function connect_bdd()
  {
    $this->connection = new mysqli($this->serv, $this->usr, $this->pwd, $this->bdd);
    
    if($this->connection->connect_error){
      return false;
    }

    else{
      return true;
    }

  }

  function close_bdd()
  {
      $this->connection->close();
  }

  function getConnection(){
      return $this->connection;
  }

  public function prepare($query) {
    return $this->connection->prepare($query);
  }

}
