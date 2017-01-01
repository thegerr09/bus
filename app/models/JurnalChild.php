<?php

class JurnalChild extends \Phalcon\Mvc\Model
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
    public $id_jurnal;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $tanggal;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $account;

    /**
     *
     * @var string
     * @Column(type="string", length=11, nullable=false)
     */
    public $debet;

    /**
     *
     * @var string
     * @Column(type="string", length=11, nullable=false)
     */
    public $kredit;

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'jurnal_child';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return JurnalChild[]|JurnalChild
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return JurnalChild
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
