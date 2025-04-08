<?php

namespace App\Application\Controllers\Database;

use PDO;
use Dotenv\Dotenv;
use PDOException;

class Database
{
    private $connection;

    public function __construct()
    {
        $this->connect();
    }

    private function connect()
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../../../');
        $dotenv->load();

        // Obter as configurações do .env
        $driver = $_ENV['DB_DRIVER'];
        $host = $_ENV['DB_HOST'];
        $port = $_ENV['DB_PORT'];
        $dbname = $_ENV['DB_NAME'];
        $user = $_ENV['DB_USER'];
        $password = $_ENV['DB_PWD'];

        // Definir o DSN (Data Source Name)
        $dsn = "{$driver}:host={$host};port={$port};dbname={$dbname}";

        try {
            $this->connection = new PDO($dsn, $user, $password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
            
        }
    }

    public function getConnection()
    {
        return $this->connection;
    }
}
