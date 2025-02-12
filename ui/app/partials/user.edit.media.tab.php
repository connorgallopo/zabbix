<?php
/*
** Copyright (C) 2001-2025 Zabbix SIA
**
** This program is free software: you can redistribute it and/or modify it under the terms of
** the GNU Affero General Public License as published by the Free Software Foundation, version 3.
**
** This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
** without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
** See the GNU Affero General Public License for more details.
**
** You should have received a copy of the GNU Affero General Public License along with this program.
** If not, see <https://www.gnu.org/licenses/>.
**/


/**
 * @var CPartial $this
 * @var array $data
 */

$this->includeJsFile('user.edit.media.tab.js.php');

$form = $this->data['form'];

$media_form_list = new CFormList('userMediaFormList');

$media_table_info = (new CTable())
	->setId('media-table')
	->setAttribute('style', 'width: 100%;')
	->setHeader([_('Type'), _('Send to'), _('When active'), _('Use if severity'), _('Status'), _('Actions')])
	->addItem(
		(new CTag('tfoot', true))
			->addItem(
				(new CCol(
					(new CButtonLink(_('Add')))
						->addClass('js-add')
				))
			)
	);

$media_severity = [];

for ($severity = TRIGGER_SEVERITY_NOT_CLASSIFIED; $severity < TRIGGER_SEVERITY_COUNT; $severity++) {
	$severity_name = CSeverityHelper::getName($severity);
	$media_severity[$severity] = (new CSpan(mb_substr($severity_name, 0, 1)))
		->setHint($severity_name, '', false)
		->addClass(CSeverityHelper::getStatusStyle($severity));
}

$media_table_info_template = new CTemplateTag('media-row-tmpl',
	(new CRow([
		[
			new CSpan('#{mediatype_name}'),
			makeWarningIcon(_('Media type disabled by Administration.'))
		],
		(new CSpan('#{sendto_short}'))->setHint('#{sendto}'),
		(new CDiv('#{period}'))
			->setAttribute('style', 'max-width: ' . ZBX_TEXTAREA_STANDARD_WIDTH . 'px;')
			->addClass(ZBX_STYLE_OVERFLOW_ELLIPSIS),
		(new CDiv($media_severity))->addClass(ZBX_STYLE_STATUS_CONTAINER),
		[
			(new CButtonLink(_('Enabled')))
				->addClass(ZBX_STYLE_GREEN)
				->addClass('js-status')
				->setAttribute('data-status_type', 'disable_media'),
			(new CSpan(_('Disabled')))->addClass(ZBX_STYLE_RED)
		],
		(new CHorList([
			(new CButtonLink(_('Edit')))
				->addClass('js-edit'),
			(new CButtonLink(_('Remove')))
				->setEnabled(true)
				->addClass('js-remove'),
			(new CDiv([
				new CInput('hidden', 'medias[#{row_index}][mediaid]', '#{mediaid}'),
				new CInput('hidden', 'medias[#{row_index}][mediatypeid]', '#{mediatypeid}'),
				new CInput('hidden', 'medias[#{row_index}][period]', '#{period}'),
				new CInput('hidden', 'medias[#{row_index}][sendto]', '#{sendto}'),
				new CInput('hidden', 'medias[#{row_index}][severity]', '#{severity}'),
				new CInput('hidden', 'medias[#{row_index}][active]', '#{active}'),
				new CInput('hidden', 'medias[#{row_index}][provisioned]', '#{provisioned}'),
				new CInput('hidden', 'medias[#{row_index}][mediatype_name]', '#{mediatype_name}'),
			]))

		]))
	]))->setAttribute('data-row_index', '#{row_index}')
		->setId('medias_#{row_index}')
);

$media_form_list->addRow(_('Media'),
	(new CDiv($media_table_info))
		->addClass(ZBX_STYLE_TABLE_FORMS_SEPARATOR)
		->setAttribute('style', 'min-width: ' . ZBX_TEXTAREA_BIG_WIDTH . 'px;'),
);

(new CScriptTag('mediaView.init('.json_encode([
		'medias' => $data['medias']
	]).');'))
	->setOnDocumentReady()
	->show();

echo (new CDiv([$media_form_list, $media_table_info_template]));
