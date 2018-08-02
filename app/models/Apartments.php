<?php

class Apartments extends \Phalcon\Mvc\Model
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
     * @Column(column="project_id", type="integer", length=3, nullable=false)
     */
    public $project_id;

    /**
     *
     * @var integer
     * @Column(column="action_id", type="integer", length=11, nullable=false)
     */
    public $action_id;

    /**
     *
     * @var string
     * @Column(column="build", type="string", length=10, nullable=false)
     */
    public $build;

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
     * @Column(column="rooms", type="integer", length=1, nullable=false)
     */
    public $rooms;

    /**
     *
     * @var integer
     * @Column(column="level", type="integer", length=1, nullable=false)
     */
    public $level;

    /**
     *
     * @var string
     * @Column(column="type", type="string", length=11, nullable=false)
     */
    public $type;

    /**
     *
     * @var string
     * @Column(column="number", type="string", length=10, nullable=false)
     */
    public $number;

    /**
     *
     * @var integer
     * @Column(column="onSale", type="integer", length=1, nullable=false)
     */
    public $onSale;

    /**
     *
     * @var string
     * @Column(column="sorts", type="string", nullable=true)
     */
    public $sorts;

    /**
     *
     * @var string
     * @Column(column="img", type="string", nullable=false)
     */
    public $img;

    /**
     *
     * @var integer
     * @Column(column="compas", type="integer", length=3, nullable=false)
     */
    public $compas;

    /**
     *
     * @var string
     * @Column(column="sort_floor", type="string", nullable=true)
     */
    public $sort_floor;

    /**
     *
     * @var string
     * @Column(column="unit", type="string", length=50, nullable=false)
     */
    public $unit;

    /**
     *
     * @var integer
     * @Column(column="action_price", type="integer", length=10, nullable=false)
     */
    public $action_price;

    /**
     *
     * @var string
     * @Column(column="visible", type="string", length=1, nullable=false)
     */
    public $visible;

    /**
     *
     * @var double
     * @Column(column="all_room", type="double", nullable=true)
     */
    public $all_room;

    /**
     *
     * @var double
     * @Column(column="_life_room", type="double", nullable=true)
     */
    public $_life_room;

    /**
     *
     * @var integer
     * @Column(column="price", type="integer", length=10, nullable=false)
     */
    public $price;

    /**
     *
     * @var integer
     * @Column(column="type_object", type="integer", length=11, nullable=false)
     */
    public $type_object;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSource("apartments");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'apartments';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Apartments[]|Apartments|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Apartments|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
