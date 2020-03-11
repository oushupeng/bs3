<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "knowledges".
 *
 * @property int $id
 * @property int $knowledges_id 知识id
 * @property string $title 标题
 * @property string $content 内容
 * @property int $views 浏览量
 * @property string $created_by 创建人
 * @property int $created_at 创建时间
 * @property int $deleted_at 删除时间
 */
class Knowledges extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'knowledges';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['knowledges_id', 'views', 'created_at', 'deleted_at'], 'integer'],
            [['content'], 'string'],
            [['title', 'created_by'], 'string', 'max' => 255],
            [['title'], 'required', 'message' =>'标题不能为空'],
            [['content'], 'required', 'message' =>'内容不能为空'],
            [['image'], 'required', 'message' => '图片不能为空'],
            [['image'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'knowledges_id' => '资讯id',
            'title' => '标题',
            'content' => '内容',
            'image' => '图片',
            'views' => '浏览次数',
            'created_by' => '创建人',
            'created_at' => '创建时间',
            'deleted_at' => '删除时间',
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $file_path  = 'uploads/' . $this->image->baseName . '.' . $this->image->extension;
            $this->image->saveAs($file_path);
            return $file_path ;
        }

        return false;
    }


}
