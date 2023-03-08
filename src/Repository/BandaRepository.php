<?php

namespace App\Repository;

use App\Entity\Banda;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Banda>
 *
 * @method Banda|null find($id, $lockMode = null, $lockVersion = null)
 * @method Banda|null findOneBy(array $criteria, array $orderBy = null)
 * @method Banda[]    findAll()
 * @method Banda[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BandaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Banda::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Banda $entity, bool $flush = true): void
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
    public function remove(Banda $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    public function listarBandas(){
        return $this->createQueryBuilder('b')
            ->addSelect('a')
            ->join('b.miembros', 'a')
            ->orderBy('b.nombre')
            ->getQuery()
            ->getResult();
    }

    public function save(Banda $banda){
        $this->getEntityManager()->flush($banda);
    }

    public function new() : Banda
    {
        $banda = new Banda();
        $this->getEntityManager()->persist($banda);
        return $banda;
    }
}
