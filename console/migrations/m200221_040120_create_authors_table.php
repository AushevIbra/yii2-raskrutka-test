<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%authors}}`.
 */
class m200221_040120_create_authors_table extends Migration
{
	const TABLE_NAME = 'authors';

	/**
	 * {@inheritdoc}
	 */
	public function safeUp()
	{
		$tableOptions = null;
		if ($this->db->driverName === 'mysql') {
			// http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
			$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
		}

		$this->createTable(static::TABLE_NAME, [
			'id'       => $this->primaryKey(),
			'name'     => $this->string()->notNull(),
			'birthday' => $this->date(),
			'rating'   => $this->integer()
		], $tableOptions);
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown()
	{
		$this->dropTable(static::TABLE_NAME);
	}
}
