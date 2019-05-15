<?php

use yii\db\Migration;

/**
 * Class m190514_171827_tasks_table
 */
class m190514_171827_tasks_table extends Migration
{
    const TASKS_TABLE = '{{%tasks}}';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(self::TASKS_TABLE,
            [
                'id'=>$this->primaryKey(),
                'user_id'=>$this->integer(),
                'user_check'=>$this->integer(),
                'tasks'=>$this->string(100),
                'file_key'=>$this->string(250),
                'task_check'=>$this->integer(),
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable(self::TASKS_TABLE);
//        echo "m190514_171827_tasks_table cannot be reverted.\n";
//        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190514_171827_tasks_table cannot be reverted.\n";

        return false;
    }
    */
}
