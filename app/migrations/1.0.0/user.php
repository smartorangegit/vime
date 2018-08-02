<?php 

use Phalcon\Db\Column;
use Phalcon\Db\Index;
use Phalcon\Db\Reference;
use Phalcon\Mvc\Model\Migration;

/**
 * Class UserMigration_100
 */
class UserMigration_100 extends Migration
{
    /**
     * Define the table structure
     *
     * @return void
     */
    public function morph()
    {
        $this->morphTable('user', [
                'columns' => [
                    new Column(
                        'id',
                        [
                            'type' => Column::TYPE_INTEGER,
                            'notNull' => true,
                            'autoIncrement' => true,
                            'size' => 11,
                            'first' => true
                        ]
                    ),
                    new Column(
                        'typ_access',
                        [
                            'type' => Column::TYPE_INTEGER,
                            'default' => "0",
                            'notNull' => true,
                            'size' => 2,
                            'after' => 'id'
                        ]
                    ),
                    new Column(
                        'user_name',
                        [
                            'type' => Column::TYPE_VARCHAR,
                            'size' => 50,
                            'after' => 'typ_access'
                        ]
                    ),
                    new Column(
                        'user_last_name',
                        [
                            'type' => Column::TYPE_VARCHAR,
                            'size' => 50,
                            'after' => 'user_name'
                        ]
                    ),
                    new Column(
                        'user_second_name',
                        [
                            'type' => Column::TYPE_VARCHAR,
                            'size' => 50,
                            'after' => 'user_last_name'
                        ]
                    ),
                    new Column(
                        'user_email',
                        [
                            'type' => Column::TYPE_VARCHAR,
                            'size' => 50,
                            'after' => 'user_second_name'
                        ]
                    ),
                    new Column(
                        'user_phone',
                        [
                            'type' => Column::TYPE_VARCHAR,
                            'notNull' => true,
                            'size' => 30,
                            'after' => 'user_email'
                        ]
                    ),
                    new Column(
                        'user_password',
                        [
                            'type' => Column::TYPE_VARCHAR,
                            'size' => 100,
                            'after' => 'user_phone'
                        ]
                    ),
                    new Column(
                        'user_login',
                        [
                            'type' => Column::TYPE_VARCHAR,
                            'size' => 50,
                            'after' => 'user_password'
                        ]
                    ),
                    new Column(
                        'active',
                        [
                            'type' => Column::TYPE_BOOLEAN,
                            'default' => "b'0'",
                            'notNull' => true,
                            'size' => 1,
                            'after' => 'user_login'
                        ]
                    ),
                    new Column(
                        'reserve',
                        [
                            'type' => Column::TYPE_BOOLEAN,
                            'default' => "b'0'",
                            'notNull' => true,
                            'size' => 1,
                            'after' => 'active'
                        ]
                    ),
                    new Column(
                        'time_reserve',
                        [
                            'type' => Column::TYPE_INTEGER,
                            'default' => "3",
                            'size' => 4,
                            'after' => 'reserve'
                        ]
                    ),
                    new Column(
                        'extend_reserve',
                        [
                            'type' => Column::TYPE_INTEGER,
                            'default' => "0",
                            'notNull' => true,
                            'size' => 1,
                            'after' => 'time_reserve'
                        ]
                    )
                ],
                'indexes' => [
                    new Index('PRIMARY', ['id'], 'PRIMARY')
                ],
                'options' => [
                    'TABLE_TYPE' => 'BASE TABLE',
                    'AUTO_INCREMENT' => '35',
                    'ENGINE' => 'InnoDB',
                    'TABLE_COLLATION' => 'utf8mb4_unicode_ci'
                ],
            ]
        );
    }

    /**
     * Run the migrations
     *
     * @return void
     */
    public function up()
    {

    }

    /**
     * Reverse the migrations
     *
     * @return void
     */
    public function down()
    {

    }

}
