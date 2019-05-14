<?php

use yii\db\Migration;

/**
 * Class m190514_165922_user_table
 */
class m190514_165922_user_table extends Migration
{
    const USER_TABLE = '{{%users}}';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(self::USER_TABLE,[
                'id'=>$this->primaryKey(),
                'name'=>$this->string(50),
                'login'=>$this->string(50),
                'password'=>$this->string(250),
                'check_user'=>$this->tinyInteger()->notNull()->defaultValue(0),
        ]);
        $this->insert('users',
            [
                'name'=>'Mihail',
                'login'=>'Mihab',
                'password'=>'123',
                'check_user'=>1,
            ]);
        $this->insert('users',
            [
                'name'=>'Qwerty',
                'login'=>'Qwerty',
                'password'=>'123',
            ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
//        echo "m190514_165922_user_table cannot be reverted.\n";
//
//        return false;
        $this->dropTable(self::USER_TABLE);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190514_165922_user_table cannot be reverted.\n";

        return false;
    }
    */
}
