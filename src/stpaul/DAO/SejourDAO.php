<?php
/**
 * Created by PhpStorm.
 * User: ANNICK
 * Date: 24/02/2016
 * Time: 15:45
 */
namespace stpaul\DAO;

use Doctrine\DBAL\Connection;
use stpaul\Domain\Sejour;


class SejourDAO {
    private $db;

    /**
     * Constructor
     *
     * @param \Doctrine\DBAL\Connection The database connection object
     */
    public function __construct(Connection $db) {
        $this->db = $db;
    }

    /**
     * Creates an SEJOUR object based on a DB row.
     *
     * @param array $row The DB row containing Article data.
     * @return \stpaul\Domain\sejour
     */
    private function buildSejour($row) {
        $sejour = new Sejour();
        $sejour->init($row['SEJNO'],$row['SEJINTITULE'],$row['SEJMONTANTMBI'], $row['SEJDTEDEB'] , $row['SEJDUREE']);
        /**  $sejour->setSejNo($row['SEJNO']);
        $sejour->setSejIntitule($row['SEJINTITULE']);
        $sejour->setSejMontantMBI($row['SEJMONTANTMBI']);
        $sejour->setSejDteDeb($row['SEJDTEDEB']);
        $sejour->setSejDuree($row['SEJDUREE']); */
        return $sejour;
    }

    //Retourne tous les séjours
    public function getAllSejours()
    {
        $sql = "select * from sejour order by sejno";
        $result = $this->db->fetchAll($sql);

        // Convert query result to an array of SEJOUR objects
        $sejours = array();
        foreach ($result as $row) {
            $sejNo = $row['SEJNO'];
            $sejours[$sejNo] = $this->buildSejour($row);
        }
        return $sejours;

    }

    //Retourne un  séjour
    public function getSejour($pNo)
    {
        $sql = "select * from sejour where sejno=".$pNo;
        $result = $this->db->fetchAssoc($sql);

        return $this->buildSejour($result);

    }

}