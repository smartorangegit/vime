<?php

class ApartmentsLevel extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(column="id", type="integer", length=11, nullable=false)
     */
    public $id;

    /**
     *
     * @var integer
     * @Column(column="id_flat", type="integer", length=11, nullable=false)
     */
    public $id_flat;

    /**
     *
     * @var string
     * @Column(column="unit", type="string", length=255, nullable=false)
     */
    public $unit;

    /**
     *
     * @var integer
     * @Column(column="level", type="integer", length=4, nullable=false)
     */
    public $level;

    /**
     *
     * @var string
     * @Column(column="sorts", type="string", length=255, nullable=false)
     */
    public $sorts;

    /**
     *
     * @var string
     * @Column(column="sort_floor", type="string", length=255, nullable=false)
     */
    public $sort_floor;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("vime_db");
        $this->setSource("apartments_level");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'apartments_level';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return ApartmentsLevel[]|ApartmentsLevel|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return ApartmentsLevel|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
