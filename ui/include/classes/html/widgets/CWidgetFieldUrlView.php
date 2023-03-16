<?php declare(strict_types = 0);
/*
** Zabbix
** Copyright (C) 2001-2023 Zabbix SIA
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


use Zabbix\Widgets\Fields\CWidgetFieldUrl;

class CWidgetFieldUrlView extends CWidgetFieldView {

	private const MAX_LENGTH = 2048;

	public function __construct(CWidgetFieldUrl $field) {
		$this->field = $field;
	}

	public function getView(): CTextBox {
		return (new CTextBox($this->field->getName(), $this->field->getValue(), false, self::MAX_LENGTH))
			->setWidth(ZBX_TEXTAREA_STANDARD_WIDTH)
			->setAriaRequired($this->isRequired());
	}
}
