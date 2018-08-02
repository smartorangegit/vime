<?php

class Development extends \Phalcon\Mvc\Model
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
     * @Column(column="development_name", type="string", length=255, nullable=true)
     */
    public $development_name;

    /**
     *
     * @var string
     * @Column(column="development_img", type="string", length=255, nullable=true)
     */
    public $development_img;

    /**
     *
     * @var string
     * @Column(column="development_site", type="string", length=100, nullable=true)
     */
    public $development_site;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("vime_db");
        $this->setSource("development");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'development';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Development[]|Development|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Development|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
