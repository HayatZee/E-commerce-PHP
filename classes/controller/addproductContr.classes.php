<?php
  namespace Classes\Controller;
  use classes\models\addproduct;
  class AddproductContr extends AddProduct
  {
      private $sku;
      private $name;
      private $price;
      private $type;
      private $attribute;
      public function __construct($sku, $name, $price, $type, $attribute)
      {
          $this->sku = $sku;
          $this->name = $name;
          $this->price = $price;
          $this->type = $type;
          $this->attribute = $attribute;
      }
      public function setPdt()
      {
          session_unset();
          if ($this->emptyInput() == false) {
              $this->startSession();
              header('location: ../addproduct.php?error=emptyinput');
              exit();
          }
          if ($this->emptyType() == false) {
              $this->startSession();
              header("location: ../addproduct.php?error=emptyType");
              exit();
          }
          if ($this->skuTakenCheck() == false) {
              $this->startSession();
              header("location: ../addproduct.php?error=skuExists");
              exit();
          }
          $this->addPdt($this->sku, $this->name, $this->price, $this->type, $this->attribute);
      }
      public function startSession()
      {
          session_start();
          $_SESSION["sku"] = $this->sku;
          $_SESSION["name"] = $this->name;
          $_SESSION["price"] = $this->price;
          $_SESSION["type"] = $this->type;
          $_SESSION["attribute"] = $this->attribute;
      }
      private function emptyInput()
      {
          $result;
          if(empty($this->sku) || empty($this->name) || empty($this->price)) {
            $result = false;
          }else {
            $result = true;
          }
          return $result;
      }
      private function emptyType()
      {
          $result;
          if (empty($this->attribute)) {
            $result = false;
          }else {
            $result = true;
          }
          return $result;
      }
      private function skuTakenCheck()
      {
          $result;
          if (!$this->checkSku($this->sku)) {
            $result = false;
          }else {
            $result = true;
          }
          return $result;
      }
  }
