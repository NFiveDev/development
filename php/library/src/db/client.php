<?php

class MariaClient
{
    private static $databaseHost = 'mariadb';
    private static $databaseUsername = 'admin';
    private static $databasePassword = 'admin';
    private static $databaseName = 'library_db';

    public static function GetClient()
    {
        $mysqlcli = mysqli_connect(self::$databaseHost, self::$databaseUsername, self::$databasePassword, self::$databaseName);

        if ($mysqlcli == false) {
            throw new Exception('Database connection failed!');
        }
        return $mysqlcli;
    }
}
