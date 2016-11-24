<?php

class CoDriver extends \Phalcon\Mvc\Model
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
    public $nama;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $alamat;

    /**
     *
     * @var string
     * @Column(type="string", length=15, nullable=false)
     */
    public $telpon;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $keterangan;

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
        return 'co_driver';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return CoDriver[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return CoDriver
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
