<?php
class SampleMultiRecordsSchema extends CakeSchema {

	public $file = 'sample_multi_records.php';

	public function before($event = array()) {
		return true;
	}

	public function after($event = array()) {
		return true;
	}

	public $sample_multi_records = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 8, 'unsigned' => false, 'key' => 'primary', 'comment' => 'ID'),
		'blog_category_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 8, 'unsigned' => false, 'comment' => 'ブログカテゴリID'),
		'title' => array('type' => 'text', 'null' => true, 'default' => null, 'comment' => '表示テキスト'),
		'status' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 2, 'unsigned' => false, 'comment' => '0:非公開, 1:公開'),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null, 'comment' => '更新日時'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null, 'comment' => '作成日時'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
	);

}
