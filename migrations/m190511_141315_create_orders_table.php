<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%orders}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%city}}`
 * - `{{%car}}`
 * - `{{%user}}`
 * - `{{%user}}`
 * - `{{%request_statuses}}`
 *
 * yii migrate/create create_orders_table --fields=id_city:integer:notNull:foreignKey(city),id_car:integer:notNull:foreignKey(car),created_by:integer:notNull:foreignKey(user),created_at:integer:notNull,updated_by:integer:foreignKey(user),updated_at:integer,id_request_status:integer:notNull:foreignKey(request_statuses),final_cost:double,complete_date:integer
 */
class m190511_141315_create_orders_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%orders}}', [
            'id' => $this->primaryKey(),
            'id_city' => $this->integer()->notNull(),
            'id_car' => $this->integer()->notNull(),
            'created_by' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_by' => $this->integer(),
            'updated_at' => $this->integer(),
            'id_request_status' => $this->integer()->notNull(),
            'final_cost' => $this->double(),
            'complete_date' => $this->integer(),
        ]);

        // creates index for column `id_city`
        $this->createIndex(
            '{{%idx-orders-id_city}}',
            '{{%orders}}',
            'id_city'
        );

        // add foreign key for table `{{%city}}`
        $this->addForeignKey(
            '{{%fk-orders-id_city}}',
            '{{%orders}}',
            'id_city',
            '{{%city}}',
            'id',
            'CASCADE'
        );

        // creates index for column `id_car`
        $this->createIndex(
            '{{%idx-orders-id_car}}',
            '{{%orders}}',
            'id_car'
        );

        // add foreign key for table `{{%car}}`
        $this->addForeignKey(
            '{{%fk-orders-id_car}}',
            '{{%orders}}',
            'id_car',
            '{{%car}}',
            'id',
            'CASCADE'
        );

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-orders-created_by}}',
            '{{%orders}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-orders-created_by}}',
            '{{%orders}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-orders-updated_by}}',
            '{{%orders}}',
            'updated_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-orders-updated_by}}',
            '{{%orders}}',
            'updated_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `id_request_status`
        $this->createIndex(
            '{{%idx-orders-id_request_status}}',
            '{{%orders}}',
            'id_request_status'
        );

        // add foreign key for table `{{%request_statuses}}`
        $this->addForeignKey(
            '{{%fk-orders-id_request_status}}',
            '{{%orders}}',
            'id_request_status',
            '{{%request_statuses}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%city}}`
        $this->dropForeignKey(
            '{{%fk-orders-id_city}}',
            '{{%orders}}'
        );

        // drops index for column `id_city`
        $this->dropIndex(
            '{{%idx-orders-id_city}}',
            '{{%orders}}'
        );

        // drops foreign key for table `{{%car}}`
        $this->dropForeignKey(
            '{{%fk-orders-id_car}}',
            '{{%orders}}'
        );

        // drops index for column `id_car`
        $this->dropIndex(
            '{{%idx-orders-id_car}}',
            '{{%orders}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-orders-created_by}}',
            '{{%orders}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-orders-created_by}}',
            '{{%orders}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-orders-updated_by}}',
            '{{%orders}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-orders-updated_by}}',
            '{{%orders}}'
        );

        // drops foreign key for table `{{%request_statuses}}`
        $this->dropForeignKey(
            '{{%fk-orders-id_request_status}}',
            '{{%orders}}'
        );

        // drops index for column `id_request_status`
        $this->dropIndex(
            '{{%idx-orders-id_request_status}}',
            '{{%orders}}'
        );

        $this->dropTable('{{%orders}}');
    }
}
