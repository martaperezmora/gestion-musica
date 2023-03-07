<?php

namespace App\Repository;

use App\Entity\Disco;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Disco>
 *
 * @method Disco|null find($id, $lockMode = null, $lockVersion = null)
 * @method Disco|null findOneBy(array $criteria, array $orderBy = null)
 * @method Disco[]    findAll()
 * @method Disco[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DiscoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Disco::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Disco $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(Disco $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

}