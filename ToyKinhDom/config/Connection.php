<?php
class Connect
{
  public $conn;
  function __construct()
  {
    $servername = "localhost:3307";
    $username = "root";
    $password = "";
    $dbname = "toykingdom";
    $this->conn = new mysqli($servername, $username, $password, $dbname);
    if ($this->conn->connect_error) {
      die("Connection failed: " . $this->conn->connect_error);
    }
  }

  public function countRows($table, $condition = '')
  {
    $sql = "SELECT COUNT(*) as count FROM $table $condition";
    $result = mysqli_query($this->conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['count'];
  }

  function closeConnect()
  {
    $this->conn->close();
  }
  function selectsql($table, $colum = "*", $condition = null)
  {
    $sql = "SELECT $colum from $table $condition ";
    $result = $this->conn->query($sql);
    return $result;
  }
  function delsql($table, $id)
  {
    $sql = "DELETE from $table where $id";
    $result = $this->conn->query($sql);
    return $result;
  }
  function editsql($table, $id, $edit)
  {
    $sql = "UPDATE $table SET $edit where $id";
    $result = $this->conn->query($sql);
    return $result;
  }
  function insertsql($table, $data)
  {
    $sql = "INSERT INTO $table $data";
    $result = $this->conn->query($sql);
    return $result;
  }
}
?>