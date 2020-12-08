<?php

use yii\db\Migration;

/**
 * Class m201201_131945_create_table_country
 */
class m201201_131945_create_table_country extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(){
      $this->createTable('country', [
        'id' => $this->primaryKey()->unsigned(),
        'code' => $this->string(2)->unique()->notNull(),
        'name' => $this->string(80)->notNull(),
        'phonecode' => $this->integer(5)->notNull(),
        'lat' => $this->string(45)->notNull(),
        'lng' => $this->string(45)->notNull()
      ]);
/*
      $this->insert('country', [
        'code' => 'DE',
        'name' => 'Germany',
        'phonecode' => '49',
        'lat' => '1111111',
        'lng' => '2222222'
      ]);*/

      $this->batchInsert('country', ['id', 'code', 'name', 'phonecode', 'lat', 'lng'], [
        ['1', 'AF', 'Afghanistan', '93', '33.999911', '67.709953']
      ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('country');
        $this->dropTable('country');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201201_131945_create_table_country cannot be reverted.\n";

        return false;
    }
    */
}
