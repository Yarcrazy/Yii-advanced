<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%project}}`.
 */
class m190224_090642_create_project_table extends Migration
{
  /**
   * {@inheritdoc}
   */
  public function safeUp()
  {
    $this->createTable('{{%project}}', [
      'id' => $this->primaryKey(),
      'title' => $this->string()->notNull(),
      'description' => $this->text()->notNull(),
      'active' => $this->boolean()->notNull()->defaultValue('0'),
      'creator_id' => $this->integer()->notNull(),
      'updater_id' => $this->integer(),
      'created_at' => $this->integer()->notNull(),
      'updated_at' => $this->integer(),
    ]);
    $this->addForeignKey('fx_project_user_1', 'project', ['creator_id'], 'user', ['id']);
    $this->addForeignKey('fx_project_user_2', 'project', ['updater_id'], 'user', ['id']);
  }

  /**
   * {@inheritdoc}
   */
  public function safeDown()
  {
    $this->dropForeignKey('fx_project_user_1', 'project');
    $this->dropForeignKey('fx_project_user_2', 'project');
    $this->dropTable('{{%project}}');
  }
}
