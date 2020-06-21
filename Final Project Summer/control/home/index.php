<?php
class home {
    function index() {
        include('interface/header.php');
        include('interface/home/index.php');
        include('interface/footer.php');
    }
}
$action = new home;
?>