<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%city}}`
 * - `{{%vip_cards}}`
 *
 * yii migrate/create create_users_table --fields=password_hash:string:notNull,auth_key:string,created_at:integer:notNull,updated_at:integer,username:string(32):notNull:unique,surname:string(32):notNull,name:string(32):notNull,middlename:stri
ng(32),birthday:integer:notNull,email:string(128):notNull:unique,telegram_name:string(55),telephone:string(10):unique:notNull,id_city:integer:notNull:foreignKey(city),id_vip_card:integer:foreignKey(vip_cards)

 */
class m190510_053045_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%users}}', [
            'id' => $this->primaryKey(),
            'password_hash' => $this->string()->notNull(),
            'auth_key' => $this->string(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer(),
            'username' => $this->string(32)->notNull()->unique(),
            'surname' => $this->string(32)->notNull(),
            'name' => $this->string(32)->notNull(),
            'middlename' => $this->string(32),
            'birthday' => $this->integer()->notNull(),
            'email' => $this->string(128)->notNull()->unique(),
            'telegram_name' => $this->string(55),
            'telephone' => $this->string(10)->unique()->notNull(),
            'id_city' => $this->integer()->notNull(),
            'id_vip_card' => $this->integer(),
        ]);

        // creates index for column `id_city`
        $this->createIndex(
            '{{%idx-users-id_city}}',
            '{{%users}}',
            'id_city'
        );

        // add foreign key for table `{{%city}}`
        $this->addForeignKey(
            '{{%fk-users-id_city}}',
            '{{%users}}',
            'id_city',
            '{{%city}}',
            'id',
            'CASCADE'
        );

        // creates index for column `id_vip_card`
        $this->createIndex(
            '{{%idx-users-id_vip_card}}',
            '{{%users}}',
            'id_vip_card'
        );

        // add foreign key for table `{{%vip_cards}}`
        $this->addForeignKey(
            '{{%fk-users-id_vip_card}}',
            '{{%users}}',
            'id_vip_card',
            '{{%vip_cards}}',
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
            '{{%fk-users-id_city}}',
            '{{%users}}'
        );

        // drops index for column `id_city`
        $this->dropIndex(
            '{{%idx-users-id_city}}',
            '{{%users}}'
        );

        // drops foreign key for table `{{%vip_cards}}`
        $this->dropForeignKey(
            '{{%fk-users-id_vip_card}}',
            '{{%users}}'
        );

        // drops index for column `id_vip_card`
        $this->dropIndex(
            '{{%idx-users-id_vip_card}}',
            '{{%users}}'
        );

        $this->dropTable('{{%users}}');
    }
}
