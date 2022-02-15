<?php

namespace mamadali\favorites;


use mamadali\favorites\models\Favorites;
use Yii;
use yii\base\Component;
use yii\helpers\ArrayHelper;


class Favorite extends Component
{

    private ?int $_user_id = null;

    public function init()
    {
        parent::init();

        $this->_user_id = Yii::$app->user->id ?? null;
    }

    public function add($modelClass, $model_id): bool
    {
        $flag = true;
        if ($this->_user_id) {
            $model = new Favorites();
            $model->user_id = $this->_user_id;
            $model->model_class = $modelClass;
            $model->model_id = $model_id;
            $flag = $model->save();
        }
        return $flag;
    }

    public function remove($modelClass, $model_id): bool
    {
        $flag = true;
        if ($this->_user_id) {
            $model = Favorites::find()
                ->byUserId($this->_user_id)
                ->byModel($modelClass, $model_id)
                ->limit(1)->one();
            if ($model) {
                $model->delete();
            }
        }
        return $flag;
    }

    public function has($modelClass, $model_id): bool
    {
        $flag = false;
        if ($this->_user_id) {
            $model = Favorites::find()
                ->byUserId($this->_user_id)
                ->byModel($modelClass, $model_id)
                ->limit(1)->one();
            if ($model) {
                $flag = true;
            }
        }
        return $flag;
    }

    public function getAll($modelClass): array
    {
        $models = [];
        if ($this->_user_id) {
            $models = Favorites::find()
                ->byUserId($this->_user_id)
                ->byModelClass($modelClass)
                ->all();
        }
        return $models;
    }

    public function getCount($modelClass): int
    {
        $count = 0;
        if ($this->_user_id) {
            $count = Favorites::find()
                ->byUserId($this->_user_id)
                ->byModelClass($modelClass)
                ->count();
        }
        return $count;
    }

}