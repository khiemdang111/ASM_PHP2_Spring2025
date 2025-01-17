<?php 
namespace App\Model;

use mysqli;

class Database
{
  private $host;
  private $dbname;
  private $user;
  private $password;
  private $port;

  public function __construct()
  {
$this->connect();
  }
  public function connect()
  {
    $this->host = $_ENV['DB_HOST'];
    $this->dbname = $_ENV['DB_NAME'];
    $this->user = $_ENV['DB_USERNAME'];
    $this->password = $_ENV['DB_PASSWORD'];
    $this->port = $_ENV['DB_PORT'];
    $mysqli = new mysqli($this->host, $this->user, $this->password, $this->dbname);

    if ($mysqli->connect_errno) {
      echo "Failed to connect to MySQL: " . $mysqli->connect_error;
      exit();
    }

    return $mysqli;
  }
}