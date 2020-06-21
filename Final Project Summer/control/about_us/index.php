<?php
class about_us {
    function index() {
        include('interface/header.php');
        include('interface/about_us/index.php');
        include('interface/footer.php');
    }
}
$action = new about_us;
?>