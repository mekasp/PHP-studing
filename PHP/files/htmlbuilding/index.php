<?php



require_once ('header.html');

if (isset($_GET['route']) && $_GET['route'] == 'products'){
    require_once ('products.html');
} elseif (!isset($_GET['route']) || $_GET['route'] == 'home') {
    require_once ('home.html');
} else {
    require_once ('404.html');
}

require_once ('footer.html');



?>