<?php
/**
 * [HelperEventListener] SampleMultiRecord
 * @license MIT
 */
class SampleMultiRecordHelperEventListener extends BcHelperEventListener {

	public $events = [
		'BcListTable.showHead',
		'BcListTable.showRow',
	];

	/**
	 * BcListTableShowHead
	 * @param CakeEvent $event
	 */
	public function bcListTableShowHead(CakeEvent $event) {
		$this->addTableHeadColumnBlogCategoryIndex($event);
	}

	private function addTableHeadColumnBlogCategoryIndex($event) {
		if (!BcUtil::isAdminSystem()) {
			return;
		}
		if (!BcUtil::isAdminUser()) {
			return;
		}

		$View = $event->subject();
		if ($View->request->params['plugin'] === 'blog') {
			if ($View->request->params['controller'] === 'blog_categories') {
				if ($View->request->params['action'] === 'admin_index') {

						if ($event->data['id'] === 'BlogCategories.AdminIndex') {
							$event->data['fields'][] = 'サンプルマルチレコード設定';
						}

				}
			}
		}
	}

	/**
	 * BcListTableShowRow
	 * @param CakeEvent $event
	 */
	public function bcListTableShowRow(CakeEvent $event) {
		if (!BcUtil::isAdminSystem()) {
			return;
		}
		if (!BcUtil::isAdminUser()) {
			return;
		}

		$View = $event->subject();
		if ($View->request->params['plugin'] === 'blog') {
			if ($View->request->params['controller'] === 'blog_categories') {
				if ($View->request->params['action'] === 'admin_index') {

					if ($event->data['id'] === 'BlogCategories.AdminIndex') {
						$event->data['fields'][] = $View->BcBaser->getLink('サンプルマルチレコード設定', [
								'admin' => true, 'plugin' => 'sample_multi_record',
								'controller' => 'sample_multi_records', 'action' => 'form', $event->data['data']['BlogCategory']['id']
							], ['title' => 'サンプルマルチレコード設定']
						);
					}

				}
			}
		}
	}

}
