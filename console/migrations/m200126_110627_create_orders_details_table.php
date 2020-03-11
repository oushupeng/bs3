<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%orders_details}}`.
 */
class m200126_110627_create_orders_details_table extends Migration
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

        $this->createTable('{{%orders_details}}', [
            'id' => $this->primaryKey(),
            'order_id' => $this->bigInteger()->defaultValue(0)->notNull()->comment('订单id'),
            'pets_id' => $this->integer()->defaultValue(0)->notNull()->comment('商品id'),
            'pets_price' => $this->integer()->defaultValue(0)->notNull()->comment('商品价格'),
            'pets_num' => $this->integer()->defaultValue(0)->notNull()->comment('商品数量'),

            'created_by' => $this->string()->defaultValue('')->notNull()->comment('创建人'),
            'created_at' => $this->integer()->defaultValue(0)->notNull()->comment('创建时间'),
            'deleted_at' => $this->integer()->defaultValue(0)->notNull()->comment('删除时间'),
        ], $tableOptions);

        $this->addCommentOnTable('{{%orders_details}}','订单详情表');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%orders_details}}');
    }
}
