<?php

class Pelanggan extends \Phalcon\Mvc\Model
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
     * @Column(type="string", length=255, nullable=true)
     */
    public $nama;

    /**
     *
     * @var string
     * @Column(type="string", length=15, nullable=true)
     */
    public $telp;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $alamat;

    /**
     *
     * @var string
     * @Column(type="string", length=100, nullable=true)
     */
    public $kota;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    public $instansi;

    /**
     *
     * @var string
     * @Column(type="string", length=15, nullable=true)
     */
    public $telp_instansi;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $alamat_instansi;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $tipe_pelanggan;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("galatama");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'pelanggan';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Pelanggan[]|Pelanggan
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Pelanggan
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
