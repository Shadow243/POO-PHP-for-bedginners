<?php
if (!empty($_POST)) {
    $auth = new \Core\Auth\DBAuth(App\App::getInstance()->getDb());
    $res = $auth->login($_POST['username'], $_POST['password']);
    if ($res) {
//        $user = App::getInstance()->getTable('user')->find([$_SESSION['auth']]);
        header("location:index.php?p=welcome");
//        var_dump($user);
//        die();
    } else {
        die("erreur......!");
    }
}else {
    die("les chamops sont vide");
}