<?php

use Doctrine\DBAL\DriverManager;
use Doctrine\Migrations\Configuration\Migration\PhpFile;
use Doctrine\Migrations\DependencyFactory;
use Doctrine\Migrations\Configuration\Connection\ExistingConnection;
use Dotenv\Dotenv;

require_once __DIR__ . '/vendor/autoload.php';


$dotenv = Dotenv::createImmutable(__DIR__ . '');
$dotenv->load();

// Configuração da conexão
$connection = DriverManager::getConnection([
    'dbname' =>$_ENV['DB_NAME'],
    'user' => $_ENV['DB_USER'],
    'password' => $_ENV['DB_PWD'],
    'host' => $_ENV['DB_HOST_MIGRATIONS'],
    'driver' => 'pdo_mysql',
    'port'=>$_ENV['DB_PORT']
]);

// Configuração de migração (arquivo externo .php)
$config = new PhpFile(__DIR__ . '/migrations-config.php'); // criaremos isso a seguir
return DependencyFactory::fromConnection($config, new ExistingConnection($connection));
