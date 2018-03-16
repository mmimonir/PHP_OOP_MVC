<?php
spl_autoload_register(function ($class) {
    include_once "system/libs/".$class.".php";
});
 include_once "app/config/config.php";


$url = isset($_GET['url']) ? $_GET['url']: null;
if ($url != null) {
    $url = rtrim($url, '/');
    $url = explode('/', filter_var($url, FILTER_SANITIZE_URL));
} else {
    unset($url);
}

if (isset($url[0])) {
    include 'app/controllers/'.$url[0].'.php';
    $ctlr = new $url[0]();
    if (isset($url[1])) {
        $method = $url[1];
    }
    if (isset($url[2])) {
        $ctlr->$method($url[2]);
    } else {
        if (isset($url[1])) {
            $ctlr->$method();
        }
    }
} else {
    include 'app/controllers/Index.php';
    $ctlr = new Index();
    $ctlr->home();
}





  


 ?>






