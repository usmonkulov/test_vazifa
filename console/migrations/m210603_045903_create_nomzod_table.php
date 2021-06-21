<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%nomzod}}`.
 */
class m210603_045903_create_nomzod_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%nomzod}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255),
            'family_name' => $this->string(255),
            'address' => $this->text(),
            'country_of_origin' => $this->string(255),
            'email_adress' => $this->string(255),
            'phone_number' => $this->string(255),
            'age' => $this->integer(11),
            'hired' => $this->boolean()->null()->defaultValue(0),
            'status' => $this->smallInteger()->null()->defaultValue(1),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%nomzod}}');
    }
}
