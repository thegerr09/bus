<?php

class TutupBuku extends \Phalcon\Mvc\Model
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
    public $id_jurnal;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $tanggal;

    /**
     *
     * @var string
     * @Column(type="string", length=11, nullable=false)
     */
    public $kode_jurnal;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $keterangan;

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
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'tutup_buku';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return TutupBuku[]|TutupBuku
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return TutupBuku
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
