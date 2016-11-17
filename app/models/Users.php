<?php

use Phalcon\Mvc\Model\Validator\Email as Email;

class Users extends \Phalcon\Mvc\Model
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
     * @Column(type="string", length=11, nullable=false)
     */
    public $username;

    /**
     *
     * @var string
     * @Column(type="string", length=60, nullable=false)
     */
    public $password;

    /**
     *
     * @var string
     * @Column(type="string", length=20, nullable=false)
     */
    public $usergroup;

    /**
     *
     * @var string
     * @Column(type="string", length=20, nullable=false)
     */
    public $name;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $address;

    /**
     *
     * @var string
     * @Column(type="string", length=30, nullable=false)
     */
    public $email;

    /**
     *
     * @var string
     * @Column(type="string", length=100, nullable=false)
     */
    public $facebook;

    /**
     *
     * @var string
     * @Column(type="string", length=14, nullable=false)
     */
    public $handphone;

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
        return 'users';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Users[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Users
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
