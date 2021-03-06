<?php

class Header extends \Phalcon\Mvc\Model
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
    public $header;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $group_header;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $jenis;

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
        return 'header';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Header[]|Header
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Header
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
