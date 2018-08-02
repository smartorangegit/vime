<?php

class Users extends \Phalcon\Mvc\Model
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
     * @Column(column="typ_access", type="integer", length=2, nullable=false)
     */
    public $typ_access;

    /**
     *
     * @var string
     * @Column(column="user_first_name", type="string", length=50, nullable=true)
     */
    public $user_first_name;

    /**
     *
     * @var string
     * @Column(column="user_last_name", type="string", length=50, nullable=true)
     */
    public $user_last_name;

    /**
     *
     * @var string
     * @Column(column="user_second_name", type="string", length=50, nullable=true)
     */
    public $user_second_name;

    /**
     *
     * @var string
     * @Column(column="user_email", type="string", length=50, nullable=true)
     */
    public $user_email;

    /**
     *
     * @var string
     * @Column(column="user_phone", type="string", length=30, nullable=true)
     */
    public $user_phone;

    /**
     *
     * @var string
     * @Column(column="user_pass", type="string", length=100, nullable=true)
     */
    public $user_pass;

    /**
     *
     * @var string
     * @Column(column="user_login", type="string", length=50, nullable=true)
     */
    public $user_login;

    /**
     *
     * @var string
     * @Column(column="user_active", type="string", length=1, nullable=false)
     */
    public $user_active;

    /**
     *
     * @var string
     * @Column(column="reserve", type="string", length=1, nullable=false)
     */
    public $reserve;

    /**
     *
     * @var integer
     * @Column(column="time_reserve", type="integer", length=4, nullable=true)
     */
    public $time_reserve;

    /**
     *
     * @var integer
     * @Column(column="extend_reserve", type="integer", length=1, nullable=false)
     */
    public $extend_reserve;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {

        $this->setSource("users");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'users';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Users[]|Users|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Users|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
