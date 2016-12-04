<?php

class Invoice extends \Phalcon\Mvc\Model
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
     * @Column(type="string", length=10, nullable=false)
     */
    public $kode;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $tanggal_booking;

    /**
     *
     * @var string
     * @Column(type="string", length=100, nullable=false)
     */
    public $nama;

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
    public $tanggal_mulai;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $tanggal_kembali;

    /**
     *
     * @var integer
     * @Column(type="integer", length=10, nullable=false)
     */
    public $tarif;

    /**
     *
     * @var string
     * @Column(type="string", length=10, nullable=true)
     */
    public $dp;

    /**
     *
     * @var string
     * @Column(type="string", length=12, nullable=true)
     */
    public $modal;

    /**
     *
     * @var string
     * @Column(type="string", length=100, nullable=false)
     */
    public $metode_pembayaran;

    /**
     *
     * @var string
     * @Column(type="string", length=100, nullable=false)
     */
    public $paket;

    /**
     *
     * @var string
     * @Column(type="string", length=100, nullable=true)
     */
    public $area;

    /**
     *
     * @var string
     * @Column(type="string", length=100, nullable=true)
     */
    public $route;

    /**
     *
     * @var string
     * @Column(type="string", length=100, nullable=true)
     */
    public $lokasi;

    /**
     *
     * @var string
     * @Column(type="string", length=10, nullable=false)
     */
    public $type_booking;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    public $route_jiarah;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $lokasi_jemput;

    /**
     *
     * @var integer
     * @Column(type="integer", length=10, nullable=false)
     */
    public $jarak_jemput;

    /**
     *
     * @var string
     * @Column(type="string", length=6, nullable=false)
     */
    public $type_bus;

    /**
     *
     * @var integer
     * @Column(type="integer", length=10, nullable=false)
     */
    public $bus;

    /**
     *
     * @var string
     * @Column(type="string", length=10, nullable=true)
     */
    public $driver;

    /**
     *
     * @var string
     * @Column(type="string", length=10, nullable=true)
     */
    public $co_driver;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $note;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $batal;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $success;

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
     *
     * @var string
     * @Column(type="string", length=11, nullable=false)
     */
    public $lama_overtime;

    /**
     *
     * @var string
     * @Column(type="string", length=11, nullable=false)
     */
    public $biaya_overtime;

    /**
     *
     * @var string
     * @Column(type="string", length=11, nullable=false)
     */
    public $total_pengeluaran;

    /**
     *
     * @var string
     * @Column(type="string", length=11, nullable=false)
     */
    public $sisa_modal;

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'invoice';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Invoice[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Invoice
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
