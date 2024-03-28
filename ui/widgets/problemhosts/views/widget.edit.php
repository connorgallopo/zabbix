<?php declare(strict_types = 0);
/*
** Zabbix
** Copyright (C) 2001-2024 Zabbix SIA
**
** This program is free software; you can redistribute it and/or modify
** it under the terms of the GNU General Public License as published by
** the Free Software Foundation; either version 2 of the License, or
** (at your option) any later version.
**
** This program is distributed in the hope that it will be useful,
** but WITHOUT ANY WARRANTY; without even the implied warranty of
** MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
** GNU General Public License for more details.
**
** You should have received a copy of the GNU General Public License
** along with this program; if not, write to the Free Software
** Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.
**/


/**
 * Problem hosts widget form view.
 *
 * @var CView $this
 * @var array $data
 */

$groupids = array_key_exists('groupids', $data['fields'])
	? new CWidgetFieldMultiSelectGroupView($data['fields']['groupids'])
	: null;

(new CWidgetFormView($data))
	->addField($groupids)
	->addField(array_key_exists('exclude_groupids', $data['fields'])
		? new CWidgetFieldMultiSelectGroupView($data['fields']['exclude_groupids'])
		: null
	)
	->addField(array_key_exists('hostids', $data['fields'])
		? (new CWidgetFieldMultiSelectHostView($data['fields']['hostids']))
			->setFilterPreselect([
				'id' => $groupids->getId(),
				'accept' => CMultiSelect::FILTER_PRESELECT_ACCEPT_ID,
				'submit_as' => 'groupid'
			])
		: null
	)
	->addField(
		new CWidgetFieldTextBoxView($data['fields']['problem'])
	)
	->addField(
		new CWidgetFieldSeveritiesView($data['fields']['severities'])
	)
	->addField(
		new CWidgetFieldRadioButtonListView($data['fields']['evaltype'])
	)
	->addField(
		new CWidgetFieldTagsView($data['fields']['tags'])
	)
	->addField(
		new CWidgetFieldCheckBoxView($data['fields']['show_suppressed'])
	)
	->addField(array_key_exists('hide_empty_groups', $data['fields'])
		? new CWidgetFieldCheckBoxView($data['fields']['hide_empty_groups'])
		: null
	)
	->addField(
		new CWidgetFieldRadioButtonListView($data['fields']['ext_ack'])
	)
	->show();
