<?php
if(isset($_POST['submit'])) {
    include '../vendor/autoload.php';
    if(!empty($_POST['product-id'])) {
          $all_id = $_POST['product-id'];
          $productId = new classes\models\deleteproduct;
          $productId->deletePdt($all_id);
    }
  header("location: ../");
}
