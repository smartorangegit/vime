<?php

class Section extends \Phalcon\Mvc\Model
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
     * @Column(column="project_id", type="integer", length=11, nullable=false)
     */
    public $project_id;

    /**
     *
     * @var integer
     * @Column(column="sec", type="integer", length=2, nullable=false)
     */
    public $sec;

    /**
     *
     * @var integer
     * @Column(column="floor", type="integer", length=3, nullable=false)
     */
    public $floor;

    /**
     *
     * @var integer
     * @Column(column="build", type="integer", length=2, nullable=false)
     */
    public $build;

    /**
     *
     * @var string
     * @Column(column="img", type="string", length=50, nullable=false)
     */
    public $img;

    /**
     *
     * @var integer
     * @Column(column="compas", type="integer", length=3, nullable=false)
     */
    public $compas;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("vime_db");
        $this->setSource("section");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'section';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Section[]|Section|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Section|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
