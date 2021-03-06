<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "advert".
 *
 * @property integer $idadvert
 * @property integer $price
 * @property string $adress
 * @property integer $fk_agent_detail
 * @property integer $bedroom
 * @property integer $livingroom
 * @property integer $parking
 * @property integer $kitchen
 * @property string $general_image
 * @property string $description
 * @property string $location
 * @property integer $hot
 * @property integer $sold
 * @property string $type
 * @property integer $recommend
 * @property integer $created_at
 * @property integer $updated_at
 */
class Advert extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'advert';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['price', 'fk_agent_detail', 'bedroom', 'livingroom', 'parking', 'kitchen', 'hot', 'sold', 'recommend', 'created_at', 'updated_at'], 'integer'],
            [['description'], 'string'],
            [['created_at', 'updated_at'], 'required'],
            [['adress'], 'string', 'max' => 255],
            [['general_image'], 'string', 'max' => 200],
            [['location'], 'string', 'max' => 30],
            [['type'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idadvert' => 'Idadvert',
            'price' => 'Price',
            'adress' => 'Adress',
            'fk_agent_detail' => 'Fk Agent Detail',
            'bedroom' => 'Bedroom',
            'livingroom' => 'Livingroom',
            'parking' => 'Parking',
            'kitchen' => 'Kitchen',
            'general_image' => 'General Image',
            'description' => 'Description',
            'location' => 'Location',
            'hot' => 'Hot',
            'sold' => 'Sold',
            'type' => 'Type',
            'recommend' => 'Recommend',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function afterValidate()
    {
        $this->fk_agent = Yii::$app->user->identity->id;
    }

    public function afterSave($insert, $changedAttributes)
    {
        Yii::$app->locator->cache->set('id', $this->id);
    }

    /**
     * @inheritdoc
     * @return AdvertQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AdvertQuery(get_called_class());
    }
}
