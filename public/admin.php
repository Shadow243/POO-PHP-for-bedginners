<?php

use App\App;
use Core\Auth\DBAuth;

define('ROOT', dirname(__DIR__));
require ROOT . "/app/App.php";
App::load();

if (isset($_GET['p'])) {
    $page = $_GET['p'];
} else {
    $page = 'login';
}

$app = App::getInstance();


$auth = new DBAuth($app->getDB('users'));

if(!$auth->isLogged() && $page != 'login')
{
     $app->forbidden('login');
//    $page = 'login';
}

ob_start();

if ($page === 'welcome') {
    require ROOT . '/ressources/views/admin/welcome.php';
}else if($page === 'login') {
    require ROOT . '/ressources/views/admin/pages/auth/login.php';
} else if($page === 'user_show'){
    require ROOT . '/ressources/views/admin/pages/user/index.php';
}else if($page === 'add_user'){
    require ROOT . '/ressources/views/admin/pages/user/add.php';
} else if($page === 'category_show'){
    require ROOT . '/ressources/views/admin/pages/category/index.php';
}else if($page === 'add_category'){
    require ROOT . '/ressources/views/admin/pages/category/add.php';
}else if($page === 'edit_category'){
    require ROOT . '/ressources/views/admin/pages/category/edit.php';
}else if($page === 'post_show'){
    require ROOT . '/ressources/views/admin/pages/post/index.php';
}else if($page === 'add_post'){
    require ROOT . '/ressources/views/admin/pages/post/add.php';
}


else if($page === 'logout') {
//    session_start();
    $_SESSION['auth'] = null;
    $_SESSION = [];
    session_unset();
    session_destroy();
    require ROOT . '/ressources/views/admin/pages/auth/login.php';
}

$content = ob_get_clean();


require ROOT . '/ressources/views/layouts/master.php';