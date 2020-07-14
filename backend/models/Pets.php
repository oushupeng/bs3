<?php

namespace backend\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "pets".
 *
 * @property int $id
 * @property int $pets_id
 * @property string $name 名称
 * @property string $category 类别
 * @property int $price 价格
 * @property int $stock 价格
 * @property int $sales 销量数量
 * @property string $content 简介
 * @property string $picture 图片
 * @property string $created_by 创建人
 * @property int $created_at 创建时间
 * @property int $deleted_at 删除时间
 */
class Pets extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pets';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pets_id', 'price', 'sales', 'stock','created_at', 'deleted_at'], 'integer'],
            [['name', 'category',  'picture', 'created_by'], 'string', 'max' => 255],
            [['content'], 'string'],
            [['name'], 'required', 'message' => '宠物名称不能为空'],
            [['category'], 'required', 'message' => '宠物类别不能为空'],
            ['category', 'unique', 'message' => ' 已经添加了该类别的宠物,或者在回收站存在'],
            [['pets_id'], 'required', 'message' => '宠物编号不能为空'],
            ['pets_id', 'unique', 'message' => ' 已经有相同的宠物编号'],
            [['price'], 'required', 'message' => '宠物价格不能为空'],
            [['stock'], 'required', 'message' => '库存不能为空'],
            [['content'], 'required', 'message' => '简介不能为空'],
            [['imageFile'], 'required', 'message' => '图片不能为空'],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],

        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $file_path  = 'uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension;
            $this->imageFile->saveAs($file_path);
            return $file_path ;
        }

        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '宠物编号',
            'pets_id' => '宠物编号',
            'name' => '名称',
            'category' => '类别',
            'price' => '价格',
            'stock' => '库存',
            'sales' => '销量',
            'content' => '简介',
            'picture' => '图片',
            'imageFile' => 'imageFile',
            'created_by' => '创建人',
            'created_at' => '创建时间',
            'deleted_at' => '删除时间',
        ];
    }
}
