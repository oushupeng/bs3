<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%pets}}`.
 */
class m200122_112143_create_pets_table extends Migration
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

        $this->createTable('{{%pets}}', [
            'id' => $this->primaryKey(),
            'pets_id' => $this->bigInteger()->defaultValue(0)->notNull()->comment('宠物编号'),
            'name' => $this->string()->defaultValue('')->notNull()->comment('名称'),
            'category' => $this->string()->defaultValue('')->notNull()->comment('类别'),
            'price' => $this->integer()->defaultValue(0)->notNull()->comment('价格'),
            'stock' => $this->integer()->defaultValue(0)->notNull()->comment('库存'),
            'sales' => $this->integer()->defaultValue(0)->notNull()->comment('销量数量'),
            'content' => $this->text()->notNull()->comment('简介'),
            'picture' => $this->string()->defaultValue('')->notNull()->comment('图片'),
            'imageFile' => $this->string()->defaultValue('')->notNull()->comment('图片2'),

            'created_by' => $this->string()->defaultValue('')->notNull()->comment('创建人'),
            'created_at' => $this->integer()->defaultValue(0)->notNull()->comment('创建时间'),
            'deleted_at' => $this->integer()->defaultValue(0)->notNull()->comment('删除时间'),

        ], $tableOptions);

        $this->addCommentOnTable('{{%pets}}','宠物猫表');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%pets}}');
    }
}
