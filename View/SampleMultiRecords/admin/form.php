<?php
/**
 * [ADMIN] サンプルマルチレコード設定
 * @var \BcAppView $this
 */
?>
<?php echo $this->BcForm->create('SampleMultiRecord', [
	'url' => [
		'plugin' => 'sample_multi_record', 'controller' => 'sample_multi_records', 'action' => 'form', $blogCategory['BlogCategory']['id']
	],
]) ?>

<section class="bca-section">
	<table id="FormTable" class="form-table bca-form-table">
		<?php for ($i = 1; $i < 4; $i++): ?>
		<tr>
			<th class="col-head bca-form-table__label">
				No.<?php echo h($i) ?>
			</th>
			<td class="col-input bca-form-table__input">
				<?php echo $this->BcForm->input('SampleMultiRecord.'. $i .'.id', ['type' => 'hidden']) ?>
				<?php echo $this->BcForm->input('SampleMultiRecord.'. $i .'.blog_category_id', ['type' => 'hidden', 'value' => $blogCategory['BlogCategory']['id']]) ?>

				<?php echo $this->BcForm->input('SampleMultiRecord.'. $i .'.title', [
					'type' => 'text', 'size' => 80,
					'data-input-text-size' => 'full-counter',
					'placeholder' => 'サンプルテキスト',
				]) ?>

				<?php echo $this->BcForm->label('SampleMultiRecord.'. $i .'.status', '[表示指定]') ?>
				<?php echo $this->BcForm->input('SampleMultiRecord.'. $i .'.status', [
					'type' => 'radio', 'options' => [0 => '非公開', 1 => '公開'], 'default' => 0,
				]) ?>

				<?php echo $this->BcForm->error('SampleMultiRecord.'. $i .'.title') ?>
				<?php echo $this->BcForm->error('SampleMultiRecord.'. $i .'.status') ?>
			</td>
		</tr>
		<?php endfor ?>
	</table>
</section>

<!-- button -->
<section class="bca-actions">
	<?php echo $this->BcForm->button(__d('baser', '保存'),
		[
			'type' => 'submit',
			'id' => 'BtnSave',
			'div' => false,
			'class' => 'button bca-btn bca-actions__item',
			'data-bca-btn-type' => 'save',
			'data-bca-btn-size' => 'lg',
			'data-bca-btn-width' => 'lg',
	]) ?>
</div>

<?php echo $this->BcForm->end() ?>
