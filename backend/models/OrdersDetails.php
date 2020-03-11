<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "orders_details".
 *
 * @property int $id
 * @property int $order_id 订单id
 * @property int $pets_id 商品id
 * @property int $pets_price 商品价格
 * @property int $pets_num 商品数量
 * @property string $created_by 创建人
 * @property int $created_at 创建时间
 * @property int $deleted_at 删除时间
 */
class OrdersDetails extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orders_details';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_id', 'pets_id', 'pets_price', 'pets_num', 'created_at', 'deleted_at'], 'integer'],
            [['created_by'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => 'Order ID',
            'pets_id' => 'Pets ID',
            'pets_price' => 'Pets Price',
            'pets_num' => 'Pets Num',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'deleted_at' => 'Deleted At',
        ];
    }

    public function getOrder()
    {
        return $this->hasOne(Orders::className(),['order_id' => 'order_id']);
    }

    public function getName()
    {
        return $this->hasOne(Pets::className(),['id' => 'pets_id']);
    }
}
