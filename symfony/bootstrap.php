<?php

use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

require_once "vendor/autoload.php";

$config = ORMSetup::createAttributeMetadataConfiguration(
    paths: [__DIR__ . '/src'],
    isDevMode: true,
);

$connection = DriverManager::getConnection([
    'driver' => 'pdo_pgsql',
    'user' => 'postgres',
    'password' => 'secret',
    'dbname' => 'postgres',
    'host' => 'postgres',
    'port' => 5432
], $config);

$entityManager = new EntityManager($connection, $config);
