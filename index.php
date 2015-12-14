<?php


$debut = microtime(true); 
define('ENVIRONMENT', 'development');


if (file_exists('Lib/vendor/autoload.php')) {
    require 'Lib/vendor/autoload.php';
} else {
    echo "<h1>Please install via composer.json</h1>";
    echo "<p>Install Composer instructions: <a href='https://getcomposer.org/doc/00-intro.md#globally'>https://getcomposer.org/doc/00-intro.md#globally</a></p>";
    echo "<p>Once composer is installed navigate to the working directory in your terminal/command promt and enter 'composer install'</p>";
    exit;
}

if (defined('ENVIRONMENT')) {
    switch (ENVIRONMENT) {
        case 'development':
            error_reporting(E_ALL);
            
            break;
        case 'production':
            error_reporting(0);
            break;
        default:
            exit('L environnement de travail n \'est pas défini.');
    }

}



use Lib\Core\Routes;
use Lib\Core\Session;
Routes::Router();
?>
<?php if (defined('ENVIRONMENT')) { 
	 switch (ENVIRONMENT) {
	case 'development':
	?>
<div style="position:fixed;bottom:0; background:#900; color:#FFF; line-height:30px; height:45px; left:0; right:0; padding-left:10px; ">
<?php 
echo 'Page générée en '. round(microtime(true) - $debut,5).' secondes <br />';

 break;
}
}


?>
</div>

