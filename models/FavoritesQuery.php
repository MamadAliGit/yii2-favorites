<?php

namespace mamadali\favorites\models;

/**
 * This is the ActiveQuery class for [[Favorites]].
 *
 * @see Favorites
 */
class FavoritesQuery extends \yii\db\ActiveQuery
{

	public function byCreatorId($id)
	{
		return $this->andWhere([Favorites::tableName().'.created_by' => $id]);
	}

	public function byUpdatedId($id)
	{
		return $this->andWhere([Favorites::tableName().'.updated_by' => $id]);
	}

	public function byId($id)
	{
		return $this->andWhere([Favorites::tableName().'.id' => $id]);
	}

    public function byUserId($id)
    {
        return $this->andWhere([Favorites::tableName().'.user_id' => $id]);
    }

    public function byModel($model_class, $model_id)
    {
        return $this->andWhere([Favorites::tableName().'.model_class' => $model_class])
            ->andWhere([Favorites::tableName().'.model_id' => $model_id]);
    }

    public function byModelClass($model_class)
    {
        return $this->andWhere([Favorites::tableName().'.model_class' => $model_class]);
    }
}
