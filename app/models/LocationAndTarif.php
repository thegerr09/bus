<?php

class LocationAndTarif extends \Phalcon\Mvc\Model
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
    public $route_id;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $location;

    /**
     *
     * @var string
     * @Column(type="string", length=16, nullable=false)
     */
    public $medium_agen;

    /**
     *
     * @var string
     * @Column(type="string", length=16, nullable=false)
     */
    public $big_agen;

    /**
     *
     * @var string
     * @Column(type="string", length=16, nullable=false)
     */
    public $medium_umum;

    /**
     *
     * @var string
     * @Column(type="string", length=16, nullable=false)
     */
    public $big_umum;

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
        return 'location_and_tarif';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return LocationAndTarif[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return LocationAndTarif
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
