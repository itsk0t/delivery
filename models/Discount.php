<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "discount".
 *
 * @property int $id
 * @property string $title
 * @property string $body
 * @property string $image
 * @property string $deadline
 * @property int $percent
 * @property int $stop
 *
 * @property Products[] $products
 */
class Discount extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'discount';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'body', 'image', 'deadline', 'percent'], 'required'],
            [['body'], 'string'],
            [['percent', 'stop'], 'integer'],
            [['title', 'image'], 'string', 'max' => 64],
            [['deadline'], 'string', 'max' => 32],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'body' => 'Body',
            'image' => 'Image',
            'deadline' => 'Deadline',
            'percent' => 'Percent',
            'stop' => 'Stop',
        ];
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Products::class, ['discount_id' => 'id']);
    }
}
