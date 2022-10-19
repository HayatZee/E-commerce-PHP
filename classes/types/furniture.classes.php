<?php
namespace Classes\Types;
class Furniture
{
    public function getAttribute()
    {
        if (!empty($_POST['height']) && !empty($_POST['width']) && !empty($_POST['length']) ) {
              $attribute = 'Dimentions: ' . $_POST['height'] ."x". $_POST['width'] ."x". $_POST['length'];
              return $attribute;
            }else{
                  $attribute = '';
                  return $attribute;
                }
        
    }
}
