<?php

use yii\db\Migration;

/**
 * Handles the creation of table `slide`.
 */
class m171003_101220_create_slide_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('slide', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'image' => $this->string(),
            'order' => $this->integer(),
            'active' => $this->boolean(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('slide');
    }
}
