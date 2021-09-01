<?php
/*
** Zabbix
** Copyright (C) 2001-2021 Zabbix SIA
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
** Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
**/


class CControllerRegExList extends CController {

	protected function init() {
		$this->disableSIDValidation();
	}

	protected function checkInput() {
		$fields = [
			'uncheck' => 'in 1'
		];

		return $this->validateInput($fields);
	}

	protected function checkPermissions() {
		return $this->checkAccess(CRoleHelper::UI_ADMINISTRATION_GENERAL);
	}

	protected function doAction() {
		$data['uncheck'] = $this->hasInput('uncheck');

		$db_regexs = API::Regexp()->get([
			'output' => ['regexpid', 'name'],
			'selectExpressions' => ['expression', 'expression_type'],
			'preservekeys' => true
		]);

		$data['regexs'] = $db_regexs;

		order_result($data['regexs'], 'name');

		$response = new CControllerResponseData($data);
		$response->setTitle(_('Configuration of regular expressions'));
		$this->setResponse($response);
	}
}
