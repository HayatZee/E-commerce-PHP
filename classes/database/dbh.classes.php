<?php
  namespace Classes\Database;
  use \PDO;
  class Dbh
  {
      protected function connect()
      {
          try {
              $username = "id19719961_root";
              $password = "\8nYzuTY-YWvivC8";
              $dbh = new PDO('mysql:host=localhost;dbname=id19719961_productdb', $username, $password);
              return $dbh;
          }
          catch (PDOException $e) {
              print "Error!: " . $e->getMessage() . "<br />";
              die();
          }
      }
  }
