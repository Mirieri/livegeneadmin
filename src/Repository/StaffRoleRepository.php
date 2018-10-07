<?php

namespace App\Repository;

use App\Entity\StaffRole;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method StaffRole|null find($id, $lockMode = null, $lockVersion = null)
 * @method StaffRole|null findOneBy(array $criteria, array $orderBy = null)
 * @method StaffRole[]    findAll()
 * @method StaffRole[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StaffRoleRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, StaffRole::class);
    }

    /**
     * @return StaffRole[] Returns an array of StaffRole objects
     */
    public function findByPerson($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.person = :person')
            ->setParameter('person', $value)
            ->getQuery()
            ->getResult()
        ;
    }

    /**
     * @return int Return the total percent for staff person
     */
    public function getTotalPercentForPerson($value)
    {
        $roles = $this->findByPerson($value);
        $totalPercent = 0;
        foreach ($roles as $role) {
            $totalPercent += $role->getPercent();
        }
        return $totalPercent;
    }

//    /**
//     * @return StaffRole[] Returns an array of StaffRole objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?StaffRole
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
