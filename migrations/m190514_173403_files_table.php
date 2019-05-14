<?php

use yii\db\Migration;

/**
 * Class m190514_173403_files_table
 */
class m190514_173403_files_table extends Migration
{
    const FILES_TABLE = '{{%files}}';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(self::FILES_TABLE,
            [
                'id'=>$this->primaryKey(),
                'filename'=>$this->string(250),
                'user_id'=>$this->integer(),
                'fileway'=>$this->string(250),
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable(self::FILES_TABLE);
//        echo "m190514_173403_files_table cannot be reverted.\n";
//        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190514_173403_files_table cannot be reverted.\n";

        return false;
    }
    */
}
