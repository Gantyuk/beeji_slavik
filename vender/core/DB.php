<?php

namespace vender\core;

class DB
{
    public $_mysqli;
    protected static $_instanse;

    protected function __construct()
    {
        $db = require ROOT . '/config_db.php';
        $this->_mysqli = new \mysqli($db['host'], $db['users'], $db['paswd'], $db['DB']);
        $this->_mysqli->query("SET NAMES 'utf8' COLLATE 'utf8_general_ci'");
        $this->_mysqli->query("SET CHARACTER SET 'utf8'");
    }

    public static function instanse()
    {
        if (self::$_instanse === null):
            self::$_instanse = new self;
        endif;

        return self::$_instanse;
    }

    public function Query($sql)
    {
        return $this->_mysqli->query($sql);

    }

}

?>