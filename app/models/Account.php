<?php

class Account extends \Phalcon\Mvc\Model
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
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $account;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $name_header;

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
        return 'account';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Account[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Account
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
