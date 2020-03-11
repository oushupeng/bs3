<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property int $id
 * @property int $order_id 订单id
 * @property int $amount 订单总价
 * @property string $consignee 收货人
 * @property int $telephone 电话号码
 * @property string $address 收货地址
 * @property string $payment 付款方式，alipay：支付宝，wechat：微信
 * @property string $delivery 送货方式，mail：邮寄，cash-on-delivery：货到付款
 * @property string $status 订单状态，pay：代付款，send：代发货，receiving：待收货，evaluate：评价
 * @property int $express_id 快递id
 * @property int $courier_number 快递单号
 * @property int $user_id 下单人id
 * @property string $user_name 下单人姓名
 * @property int $created_time 下单时间
 * @property string $created_by 创建人
 * @property int $created_at 创建时间
 * @property int $deleted_at 删除时间
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_id', 'amount', 'telephone', 'express_id', 'courier_number', 'user_id', 'created_time', 'created_at', 'deleted_at'], 'integer'],
            [['consignee', 'address', 'payment', 'delivery', 'status', 'user_name', 'created_by'], 'string', 'max' => 255],
            ['consignee','required','message'=>'收货人必须填'],
            ['telephone','required','message'=>'电话号码必须填'],
            ['address','required','message'=>'收货地址必须填'],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => '订单id',
            'amount' => '总价',
            'consignee' => '收货人',
            'telephone' => '电话号码',
            'address' => '收货地址',
            'payment' => '付款方式',
            'delivery' => '送货方式',
            'status' => '状态',
            'express_id' => '快递id',
            'courier_number' => '快递单号',
            'user_id' => '用户id',
            'user_name' => '用户名称',
            'created_time' => '创建时间',
            'created_by' => '创建人',
            'created_at' => '创建时间',
            'deleted_at' => '删除时间',
        ];
    }

    /**
     * 获取订单的详情
     * @return \yii\db\ActiveQuery
     */
    public function getOrderDetails()
    {
        return $this->hasOne(OrdersDetails::className(),['order_id' => 'order_id']);
    }

}
