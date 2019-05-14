<?php

use yii\db\Migration;

/**
 * Class m190514_180413_files_user_fk
 */
class m190514_180413_files_user_fk extends Migration
{
    const FILES_TABLE = '{{%files}}';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'files_user_fk',
            self::FILES_TABLE,
            'user_id',
            'users',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropForeignKey(
            'files_user_fk',
            self::FILES_TABLE
        );
//        echo "m190514_180413_files_user_fk cannot be reverted.\n";
//
//        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190514_180413_files_user_fk cannot be reverted.\n";

        return false;
    }
    */
}
