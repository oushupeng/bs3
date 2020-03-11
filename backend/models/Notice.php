<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "notice".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $created_at
 * @property string|null $deleted_at
 */
class Notice extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'notice';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['name', 'created_at', 'deleted_at'], 'string', 'max' => 255],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'created_at' => 'Created At',
            'deleted_at' => 'Deleted At',
        ];
    }
}
