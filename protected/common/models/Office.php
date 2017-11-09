<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "office".
 *
 * @property integer $id
 * @property string $phone
 * @property string $email
 * @property string $address
 * @property string $image
 */
class Office extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'office';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['phone', 'email', 'address', 'image'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'phone' => Yii::t('app', 'Phone'),
            'email' => Yii::t('app', 'Email'),
            'address' => Yii::t('app', 'Address'),
            'image' => Yii::t('app', 'Image'),
        ];
    }
}
