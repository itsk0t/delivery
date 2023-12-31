<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "datetable".
 *
 * @property int $id
 * @property string $name
 * @property string $working_hours
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
            [['name', 'working_hours'], 'required'],
            [['name', 'working_hours'], 'string', 'max' => 32],
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
            'working_hours' => 'Working Hours',
        ];
    }
}
