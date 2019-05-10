<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%requests}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%city}}`
 * - `{{%car}}`
 * - `{{%user}}`
 * - `{{%user}}`
 * - `{{%request_statuses}}`
 *
 * yii migrate/create create_requests_table --fields=id_city:integer:notNull:foreignKey(city),id_car:integer:notNull:foreignKey(car),created_by:integer:notNull:foreignKey(user),created_at:integer:notNull,updated_by:integer:foreignKey(user),updated_at:integer,id_request_status:integer:notNull:foreignKey(request_statuses)
 */
class m190510_041218_create_requests_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%requests}}', [
            'id' => $this->primaryKey(),
            'id_city' => $this->integer()->notNull(),
            'id_car' => $this->integer()->notNull(),
            'created_by' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_by' => $this->integer(),
            'updated_at' => $this->integer(),
            'id_request_status' => $this->integer()->notNull(),
        ]);

        // creates index for column `id_city`
        $this->createIndex(
            '{{%idx-requests-id_city}}',
            '{{%requests}}',
            'id_city'
        );

        // add foreign key for table `{{%city}}`
        $this->addForeignKey(
            '{{%fk-requests-id_city}}',
            '{{%requests}}',
            'id_city',
            '{{%city}}',
            'id',
            'CASCADE'
        );

        // creates index for column `id_car`
        $this->createIndex(
            '{{%idx-requests-id_car}}',
            '{{%requests}}',
            'id_car'
        );

        // add foreign key for table `{{%car}}`
        $this->addForeignKey(
            '{{%fk-requests-id_car}}',
            '{{%requests}}',
            'id_car',
            '{{%car}}',
            'id',
            'CASCADE'
        );

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-requests-created_by}}',
            '{{%requests}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-requests-created_by}}',
            '{{%requests}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-requests-updated_by}}',
            '{{%requests}}',
            'updated_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-requests-updated_by}}',
            '{{%requests}}',
            'updated_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `id_request_status`
        $this->createIndex(
            '{{%idx-requests-id_request_status}}',
            '{{%requests}}',
            'id_request_status'
        );

        // add foreign key for table `{{%request_statuses}}`
        $this->addForeignKey(
            '{{%fk-requests-id_request_status}}',
            '{{%requests}}',
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
            '{{%fk-requests-id_city}}',
            '{{%requests}}'
        );

        // drops index for column `id_city`
        $this->dropIndex(
            '{{%idx-requests-id_city}}',
            '{{%requests}}'
        );

        // drops foreign key for table `{{%car}}`
        $this->dropForeignKey(
            '{{%fk-requests-id_car}}',
            '{{%requests}}'
        );

        // drops index for column `id_car`
        $this->dropIndex(
            '{{%idx-requests-id_car}}',
            '{{%requests}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-requests-created_by}}',
            '{{%requests}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-requests-created_by}}',
            '{{%requests}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-requests-updated_by}}',
            '{{%requests}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-requests-updated_by}}',
            '{{%requests}}'
        );

        // drops foreign key for table `{{%request_statuses}}`
        $this->dropForeignKey(
            '{{%fk-requests-id_request_status}}',
            '{{%requests}}'
        );

        // drops index for column `id_request_status`
        $this->dropIndex(
            '{{%idx-requests-id_request_status}}',
            '{{%requests}}'
        );

        $this->dropTable('{{%requests}}');
    }
}
