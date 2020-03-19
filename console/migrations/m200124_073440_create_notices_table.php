<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%notices}}`.
 */
class m200124_073440_create_notices_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%notices}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->defaultValue('')->notNull()->comment('标题'),
            'content' => $this->text()->notNull()->comment('内容'),


            'created_by' => $this->string()->defaultValue('')->notNull()->comment('创建人'),
            'created_at' => $this->integer()->defaultValue(0)->notNull()->comment('创建时间'),
            'deleted_at' => $this->integer()->defaultValue(0)->notNull()->comment('删除时间'),
        ], $tableOptions);

        $this->addCommentOnTable('{{%notices}}','公告表 ');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%notices}}');
    }
}
