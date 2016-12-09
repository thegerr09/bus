<?php

class Jurnal extends \Phalcon\Mvc\Model
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
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $id_header;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $id_account;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $tanggal;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $kode_jurnal;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $kantor;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $total_debet;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $total_kredit;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $id_child;

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'jurnal';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Jurnal[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Jurnal
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
