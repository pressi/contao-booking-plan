<?php
/*******************************************************************
 *
 * (c) 2019 Stephan Preßl, www.prestep.at <development@prestep.at>
 * All rights reserved
 *
 * Modification, distribution or any other action on or with
 * this file is permitted unless explicitly granted by IIDO
 * www.iido.at <development@iido.at>
 *
 *******************************************************************/

namespace PRESTEP\BookingPlanBundle\Repository;


use Doctrine\ORM\EntityRepository;


class RoomRepository extends EntityRepository
{

    public function findAll(array $orderBy = [])
    {
        return $this->findBy([], $orderBy);
    }



    public function findWhatEverYouWant($parameters)
    {
        // Ein Beispiel mit dem ein Artikel gefunden werden kann der
        // zwischen Zeit:Start und Zeit:Ende aktiv ist.
        return $this->createQueryBuilder('t')
//            ->andWhere("t.start = ''  OR t.start <= :start")
//            ->andWhere("t.stop = ''  OR t.stop <= :stop")
            ->andWhere("t.published=1")
//            ->setParameter('start', $start)
//            ->setParameter('stop', $stop)
            ->getQuery()
            ->execute();
    }
}