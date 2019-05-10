<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%vehicles}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%car_models}}`
 * - `{{%motors}}`
 * - `{{%transmissions}}`
 * - `{{%users}}`
 * - `{{%users}}`
 *
 * yii migrate/create create_vehicles_table --fields=id_car_model:integer:notNull:foreignKey(car_models),id_motor:integer:notNull:foreignKey(motors),power:integer,vin:string(17),reg_number:string(7),rel_year:integer,id_transmission:integer:fo
reignKey(transmissions),mileage:integer,created_by:integer:notNull:foreignKey(users),created_at:integer:notNull,updated_by:integer:notNull:foreignKey(users),updated_at:integer:notNull
 */
class m190510_035814_create_vehicles_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%vehicles}}', [
            'id' => $this->primaryKey(),
            'id_car_model' => $this->integer()->notNull(),
            'id_motor' => $this->integer()->notNull(),
            'power' => $this->integer(),
            'vin' => $this->string(17),
            'reg_number' => $this->string(7),
            'rel_year' => $this->integer(),
            'id_transmission' => $this->integer(),
            'mileage' => $this->integer(),
            'created_by' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_by' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        // creates index for column `id_car_model`
        $this->createIndex(
            '{{%idx-vehicles-id_car_model}}',
            '{{%vehicles}}',
            'id_car_model'
        );

        // add foreign key for table `{{%car_models}}`
        $this->addForeignKey(
            '{{%fk-vehicles-id_car_model}}',
            '{{%vehicles}}',
            'id_car_model',
            '{{%car_models}}',
            'id',
            'CASCADE'
        );

        // creates index for column `id_motor`
        $this->createIndex(
            '{{%idx-vehicles-id_motor}}',
            '{{%vehicles}}',
            'id_motor'
        );

        // add foreign key for table `{{%motors}}`
        $this->addForeignKey(
            '{{%fk-vehicles-id_motor}}',
            '{{%vehicles}}',
            'id_motor',
            '{{%motors}}',
            'id',
            'CASCADE'
        );

        // creates index for column `id_transmission`
        $this->createIndex(
            '{{%idx-vehicles-id_transmission}}',
            '{{%vehicles}}',
            'id_transmission'
        );

        // add foreign key for table `{{%transmissions}}`
        $this->addForeignKey(
            '{{%fk-vehicles-id_transmission}}',
            '{{%vehicles}}',
            'id_transmission',
            '{{%transmissions}}',
            'id',
            'CASCADE'
        );

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-vehicles-created_by}}',
            '{{%vehicles}}',
            'created_by'
        );

        // add foreign key for table `{{%users}}`
        $this->addForeignKey(
            '{{%fk-vehicles-created_by}}',
            '{{%vehicles}}',
            'created_by',
            '{{%users}}',
            'id',
            'CASCADE'
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-vehicles-updated_by}}',
            '{{%vehicles}}',
            'updated_by'
        );

        // add foreign key for table `{{%users}}`
        $this->addForeignKey(
            '{{%fk-vehicles-updated_by}}',
            '{{%vehicles}}',
            'updated_by',
            '{{%users}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%car_models}}`
        $this->dropForeignKey(
            '{{%fk-vehicles-id_car_model}}',
            '{{%vehicles}}'
        );

        // drops index for column `id_car_model`
        $this->dropIndex(
            '{{%idx-vehicles-id_car_model}}',
            '{{%vehicles}}'
        );

        // drops foreign key for table `{{%motors}}`
        $this->dropForeignKey(
            '{{%fk-vehicles-id_motor}}',
            '{{%vehicles}}'
        );

        // drops index for column `id_motor`
        $this->dropIndex(
            '{{%idx-vehicles-id_motor}}',
            '{{%vehicles}}'
        );

        // drops foreign key for table `{{%transmissions}}`
        $this->dropForeignKey(
            '{{%fk-vehicles-id_transmission}}',
            '{{%vehicles}}'
        );

        // drops index for column `id_transmission`
        $this->dropIndex(
            '{{%idx-vehicles-id_transmission}}',
            '{{%vehicles}}'
        );

        // drops foreign key for table `{{%users}}`
        $this->dropForeignKey(
            '{{%fk-vehicles-created_by}}',
            '{{%vehicles}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-vehicles-created_by}}',
            '{{%vehicles}}'
        );

        // drops foreign key for table `{{%users}}`
        $this->dropForeignKey(
            '{{%fk-vehicles-updated_by}}',
            '{{%vehicles}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-vehicles-updated_by}}',
            '{{%vehicles}}'
        );

        $this->dropTable('{{%vehicles}}');
    }
}
