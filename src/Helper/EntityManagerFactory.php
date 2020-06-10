<?php

namespace Alura\Doctrine\Helper;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;

class EntityManagerFactory
{

    //criando um gerenciador de entidades para projeto
    //annotations 
    /** 
     * @return EntityManagerInterface 
     * @throws \Doctrine\ORM\ORMException
    */

    public function getEntityManager(): EntityManagerInterface
    {
        $rootDir = __DIR__ . '\..\..';
        $config = Setup::createAnnotationMetadataConfiguration(
            [$rootDir . '\src'],
            true
        );
        $connection = [ 
            'driver' => 'pdo_sqlite',
            'path' => $rootDir . '/var/data/banco.sqlite'
        ];

        return EntityManager::create($connection, $config);
    }

}