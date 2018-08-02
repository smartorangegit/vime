<?php

class ChangeAuthorization extends \Phalcon\Mvc\Model
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
     * @Column(column="date", type="string", nullable=false)
     */
    public $date;

    /**
     *
     * @var string
     * @Column(column="user_ip", type="string", length=15, nullable=false)
     */
    public $user_ip;

    /**
     *
     * @var string
     * @Column(column="user_email", type="string", length=50, nullable=false)
     */
    public $user_email;

    /**
     *
     * @var string
     * @Column(column="user_deviсу", type="string", length=255, nullable=false)
     */
    public $user_devicy;

    /**
     *
     * @var string
     * @Column(column="result", type="string", length=1, nullable=false)
     */
    public $result;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("vime_db");
        $this->setSource("change_authorization");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'change_authorization';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return ChangeAuthorization[]|ChangeAuthorization|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return ChangeAuthorization|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
