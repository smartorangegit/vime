<?php

class Projects extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(column="project_id", type="integer", length=3, nullable=false)
     */
    public $project_id;

    /**
     *
     * @var string
     * @Column(column="project_name", type="string", length=50, nullable=false)
     */
    public $project_name;

    /**
     *
     * @var string
     * @Column(column="project_adress", type="string", length=300, nullable=true)
     */
    public $project_adress;

    /**
     *
     * @var string
     * @Column(column="project_metro", type="string", length=255, nullable=true)
     */
    public $project_metro;

    /**
     *
     * @var integer
     * @Column(column="project_price_flat", type="integer", length=9, nullable=false)
     */
    public $project_price_flat;

    /**
     *
     * @var integer
     * @Column(column="project_price", type="integer", length=9, nullable=false)
     */
    public $project_price;

    /**
     *
     * @var integer
     * @Column(column="project_rooms", type="integer", length=6, nullable=false)
     */
    public $project_rooms;

    /**
     *
     * @var string
     * @Column(column="project_site", type="string", length=100, nullable=true)
     */
    public $project_site;

    /**
     *
     * @var string
     * @Column(column="project_img", type="string", length=255, nullable=true)
     */
    public $project_img;

    /**
     *
     * @var integer
     * @Column(column="development_id", type="integer", length=11, nullable=false)
     */
    public $development_id;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {

        $this->setSource("projects");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'projects';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Projects[]|Projects|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {

        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Projects|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
