<?php
class Connection
{
  private $host = ':3307';
  private $username = 'customer';
  private $password = 'toykinhdom';
  private $database = 'toykinhdom';
  private $conn;

  function __construct()
  {
    $this->conn = mysqli_connect($this->host, $this->username, $this->password, $this->database);
    if (!$this->conn) {
      die('Connection failed: ' . mysqli_connect_error());
    }
  }

  function query($sql)
  {
    $result = mysqli_query($this->conn, $sql);
    if (!$result) {
      die('Query failed: ' . mysqli_error($this->conn));
    }
    return $result;
  }

  function escape($string)
  {
    return mysqli_real_escape_string($this->conn, $string);
  }

  function __destruct()
  {
    mysqli_close($this->conn);
  }
}

?>