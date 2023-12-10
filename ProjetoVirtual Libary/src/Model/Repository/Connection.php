<?php

namespace QI\VirtualLibary\Model\Repository;

use \PDO;

class Connection{
    private static $connection;

    public static function getConnection(){
        if(self::$connection == null){
            self::$connection = new PDO(DSN,USERNAME,PASSWORD);
        }
        return self::$connection;
    }
}