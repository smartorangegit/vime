<?php

class PropertiesFlats extends \Phalcon\Mvc\Model
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
     * @Column(column="flat_id", type="integer", length=11, nullable=false)
     */
    public $flat_id;

    /**
     *
     * @var integer
     * @Column(column="property_id", type="integer", length=11, nullable=false)
     */
    public $property_id;

    /**
     *
     * @var string
     * @Column(column="property_flat", type="string", length=100, nullable=false)
     */
    public $property_flat;

    /**
     *
     * @var integer
     * @Column(column="level", type="integer", length=1, nullable=false)
     */
    public $level;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("vime_db");
        $this->setSource("properties_flats");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'properties_flats';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return PropertiesFlats[]|PropertiesFlats|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return PropertiesFlats|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
