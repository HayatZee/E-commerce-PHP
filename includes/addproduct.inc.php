<?php
use classes\controller\addproductContr as AddproductContr;
include '../vendor/autoload.php';
if(isset($_POST["submit"])) {
    $sku = $_POST["sku"];
    $name = $_POST["name"];
    $price = $_POST["price"];
    $type= '';
    $attribute = '';
    if(isset($_POST["productType"])) {
        $type = $_POST["productType"];
    }
    if (!empty($type)) {
        $typeClass = 'classes\types\\' . $type;
        $checkType = new $typeClass;
        $attribute = $checkType->getAttribute();
    }
    $addpdt = new AddproductContr($sku, $name, $price, $type, $attribute);
    $addpdt->setPdt();
    header("location: ../");
  }
