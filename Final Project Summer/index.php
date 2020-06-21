<?php
switch(@$_GET['p']) {
    case 'products':
        include('control/products/index.php');
        $action->index();
    break;

    case 'about_us':
        include('control/about_us/index.php');
        $action->index();
    break;
    
    case 'contact_us':
        include('control/contact_us/index.php');
        $action->index();
    break;
    
    default:
        include('control/home/index.php');
        $action->index();
    break;
}
?>