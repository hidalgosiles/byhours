<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * RoomUser Repository
 *
 * @author Ivan Hidalgo <hidalgosiles@gmail.com>
 */
class RoomUserRepository extends EntityRepository {

    /**
     * Get list of reservations in a specific date.
     *
     * @param date $date   Date
     * @return type
     */
    public function getSalesByDate($date) {

        // ---- Query ----
        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->select('upd.firstname', 'upd.lastname', 'SUM(ru.amount) as amount');
        $qb->from('AppBundle:RoomUser', 'ru');
        $qb->innerJoin('ru.user', 'u');
        $qb->innerJoin('u.userStatus', 'us');
        $qb->innerJoin('u.userPersonalData', 'upd');
        $qb->Where('ru.creationDate = ?1');
        $qb->setParameter(1, $date);
        $qb->groupBy('upd.firstname, upd.lastname');

        $query = $qb->getQuery();

        return $query->getArrayResult();
    }

}
