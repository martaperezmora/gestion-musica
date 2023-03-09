<?php

namespace App\Repository;

use App\Entity\Artista;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Artista>
 *
 * @method Artista|null find($id, $lockMode = null, $lockVersion = null)
 * @method Artista|null findOneBy(array $criteria, array $orderBy = null)
 * @method Artista[]    findAll()
 * @method Artista[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArtistaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Artista::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Artista $entity, bool $flush = true): void
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
    public function remove(Artista $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    public function listarArtistas(){
        return $this->createQueryBuilder('a')
            ->addSelect('b')
            ->join('a.bandas', 'b')
            ->orderBy('a.nombre')
            ->getQuery()
            ->getResult();
    }

    public function save(Artista $artista){
        $this->getEntityManager()->flush($artista);
    }

    public function new() : Artista
    {
        $artista = new Artista();
        $this->getEntityManager()->persist($artista);
        return $artista;
    }

    public function guardar(){
        $this->getEntityManager()->flush();
    }

}
