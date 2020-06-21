<?php
class products {
    function index() {
        include('interface/header.php');
        include('interface/products/index.php');
        include('interface/footer.php');
    }
}
$action = new products;
?>