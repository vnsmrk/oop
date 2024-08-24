<?php
require_once 'functions.php';
spl_autoload_register(function($class){
    require_once $_SERVER['DOCUMENT_ROOT'].'/oop/class/'.$class.'.php';
});
?> 
<!-- for localhost -->



<!-- for online
<?php
require_once 'functions.php';
spl_autoload_register(function($class){
    require_once $_SERVER['DOCUMENT_ROOT'].'/class/'.$class.'.php';
});
?> -->