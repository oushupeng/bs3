<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "notices".
 *
 * @property int $id
 * @property string $title 标题
 * @property string $content 内容
 * @property string $created_by 创建人
 * @property int $created_at 创建时间
 * @property int $deleted_at 删除时间
 */
class Notices extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'notices';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'deleted_at'], 'integer'],
            [['title', 'content', 'created_by'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => '标题',
            'content' => '内容',
            'created_by' => '创建人',
            'created_at' => '创建时间',
            'deleted_at' => '删除时间',
        ];
    }
}
