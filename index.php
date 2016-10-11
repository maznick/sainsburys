<?php

require __DIR__ . '/bootstrap.php';

use Model\Parse;

try {
    $parse = new Parse();
    echo $parse->getProductsJson();
} catch (Exception $e){
    echo \Model\Error::getExceptionText($e);
}
