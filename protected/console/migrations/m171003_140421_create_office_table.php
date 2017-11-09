<?php

use yii\db\Migration;

/**
 * Handles the creation of table `office`.
 */
class m171003_140421_create_office_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('office', [
            'id' => $this->primaryKey(),
            'phone' => $this->string(),
            'email' => $this->string(),
            'address' => $this->string(),
            'image' => $this->string(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('office');
    }
}
