<?php
/**
 * SampleMultiRecordsController
 */
class SampleMultiRecordsController extends AppController {

	public $uses = ['SampleMultiRecord.SampleMultiRecord'];

	public $components = ['BcAuth', 'Cookie', 'BcAuthConfigure'];

	/**
	 * [ADMIN] 設定一覧
	 * @param int $blogCategoryId
	 */
	public function admin_form($blogCategoryId = NULL) {
		if (!$blogCategoryId) {
			$this->BcMessage->setError('ブログカテゴリの指定がありません');
			$this->redirect(['admin' => true, 'plugin' => null, 'controller' => 'dashboard', 'action' => 'index']);
		}

		$BlogCategoryModel = ClassRegistry::init('Blog.BlogCategory');
		$blogCategory = $BlogCategoryModel->find('first', [
			'conditions' => [
				'BlogCategory.id' => $blogCategoryId,
			],
			'callbacks' => false,
			'recursive' => -1,
			'cache' => false,
		]);

		if (!$blogCategory) {
			$this->BcMessage->setError('無効なIDです。');
			$this->redirect(['admin' => true, 'plugin' => null, 'controller' => 'dashboard', 'action' => 'index']);
		}

		$this->pageTitle = 'サンプルマルチレコード設定';
		$this->crumbs = [
			[
				'name' => 'ブログカテゴリ一覧',
				'url' => [
					'admin' => true, 'plugin' => 'blog', 'controller' => 'blog_categories', 'action' => 'index', $blogCategory['BlogCategory']['blog_content_id']
				],
			],
		];

		if ($this->request->is('post')) {
			$result = $this->SampleMultiRecord->saveMany($this->request->data['SampleMultiRecord']);
			if ($result) {
				$this->BcMessage->setSuccess('保存しました。');
				$this->redirect(['action' => 'form', $blogCategoryId]);
			} else {
				$this->BcMessage->setError('保存に失敗しました。');
			}
		} else {
			$dataList = $this->SampleMultiRecord->getMultiRecord($blogCategoryId);
			if ($dataList) {
				$counter = 1;
				foreach ($dataList as $data) {
					$this->request->data['SampleMultiRecord'][$counter] = $data['SampleMultiRecord'];
					$counter++;
				}
			}
		}

		$this->set('blogCategory', $blogCategory);
		$this->render('form');
	}

}
