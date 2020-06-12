<pre>
<?php
require $_SERVER['DOCUMENT_ROOT'] . "/../services/Autoloader.php";

spl_autoload_register([new Autoloader(), 'loadClass']);

$product = new models\Product();
$product->setName("product");

// var_dump($product);

?>