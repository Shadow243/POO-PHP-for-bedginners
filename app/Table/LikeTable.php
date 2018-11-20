<?php
/**
 * Created by PhpStorm.
 * User: Steven Ngesera
 * Date: 17/10/2018
 * Time: 11:09
 */

namespace App\Table;


use Core\Table\Table;

class LikeTable extends Table
{
    protected $table = 'likes';

    public function hasLiked($user_id, $likeable_id, $likeable_type)
    {
        return $this->query("SELECT * FROM {$this->table} WHERE user_id = ? AND likeable_id = ? AND likeable_type = ?", [$user_id, $likeable_id, $likeable_type], get_called_class(), true);
    }


    public function getLikesFor($likeable_id, $likeable_type)
    {
      return $this->query("SELECT * FROM {$this->table} WHERE likeable_id = ? AND likeable_type = ?", [$likeable_id, $likeable_type], false);
    }

    public function getCountOfLikesFor($likeable_id, $likeable_type)
    {
        return $this->query("SELECT count(*) as nbr FROM {$this->table} WHERE likeable_id = ? AND likeable_type = ?", [$likeable_id, $likeable_type], true);
    }
}