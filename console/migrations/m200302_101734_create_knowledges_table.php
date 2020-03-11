<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%knowledges}}`.
 */
class m200302_101734_create_knowledges_table extends Migration
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

        $this->createTable('{{%knowledges}}', [
            'id' => $this->primaryKey(),
            'knowledges_id' => $this->integer()->defaultValue(0)->notNull()->comment('知识id'),
            'title' => $this->string()->defaultValue('')->notNull()->comment('标题'),
            'content' => $this->text()->notNull()->comment('内容'),
            'image' => $this->string()->defaultValue('')->notNull()->comment('图片'),
            'views' => $this->bigInteger()->defaultValue(0)->notNull()->comment('浏览量'),

            'created_by' => $this->string()->defaultValue('')->notNull()->comment('创建人'),
            'created_at' => $this->integer()->defaultValue(0)->notNull()->comment('创建时间'),
            'deleted_at' => $this->integer()->defaultValue(0)->notNull()->comment('删除时间'),
        ], $tableOptions);

        $this->addCommentOnTable('{{%notices}}','猫咪知识表 ');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%knowledges}}');
    }
}
