<?php


namespace Models;

use Cycle\ORM\ORM;
use Cycle\ORM\Transaction;
use core\Db;


class BaseModel
{
    public static function findOne($params)
    {
        return Db::$orm->getRepository(static::class)->findOne($params);
    }
    public function save()
    {
        (new Transaction(Db::$orm))->persist($this)->run();
    }
    public static function findAll()
    {
        return Db::$orm->getRepository(static::class)->findAll();
    }
}