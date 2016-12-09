<?php

class Overland extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=11, nullable=false)
     */
    public $id;

    /**
     *
     * @var string
     * @Column(type="string", length=100, nullable=false)
     */
    public $asal;

    /**
     *
     * @var string
     * @Column(type="string", length=100, nullable=false)
     */
    public $tujuan;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $hari;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $medium_agen;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $big_agen;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $medium_umum;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $big_umum;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $deleted;

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'overland';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Overland[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Overland
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
