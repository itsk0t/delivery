<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property string $name
 * @property string $body
 * @property string $image
 * @property int $price
 * @property int $category_id
 * @property int $discount_id
 * @property int $stop
 *
 * @property Basket[] $baskets
 * @property Category $category
 * @property Discount $discount
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'body', 'image', 'price', 'category_id'], 'required'],
            [['body'], 'string'],
            [['price', 'category_id', 'discount_id', 'stop'], 'integer'],
            [['name'], 'string', 'max' => 128],
            [['image'], 'string', 'max' => 64],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['category_id' => 'id']],
            [['discount_id'], 'exist', 'skipOnError' => true, 'targetClass' => Discount::class, 'targetAttribute' => ['discount_id' => 'id']],
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
            'body' => 'Body',
            'image' => 'Image',
            'price' => 'Price',
            'category_id' => 'Category ID',
            'discount_id' => 'Discount ID',
            'stop' => 'Stop',
        ];
    }

    /**
     * Gets query for [[Baskets]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBaskets()
    {
        return $this->hasMany(Basket::class, ['product_id' => 'id']);
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    /**
     * Gets query for [[Discount]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDiscount()
    {
        return $this->hasOne(Discount::class, ['id' => 'discount_id']);
    }
}
