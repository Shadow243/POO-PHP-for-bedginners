<?php

define('ROOT', dirname(__DIR__));
require ROOT . "/app/App.php";
App\App::load();

if (isset($_GET['p'])) {
    $page = $_GET['p'];
} else {
    $page = 'welcome';
}

ob_start();

if ($page === 'welcome') {
    require ROOT . '/ressources/views/pages/welcome/welcome.php';
}else if($page === 'blog') {
    require ROOT . '/ressources/views/pages/blog/index.php';
} else if ($page === 'contact') {
    require ROOT . '/ressources/views/pages/contact/contact.php';
}else if ($page === 'store_like') {
    require ROOT . '/ressources/views/pages/welcome/like.php';
}else if ($page === 'blog_search') {
    require ROOT . '/ressources/views/pages/blog/search-blog.php';
}else if ($page === 'single_blog') {
    require ROOT . '/ressources/views/pages/blog/single-blog.php';
}

$content = ob_get_clean();


require ROOT . '/ressources/views/layouts/default.php';