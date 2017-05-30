<?php

namespace backend\modules\borrowreturn\models;

use Yii;

/**
 * This is the model class for table "material".
 *
 * @property integer $id
 * @property integer $title
 *
 * @property Bookingmaterial[] $bookingmaterials
 */
class Material extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'material';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'ชื่อสิ่งของ',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBookingmaterials()
    {
        return $this->hasMany(Bookingmaterial::className(), ['material_id' => 'id']);
    }
}
