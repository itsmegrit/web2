<?php

class Database
{
  private $host = "localhost:3307";
  private $username = "root";
  private $password = "";
  private $database = "web2lab";
  private $conn;

  public function __construct()
  {
    $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);
    if ($this->conn->connect_error) {
      die("Connection failed: " . $this->conn->connect_error);
    }
  }

  public function select($table, $columns = "*", $condition = null)
  {
    $sql = "SELECT " . $columns . " FROM " . $table;
    if (!is_null($condition)) {
      $sql .= " WHERE " . $condition;
    }
    $result = $this->conn->query($sql);
    if ($result->num_rows > 0) {
      return $result->fetch_all(MYSQLI_ASSOC);
    }
    return [];
  }

  public function update($table, $data, $condition)
  {
    $sql = "UPDATE " . $table . " SET ";
    foreach ($data as $key => $value) {
      $sql .= $key . "='" . $value . "',";
    }
    $sql = rtrim($sql, ",");
    $sql .= " WHERE " . $condition;
    return $this->conn->query($sql);
  }

  public function delete($table, $condition)
  {
    $sql = "DELETE FROM " . $table . " WHERE " . $condition;
    return $this->conn->query($sql);
  }

  public function __destruct()
  {
    $this->conn->close();
  }
}

?>