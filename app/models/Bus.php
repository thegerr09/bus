<?php

class Bus extends \Phalcon\Mvc\Model
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
     * @Column(type="string", length=255, nullable=false)
     */
    public $name_bus;

    /**
     *
     * @var string
     * @Column(type="string", length=12, nullable=false)
     */
    public $no_polisi;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=false)
     */
    public $no_rangka;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $tgl_pajak_stnk;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $tgl_kir;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $km_skrng;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $kondisi;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $image;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $active;

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
        return 'bus';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Bus[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Bus
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
