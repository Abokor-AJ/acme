<?php

use yii\db\Migration;

/**
 * Class m201201_173837_create_table_user
 */
class m201201_173837_create_table_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(){
      $this->createTable('user', [
        'id' => $this->primaryKey()->unsigned()->notNull(),
        'uid' => $this->string(60)->notNull(),
        'username' => $this->string(45)->notNull(),
        'email' => $this->string(255)->unique()->notNull(),
        'password' => $this->string(60)->notNull(),
        'status' => $this->integer(4)->notNull()->defaultValue(0),
        'contact_email' => $this->boolean()->notNull()->defaultValue(false),
        'contact_phone' => $this->boolean()->notNull()->defaultValue(false),
        'updated' => $this->timestamp()->notNull(),
        'created' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP')

      ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown(){

      $this->dropTable('user');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201201_173837_create_table_user cannot be reverted.\n";

        return false;
    }
    */
}
