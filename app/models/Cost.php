<?php

class Cost extends \Phalcon\Mvc\Model
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
    public $kode;

    /**
     *
     * @var string
     * @Column(type="string", length=100, nullable=false)
     */
    public $cost;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $satuan;

    /**
     *
     * @var string
     * @Column(type="string", length=1, nullable=true)
     */
    public $persen;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $harga_satuan;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $jumlah;

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'cost';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Cost[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Cost
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
