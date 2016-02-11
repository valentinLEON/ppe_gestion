<?php
/**
 * Created by PhpStorm.
 * User: Singu_Admin
 * Date: 11/02/2016
 * Time: 21:19
 */

namespace ppe_project_gestion\DAO;

use Doctrine\DBAL\Connection;


abstract class DAO
{
    private $db;

    public function __construct(Connection $_db)
    {
        $this->db = $_db;
    }

    protected function getDb()
    {
        return $this->db;
    }

    protected abstract function buildDomainObject($row);

}