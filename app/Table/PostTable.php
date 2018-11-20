<?php
/**
 * Created by PhpStorm.
 * User: Steven Ngesera
 * Date: 12/10/2018
 * Time: 12:30
 */

namespace App\Table;


use Core\Table\Table;

class PostTable extends Table
{
    protected $table = 'posts';
    
    public function latest($nbr = 3)
    {
        return $this->query("SELECT posts.title, posts.id, posts.image, posts.body, posts.category_id, posts.created_at, posts.updated_at, categories.id as cat_id, categories.name, categories.created_at as cat_created_at FROM posts LEFT JOIN categories  
ON posts.category_id = categories.id ORDER BY posts.updated_at DESC limit {$nbr}");
    }

    public function getByRound($nbr = 3)
    {
        return $this->query("SELECT posts.title, posts.id, posts.image, posts.body, posts.category_id, posts.created_at, posts.updated_at, categories.id as cat_id, categories.name, categories.created_at as cat_created_at FROM posts LEFT JOIN categories  
ON posts.category_id = categories.id ORDER BY RAND() limit {$nbr}");
    }
    public function getByCategory($category_id, $nbr)
    {
        return $this->query("SELECT posts.title, posts.id, posts.image, posts.body, posts.category_id, posts.created_at, posts.updated_at, categories.id as cat_id, categories.name, categories.created_at as cat_created_at FROM posts LEFT JOIN categories  
ON posts.category_id = categories.id WHERE category_id = ?  ORDER BY RAND() limit {$nbr}", [$category_id], false);
    }
}