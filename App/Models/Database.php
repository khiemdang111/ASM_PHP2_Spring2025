<?php
namespace App\Models;

use mysqli;
use PDO;
use PDOException;

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
  public function MySQLi()
  {
    $conn = new mysqli($this->host, $this->user, $this->password, $this->dbname);

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
  }
  public function Pdo()
  {
    try {
      $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      return $conn;
    } catch (PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
  }

}