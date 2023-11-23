<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "datetable".
 *
 * @property int $id
 * @property string $weekdays
 * @property string $weekend
 */
class Datetable extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'datetable';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['weekdays', 'weekend'], 'required'],
            [['weekdays', 'weekend'], 'string', 'max' => 32],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'weekdays' => 'Weekdays',
            'weekend' => 'Weekend',
        ];
    }
}
