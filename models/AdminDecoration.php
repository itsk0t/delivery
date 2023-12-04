<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "admin_decoration".
 *
 * @property int $id
 * @property string $image
 * @property string $link
 */
class AdminDecoration extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'admin_decoration';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['image', 'link'], 'required'],
            [['image'], 'string', 'max' => 64],
            [['link'], 'string', 'max' => 256],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'image' => 'Image',
            'link' => 'Link',
        ];
    }
}
