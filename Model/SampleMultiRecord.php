<?php
/**
 * [Model] SampleMultiRecord
 */
class SampleMultiRecord extends AppModel {

	public function __construct($id = false, $table = null, $ds = null) {
		parent::__construct($id, $table, $ds);

		$this->validate = [
			'title' => [
				[
					'rule' => ['notBlank'],
					'message' => '入力してください。',
				],
				[
					'rule' => ['maxLength', 255], 'message' => '255文字以内で入力してください。',
				],
			],
		];

	}

	/**
	 * 管理側用の人気記事ランキングを取得する
	 * @param int $blogCategoryId
	 * @return array
	 */
	public function getMultiRecord($blogCategoryId = NULL) {
		if (!$blogCategoryId) {
			return [];
		}

		$dataList = $this->find('all', [
			'conditions' => [
				'SampleMultiRecord.blog_category_id' => $blogCategoryId,
			],
			'order' => [
				'SampleMultiRecord.id' => 'ASC',
			],
		]);
		return $dataList;
	}

}
