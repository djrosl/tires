<?php

use yii\db\Migration;

/**
 * Handles the creation of table `testimonials`.
 */
class m171003_132345_create_testimonials_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('testimonials', [
            'id' => $this->primaryKey(),
            'image' => $this->string(),
            'name' => $this->string(),
            'text' => $this->text(),
            'order' => $this->integer(),
            'active' => $this->boolean(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('testimonials');
    }
}
