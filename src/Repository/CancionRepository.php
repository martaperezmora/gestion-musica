<?php

namespace App\Repository;

use App\Entity\Cancion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Cancion>
 *
 * @method Cancion|null find($id, $lockMode = null, $lockVersion = null)
 * @method Cancion|null findOneBy(array $criteria, array $orderBy = null)
 * @method Cancion[]    findAll()
 * @method Cancion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CancionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Cancion::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Cancion $entity, bool $flush = true): void
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
    public function remove(Cancion $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

}
