<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "shop_cart".
 *
 * @property int $id
 * @property int $pets_id 商品id
 * @property int $user_id 用户id
 * @property string $user_name 用户名称
 * @property string $pets_name 用户名称
 * @property int $pets_num 商品数量
 * @property int $pets_price 商品价格
 * @property int $sum 商品总价
 * @property string $created_by 创建人
 * @property int $created_at 创建时间
 * @property int $deleted_at 删除时间
 */
class ShopCart extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'shop_cart';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pets_id', 'user_id', 'pets_num', 'pets_price', 'sum','created_at', 'deleted_at'], 'integer'],
            [['user_name','pets_name','created_by'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pets_id' => '宠物id',
            'pets_name' => '宠物名称',
            'user_id' => '用户id',
            'user_name' => '用户名称',
            'pets_num' => '宠物数量',
            'pets_price' => '宠物价格',
            'sum' => '总钱',
            'created_by' => '创建人',
            'created_at' => '创建时间',
            'deleted_at' => '删除时间',
        ];
    }
}
