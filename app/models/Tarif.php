<?php

class Tarif extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $id;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    public $asal;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    public $tujuan;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $location;

    /**
     *
     * @var string
     * @Column(type="string", length=16, nullable=false)
     */
    public $med_agen;

    /**
     *
     * @var string
     * @Column(type="string", length=16, nullable=false)
     */
    public $big_agen;

    /**
     *
     * @var string
     * @Column(type="string", length=16, nullable=false)
     */
    public $med_umum;

    /**
     *
     * @var string
     * @Column(type="string", length=16, nullable=false)
     */
    public $big_umu;

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'tarif';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Tarif[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Tarif
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
