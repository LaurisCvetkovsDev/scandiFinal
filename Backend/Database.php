<?php
class Database
{
    private static ?PDO $instance = null;

    public static function getInstance(): PDO
    {
        if (self::$instance === null) {
            $host = 'localhost';
            $db = 'pruductdb';
            $user = 'root';
            $pass = '';
            $charset = 'utf8mb4';
            $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];

            try {
                self::$instance = new PDO($dsn, $user, $pass, $options);
            } catch (PDOException $e) {
                throw new PDOException($e->getMessage(), (int) $e->getCode());
            }
        }

        return self::$instance;
    }
}
?>