<?php
namespace Classes\Models;
use classes\database\dbh as Dbh;
class DeleteProduct extends Dbh
{
    public function deletePdt($id)
    {
        $stmt = $this->connect()->prepare('DELETE FROM products WHERE product_id IN(?);');
        foreach ($id as $value) {
            if (!$stmt->execute(array($value))) {
                $stmt = null;
                header("location: ../index.php?error=stmtFailed");
                exit();
            }
        }
        $stmt = null;
    }
}
