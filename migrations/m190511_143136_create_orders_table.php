<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%orders}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%service_types}}`
 * - `{{%work_types}}`
 * - `{{%work_categories}}`
 * - `{{%users}}`
 * - `{{%vehicles}}`
 * - `{{%request_statuses}}`
 *
 * yii migrate/create create_orders_table --fields=id_service:integer:foreignKey(service_types),id_work_type:integer:foreignKey(work_types),id_work_category:integer:foreignKey(work_categories),created_by:integer:foreignKey(users),id_vehicle:integer:foreignKey(vehicles),create_at:integer:notNull,cost_service:double:notNull,date_start:integer,date_end:integer,status:integer:foreignKey(request_statuses)
 */
class m190511_143136_create_orders_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%orders}}', [
            'id' => $this->primaryKey(),
            'id_service' => $this->integer(),
            'id_work_type' => $this->integer(),
            'id_work_category' => $this->integer(),
            'created_by' => $this->integer(),
            'id_vehicle' => $this->integer(),
            'create_at' => $this->integer()->notNull(),
            'cost_service' => $this->double()->notNull(),
            'date_start' => $this->integer(),
            'date_end' => $this->integer(),
            'status' => $this->integer(),
        ]);

        // creates index for column `id_service`
        $this->createIndex(
            '{{%idx-orders-id_service}}',
            '{{%orders}}',
            'id_service'
        );

        // add foreign key for table `{{%service_types}}`
        $this->addForeignKey(
            '{{%fk-orders-id_service}}',
            '{{%orders}}',
            'id_service',
            '{{%service_types}}',
            'id',
            'CASCADE'
        );

        // creates index for column `id_work_type`
        $this->createIndex(
            '{{%idx-orders-id_work_type}}',
            '{{%orders}}',
            'id_work_type'
        );

        // add foreign key for table `{{%work_types}}`
        $this->addForeignKey(
            '{{%fk-orders-id_work_type}}',
            '{{%orders}}',
            'id_work_type',
            '{{%work_types}}',
            'id',
            'CASCADE'
        );

        // creates index for column `id_work_category`
        $this->createIndex(
            '{{%idx-orders-id_work_category}}',
            '{{%orders}}',
            'id_work_category'
        );

        // add foreign key for table `{{%work_categories}}`
        $this->addForeignKey(
            '{{%fk-orders-id_work_category}}',
            '{{%orders}}',
            'id_work_category',
            '{{%work_categories}}',
            'id',
            'CASCADE'
        );

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-orders-created_by}}',
            '{{%orders}}',
            'created_by'
        );

        // add foreign key for table `{{%users}}`
        $this->addForeignKey(
            '{{%fk-orders-created_by}}',
            '{{%orders}}',
            'created_by',
            '{{%users}}',
            'id',
            'CASCADE'
        );

        // creates index for column `id_vehicle`
        $this->createIndex(
            '{{%idx-orders-id_vehicle}}',
            '{{%orders}}',
            'id_vehicle'
        );

        // add foreign key for table `{{%vehicles}}`
        $this->addForeignKey(
            '{{%fk-orders-id_vehicle}}',
            '{{%orders}}',
            'id_vehicle',
            '{{%vehicles}}',
            'id',
            'CASCADE'
        );

        // creates index for column `status`
        $this->createIndex(
            '{{%idx-orders-status}}',
            '{{%orders}}',
            'status'
        );

        // add foreign key for table `{{%request_statuses}}`
        $this->addForeignKey(
            '{{%fk-orders-status}}',
            '{{%orders}}',
            'status',
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
        // drops foreign key for table `{{%service_types}}`
        $this->dropForeignKey(
            '{{%fk-orders-id_service}}',
            '{{%orders}}'
        );

        // drops index for column `id_service`
        $this->dropIndex(
            '{{%idx-orders-id_service}}',
            '{{%orders}}'
        );

        // drops foreign key for table `{{%work_types}}`
        $this->dropForeignKey(
            '{{%fk-orders-id_work_type}}',
            '{{%orders}}'
        );

        // drops index for column `id_work_type`
        $this->dropIndex(
            '{{%idx-orders-id_work_type}}',
            '{{%orders}}'
        );

        // drops foreign key for table `{{%work_categories}}`
        $this->dropForeignKey(
            '{{%fk-orders-id_work_category}}',
            '{{%orders}}'
        );

        // drops index for column `id_work_category`
        $this->dropIndex(
            '{{%idx-orders-id_work_category}}',
            '{{%orders}}'
        );

        // drops foreign key for table `{{%users}}`
        $this->dropForeignKey(
            '{{%fk-orders-created_by}}',
            '{{%orders}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-orders-created_by}}',
            '{{%orders}}'
        );

        // drops foreign key for table `{{%vehicles}}`
        $this->dropForeignKey(
            '{{%fk-orders-id_vehicle}}',
            '{{%orders}}'
        );

        // drops index for column `id_vehicle`
        $this->dropIndex(
            '{{%idx-orders-id_vehicle}}',
            '{{%orders}}'
        );

        // drops foreign key for table `{{%request_statuses}}`
        $this->dropForeignKey(
            '{{%fk-orders-status}}',
            '{{%orders}}'
        );

        // drops index for column `status`
        $this->dropIndex(
            '{{%idx-orders-status}}',
            '{{%orders}}'
        );

        $this->dropTable('{{%orders}}');
    }
}
