<?php
namespace Classes\Types;
class DVD
{
    public function getAttribute()
    {
        if (!empty($_POST['size'])) {
            $attribute = 'Size: ' . $_POST['size'] . ' MB';
            return $attribute;
        }else{
            $attribute  = '';
            return $attribute;
             }
      
    }
}
