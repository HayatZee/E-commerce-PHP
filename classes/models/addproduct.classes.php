<?php
  namespace Classes\Models;
  use classes\database\dbh as Dbh;
  abstract class AddProduct extends Dbh
  {
      abstract function setPdt();
      protected function addPdt($sku, $name, $price, $type, $attribute)
      {
            $stmt = $this->connect()->prepare('INSERT INTO products (product_sku, product_name, product_price, product_type, product_attribute) VALUES (?,?,?,?,?);');
            if (!$stmt->execute(array($sku, $name, $price, $type, $attribute))) {
                $stmt = null;
                header("location: ../index.php?error=stmtFailed");
                exit();
            }
            $stmt = null;
      }
      protected function checkSku($sku)
      {
            $stmt = $this->connect()->prepare('SELECT product_sku FROM products WHERE product_sku = ?;');
            if (!$stmt->execute(array($sku))) {
                $stmt = null;
                header("location: ../index.php?error=stmtFailed");
                exit();
            }
            $resultCheck;
            if ($stmt->rowCount() > 0) {
                $resultCheck = false;
            }else {
                $resultCheck = true;
            }
            return $resultCheck;
      }
  }
