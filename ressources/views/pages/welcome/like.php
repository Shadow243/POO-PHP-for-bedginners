<?php
/**
 * Created by PhpStorm.
 * User: Steven Ngesera
 * Date: 17/10/2018
 * Time: 10:58
 */
//define('ROOT', dirname(__DIR__));
//require"../../../../app/App.php";
//\App\App::load();
if(isset($_GET['post']) AND !empty($_GET['post']))
{
    $post = \App\App::getInstance()->getTable('post')->findById($_GET['post']);

    if($post) {
        $hasLiked = \App\App::getInstance()->getTable('like')->hasLiked($_SESSION['auth'], $post->id, \App\Entity\PostEntity::class);
//        var_dump($hasLiked);die();
        if($hasLiked) {
            \App\App::getInstance()->getTable('like')->delete($hasLiked->id);
            
        }else{
            $like = \App\App::getInstance()->getTable('like')
                ->save([
                    'likeable_id' => $post->id,
                    'likeable_type' => \App\Entity\PostEntity::class,
                    'user_id' => $_SESSION['auth'],
                ]);
        }

        header('location:index.php?p=welcome');

    }else {
        die('la publication '. $post->id .' n\'existe pas');
    }
}else {
    header('location:index.php?p=welcome');
}