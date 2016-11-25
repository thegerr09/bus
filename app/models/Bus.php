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
     * @Column(type="string", length=12, nullable=false)
     */
    public $nomor_polisi;

    /**
     *
     * @var string
     * @Column(type="string", length=100, nullable=false)
     */
    public $nama_pemilik;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $alamat;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $merk;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $type;

    /**
     *
     * @var integer
     * @Column(type="integer", length=4, nullable=false)
     */
    public $tahun_perakitan;

    /**
     *
     * @var integer
     * @Column(type="integer", length=4, nullable=false)
     */
    public $tahun_beli;

    /**
     *
     * @var integer
     * @Column(type="integer", length=5, nullable=false)
     */
    public $cc;

    /**
     *
     * @var string
     * @Column(type="string", length=100, nullable=false)
     */
    public $nomor_rangka;

    /**
     *
     * @var string
     * @Column(type="string", length=100, nullable=false)
     */
    public $nomor_mesin;

    /**
     *
     * @var string
     * @Column(type="string", length=100, nullable=false)
     */
    public $nomor_bpkb;

    /**
     *
     * @var string
     * @Column(type="string", length=32, nullable=false)
     */
    public $warna;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $tanggal_pajak;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $nominal_pajak;

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
