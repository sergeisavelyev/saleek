<?php

namespace core;

use PDO;

class Db
{
    use TSingleton;

    protected static $db;

    public function __construct()
    {
        $config = require_once CONFIG . '/config_db.php';
        self::$db = new PDO('mysql:host=' . $config['host'] . ';dbname=' . $config['name'] . '', $config['user'], $config['password']);
    }

    public static function query($sql, $params)
    {
        $stmt = self::$db->prepare($sql);
        if (!empty($params)) {
            if (is_array($params)) {
                foreach ($params as $k => $v) {
                    if (is_int($v)) {
                        $type = PDO::PARAM_INT;
                    } else {
                        $type = PDO::PARAM_STR;
                    }
                    $stmt->bindValue(':' . $k, $v, $type);
                }
            } else {
                if (is_int($params)) {
                    $type = PDO::PARAM_INT;
                } else {
                    $type = PDO::PARAM_STR;
                }
                $stmt->bindValue(1, $params, $type);
            }
        }
        $stmt->execute();
        return $stmt;
    }

    public static function column($sql, $params = [])
    {
        $result = self::query($sql, $params);
        return $result->fetchColumn();
    }

    public static function row($sql, $params = [])
    {
        $result = self::query($sql, $params);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function unique($sql, $params = [])
    {
        $result = self::query($sql, $params);
        return $result->fetchAll(PDO::FETCH_UNIQUE | PDO::FETCH_ASSOC);
    }
}
