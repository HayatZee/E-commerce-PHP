<?php
namespace Classes\Models;
use Classes\Database\Dbh as Dbh;
use \PDO;
  class ListProducts extends Dbh
  {
      public function getPdt()
      {
          $stmt = $this->connect()->prepare('SELECT * FROM products;');

          if (!$stmt->execute()) {
              $stmt = null;
              header("location: ../index.php?error=stmtFailed");
              exit();
          }
          $result = $stmt->fetchAll(PDO::FETCH_OBJ);
          return $result;
          $stmt = null;
      }
  }
