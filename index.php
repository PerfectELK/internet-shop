<?
session_start();
//unset($_SESSION['units']);
require ('model/ShopUnitModel.php');
require('view/header-shop.php');

switch ($_GET['id']){
    case 'basket':
        require('view/basket.php');
        break;

        default:
        require ('view/shop.php');
        break;
}

switch ($_GET['id']){
    case 'basket':
        require('view/footer-basket.php');
        break;

    default:
        require('view/footer-shop.php');
        break;
}


