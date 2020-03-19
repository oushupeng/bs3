<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%shop_cart}}`.
 */
class m200126_163127_create_shop_cart_table extends Migration
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

        $this->createTable('{{%shop_cart}}', [
            'id' => $this->primaryKey(),
            'pets_id' => $this->integer()->defaultValue(0)->notNull()->comment('商品id'),
            'pets_category' => $this->string()->defaultValue('')->notNull()->comment('类别'),
            'user_id' => $this->integer()->defaultValue(0)->notNull()->comment('用户id'),
            'user_name' => $this->string()->defaultValue('')->notNull()->comment('用户名称'),
            'pets_num' => $this->integer()->defaultValue(0)->notNull()->comment('商品数量'),
            'pets_price' => $this->integer()->defaultValue(0)->notNull()->comment('商品价格'),
            'sum' => $this->integer()->defaultValue(0)->notNull()->comment('商品总价'),

            'created_by' => $this->string()->defaultValue('')->notNull()->comment('创建人'),
            'created_at' => $this->integer()->defaultValue(0)->notNull()->comment('创建时间'),
            'deleted_at' => $this->integer()->defaultValue(0)->notNull()->comment('删除时间'),
        ], $tableOptions);

        $this->addCommentOnTable('{{%shop_cart}}','购物车表');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%shop_cart}}');
    }
}
