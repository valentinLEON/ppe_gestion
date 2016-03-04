<?php
/**
 * Created by PhpStorm.
 * User: Val
 * Date: 01/03/2016
 * Time: 17:55
 */

namespace ppe_gestion\DAO;

use ppe_gestion\Domain\Event;


class EventDAO extends DAO
{
    /**
     * @return array
     *
     * On recherche tous les event
     */
    public function findAll()
    {
        $_sql = "SELECT * FROM event ORDER BY title ASC";
        $_res = $this->getDb()->fetchAll($_sql);

        $event = array();
        foreach($_res as $row){
            $eventID = $row['id'];
            $event[$eventID] = $this->buildDomainObject($row);
        }

        return $event;
    }

    /**
     * @param $id
     * @return Event
     * @throws \Exception
     *
     * On recherche un event par l'id
     */
    public function findEvent($id)
    {
        $sql = "SELECT * FROM event WHERE id=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if($row){
            return $this->buildDomainObject($row);
        }
        else{
            throw new \Exception("Aucune event pour l'id : ".$id);
        }
    }

    /**
     * @param $id
     * @throws \Doctrine\DBAL\Exception\InvalidArgumentException
     *
     * Suppression de l'event par l'id
     */
    public function deleteEvent($id)
    {
        $this->getDb()->delete('event', array(
            'id' => $id
        ));
    }

    public function saveEvent(Event $event)
    {
        $eventInfo = array(
            'title'      => $event->getTitle(),
            'start'      => $event->getStart(),
            'end'        => $event->getEnd(),
            'dt_create'  => $event->getDtCreate(),
            'dt_update'  => $event->getDtUpdate(),
        );

        //on modifie
        if($event->getId()){
            $this->getDb()->update('event', $eventInfo, array(
                'id' => $event->getId()));
        }
        //on sauvegarde
        else{
            $this->getDb()->insert('event', $eventInfo);
            $id = $this->getDb()->lastInsertId();
            $event->setId($id);
        }
    }

    /**
     * @param $row
     * @return Event
     *
     * Construit l'objet Event
     */
    protected function buildDomainObject($row)
    {
        $event = new Event();

        $event->setId($row['id']);

        $event->setTitle($row['title']);
        $event->setStart($row['start']);
        $event->setEnd($row['end']);

        $event->setDtCreate($row['dt_create']);
        $event->setDtUpdate($row['dt_update']);

        return $event;
    }

}