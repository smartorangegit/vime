<?php 

use Phalcon\Db\Column;
use Phalcon\Db\Index;
use Phalcon\Db\Reference;
use Phalcon\Mvc\Model\Migration;

/**
 * Class ApartmentsMigration_100
 */
class ApartmentsMigration_100 extends Migration
{
    /**
     * Define the table structure
     *
     * @return void
     */
    public function morph()
    {
        $this->morphTable('apartments', [
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
                        'project_id',
                        [
                            'type' => Column::TYPE_INTEGER,
                            'notNull' => true,
                            'size' => 3,
                            'after' => 'id'
                        ]
                    ),
                    new Column(
                        'action_id',
                        [
                            'type' => Column::TYPE_INTEGER,
                            'notNull' => true,
                            'size' => 11,
                            'after' => 'project_id'
                        ]
                    ),
                    new Column(
                        'build',
                        [
                            'type' => Column::TYPE_VARCHAR,
                            'notNull' => true,
                            'size' => 10,
                            'after' => 'action_id'
                        ]
                    ),
                    new Column(
                        'sec',
                        [
                            'type' => Column::TYPE_INTEGER,
                            'notNull' => true,
                            'size' => 2,
                            'after' => 'build'
                        ]
                    ),
                    new Column(
                        'floor',
                        [
                            'type' => Column::TYPE_INTEGER,
                            'notNull' => true,
                            'size' => 3,
                            'after' => 'sec'
                        ]
                    ),
                    new Column(
                        'rooms',
                        [
                            'type' => Column::TYPE_INTEGER,
                            'notNull' => true,
                            'size' => 1,
                            'after' => 'floor'
                        ]
                    ),
                    new Column(
                        'level',
                        [
                            'type' => Column::TYPE_INTEGER,
                            'notNull' => true,
                            'size' => 1,
                            'after' => 'rooms'
                        ]
                    ),
                    new Column(
                        'type',
                        [
                            'type' => Column::TYPE_VARCHAR,
                            'notNull' => true,
                            'size' => 11,
                            'after' => 'level'
                        ]
                    ),
                    new Column(
                        'number',
                        [
                            'type' => Column::TYPE_VARCHAR,
                            'notNull' => true,
                            'size' => 10,
                            'after' => 'type'
                        ]
                    ),
                    new Column(
                        'onSale',
                        [
                            'type' => Column::TYPE_INTEGER,
                            'notNull' => true,
                            'size' => 1,
                            'after' => 'number'
                        ]
                    ),
                    new Column(
                        'sorts',
                        [
                            'type' => Column::TYPE_TEXT,
                            'size' => 1,
                            'after' => 'onSale'
                        ]
                    ),
                    new Column(
                        'img',
                        [
                            'type' => Column::TYPE_TEXT,
                            'notNull' => true,
                            'size' => 1,
                            'after' => 'sorts'
                        ]
                    ),
                    new Column(
                        'compas',
                        [
                            'type' => Column::TYPE_INTEGER,
                            'default' => "0",
                            'notNull' => true,
                            'size' => 3,
                            'after' => 'img'
                        ]
                    ),
                    new Column(
                        'sort_floor',
                        [
                            'type' => Column::TYPE_TEXT,
                            'size' => 1,
                            'after' => 'compas'
                        ]
                    ),
                    new Column(
                        'unit',
                        [
                            'type' => Column::TYPE_VARCHAR,
                            'default' => "0",
                            'notNull' => true,
                            'size' => 50,
                            'after' => 'sort_floor'
                        ]
                    ),
                    new Column(
                        'action_price',
                        [
                            'type' => Column::TYPE_INTEGER,
                            'notNull' => true,
                            'size' => 10,
                            'after' => 'unit'
                        ]
                    ),
                    new Column(
                        'visible',
                        [
                            'type' => Column::TYPE_BOOLEAN,
                            'default' => "b'1'",
                            'notNull' => true,
                            'size' => 1,
                            'after' => 'action_price'
                        ]
                    ),
                    new Column(
                        'all_room',
                        [
                            'type' => Column::TYPE_FLOAT,
                            'size' => 1,
                            'after' => 'visible'
                        ]
                    ),
                    new Column(
                        '_life_room',
                        [
                            'type' => Column::TYPE_FLOAT,
                            'size' => 1,
                            'after' => 'all_room'
                        ]
                    ),
                    new Column(
                        'price',
                        [
                            'type' => Column::TYPE_INTEGER,
                            'default' => "0",
                            'notNull' => true,
                            'size' => 10,
                            'after' => '_life_room'
                        ]
                    ),
                    new Column(
                        'type_object',
                        [
                            'type' => Column::TYPE_INTEGER,
                            'default' => "1",
                            'notNull' => true,
                            'size' => 11,
                            'after' => 'price'
                        ]
                    )
                ],
                'indexes' => [
                    new Index('PRIMARY', ['id'], 'PRIMARY'),
                    new Index('visible_project_id_buld', ['visible', 'project_id', 'build'], null),
                    new Index('visible', ['visible'], null)
                ],
                'options' => [
                    'TABLE_TYPE' => 'BASE TABLE',
                    'AUTO_INCREMENT' => '300',
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
