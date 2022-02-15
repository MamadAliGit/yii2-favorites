<?php

use yii\db\Migration;

class m220215_144912_create_table_favorites extends Migration
{
    public function safeUp()
    {
        $this->createTable(
            '{{%favorites}}',
            [
                'id' => $this->primaryKey(),
                'user_id' => $this->integer(),
                'model_class' => $this->string(),
                'model_id' => $this->integer(),
                'created_at' => $this->integer(),
                'updated_at' => $this->integer(),
                'created_by' => $this->integer(),
                'updated_by' => $this->integer(),
            ],
        );
    }

    public function safeDown()
    {
		$this->dropTable('{{%favorites}}');
    }
}
