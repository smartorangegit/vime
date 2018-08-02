<?php

class PropertiesName extends \Phalcon\Mvc\Model
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
     * @var string
     * @Column(column="properties_name_ua", type="string", length=255, nullable=false)
     */
    public $properties_name_ua;

    /**
     *
     * @var string
     * @Column(column="properties_name_ru", type="string", length=255, nullable=false)
     */
    public $properties_name_ru;

    /**
     *
     * @var string
     * @Column(column="properties_name_en", type="string", length=255, nullable=false)
     */
    public $properties_name_en;

    /**
     *
     * @var integer
     * @Column(column="properties_typ", type="integer", length=5, nullable=false)
     */
    public $properties_typ;

    /**
     *
     * @var string
     * @Column(column="active", type="string", length=1, nullable=false)
     */
    public $active;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("vime_db");
        $this->setSource("properties_name");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'properties_name';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return PropertiesName[]|PropertiesName|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return PropertiesName|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
