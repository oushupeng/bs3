<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%orders}}`.
 */
class m200126_091901_create_orders_table extends Migration
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

        $this->createTable('{{%orders}}', [
            'id' => $this->primaryKey(),
            'order_id' =>$this->bigInteger()->defaultValue(0)->notNull()->comment('订单id'),
            'amount' => $this->integer()->defaultValue(0)->notNull()->comment('订单总价'),
            'consignee' => $this->string()->defaultValue('')->notNull()->comment('收货人'),
            'telephone' => $this->bigInteger()->defaultValue(0)->notNull()->comment('电话号码'),
            'address' => $this->string()->defaultValue('')->notNull()->comment('收货地址'),
            'payment' => $this->string()->defaultValue('')->notNull()->comment('付款方式，alipay：支付宝，wechat：微信'),
            'delivery' => $this->string()->defaultValue('')->notNull()->comment('送货方式，mail：邮寄，cash-on-delivery：货到付款'),
            'status' => $this->string()->defaultValue('')->notNull()->comment('订单状态，pay：代付款，send：代发货，receiving：待收货，evaluate：评价'),

            'express_id' => $this->bigInteger()->defaultValue(0)->notNull()->comment('快递id'),
            'courier_number' => $this->bigInteger()->defaultValue(0)->notNull()->comment('快递单号'),

            'user_id' => $this->integer()->defaultValue(0)->notNull()->comment('下单人id'),
            'user_name' => $this->string()->defaultValue('')->notNull()->comment('下单人姓名'),
            'created_time' => $this->integer()->defaultValue(0)->notNull()->comment('下单时间'),


            'created_by' => $this->string()->defaultValue('')->notNull()->comment('创建人'),
            'created_at' => $this->integer()->defaultValue(0)->notNull()->comment('创建时间'),
            'deleted_at' => $this->integer()->defaultValue(0)->notNull()->comment('删除时间'),
        ], $tableOptions);

        $this->addCommentOnTable('{{%orders}}','订单表');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%orders}}');
    }
}
