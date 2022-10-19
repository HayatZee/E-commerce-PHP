<?php
namespace Classes\Types;
class Book 
{
    public function getAttribute()
    {
        if (!empty($_POST['weight'])) {
            $attribute = 'Weight: ' . $_POST['weight'] . 'KG';
            return $attribute;
        }else{
            $attribute = '';
            return $attribute;
             }
    }
}
