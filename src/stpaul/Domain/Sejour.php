<?php
/**
 * Created by PhpStorm.
 * User: ANNICK
 * Date: 24/02/2016
 * Time: 15:11
 */

namespace stpaul\Domain;

/**  \DateTime::DateTime(); */

/**
 * Class sejour
 * @package stpaul
 */
class Sejour {

    private $sejNo;
    private $sejIntitule;
    private $sejMontantMBI;
    private $sejDteDeb;
    private $sejDuree;

    function __construct($sejNo, $sejIntitule, $sejMontantMBI, $sejDteDeb, $sejDuree)
    {
        $this->sejNo = $sejNo;
        $this->sejIntitule = $sejIntitule;
        $this->sejMontantMBI = $sejMontantMBI;
        $this->sejDteDeb = new \DateTime($sejDteDeb);
        $this->sejDuree = $sejDuree;
    }

    /**
     * @return mixed
     */
    public function getSejNo()
    {
        return $this->sejNo;
    }

    /**
     * @param mixed $sejNo
     */
    public function setSejNo($sejNo)
    {
        $this->sejNo = $sejNo;
    }

    /**
     * @return mixed
     */
    public function getSejIntitule()
    {
        return $this->sejIntitule;
    }

    /**
     * @param mixed $sejIntitule
     */
    public function setSejIntitule($sejIntitule)
    {
        $this->sejIntitule = $sejIntitule;
    }

    /**
     * @return mixed
     */
    public function getSejMontantMBI()
    {
        return $this->sejMontantMBI;
    }

    /**
     * @param mixed $sejMontantMBI
     */
    public function setSejMontantMBI($sejMontantMBI)
    {
        $this->sejMontantMBI = $sejMontantMBI;
    }

    /**
     * @return mixed
     */
    public function getSejDteDeb()
    {
        return $this->sejDteDeb;
    }

    /**
     * @param mixed $sejDteDeb
     */
    public function setSejDteDeb($sejDteDeb)
    {
        $this->sejDteDeb = $sejDteDeb;
    }

    /**
     * @return mixed
     */
    public function getSejDuree()
    {
        return $this->sejDuree;
    }

    /**
     * @param mixed $dejDuree
     */
    public function setSejDuree($sejDuree)
    {
        $this->sejDuree = $sejDuree;
    }

    /**
     * @return mixed
     */
    public function getSejDteFin()
    {
        /**  return $this->sejDteDeb + $this->sejDuree; */
        /** modèle de prog : $date->modify('+3 day') */
        $nbJour = '+'.$this->sejDuree.' day';
        $dte = $this->sejDteDeb->modify($nbJour);
        return $dte;

    }

    public function getSejDteFormatFR($pDte)
    {
        /**  return substr($pDte, -2).substr($pDte, -5, 2).substr($pDte, 4); */
        return $pDte->format("d-m-Y");
    }

}