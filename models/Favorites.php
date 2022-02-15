<?php

namespace mamadali\favorites\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%favorites}}".
 *
 * @property int $id
 * @property int $user_id
 * @property string $model_class
 * @property int $model_id
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class Favorites extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%favorites}}';
    }

	public function behaviors()
	{
		return [
			[
				'class' => TimestampBehavior::class,
			],
			[
				'class' => BlameableBehavior::class,
			],
		];
	}

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'model_id', 'created_at', 'updated_at', 'status', 'created_by', 'updated_by'], 'integer'],
            [['model_class'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'model_class' => Yii::t('app', 'Model Class'),
            'model_id' => Yii::t('app', 'Model ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'status' => Yii::t('app', 'Status'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return FavoritesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FavoritesQuery(get_called_class());
    }

}
