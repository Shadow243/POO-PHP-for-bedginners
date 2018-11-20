<?php
namespace Core\Entity;
/**
 * Created by PhpStorm.
 * User: Steven Ngesera
 * Date: 10/10/2018
 * Time: 14:15
 */

class Entity
{
    public function __get($key)
    {
        $method = 'get'.ucfirst($key);
        $this->$key = $this->$method();
        return $this->$key;
    }
}