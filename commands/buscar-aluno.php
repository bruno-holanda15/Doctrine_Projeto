<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$alunoRepository = $entityManager->getRepository(Aluno::class);

/** @var Aluno[] $alunosList */

$alunosList = $alunoRepository->findAll();

foreach ($alunosList as $aluno ) {
    echo "\n ID:{$aluno->getId()} \n Nome:{$aluno->getNome()} \n ";
}
