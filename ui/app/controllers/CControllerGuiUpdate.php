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


class CControllerGuiUpdate extends CController {

	protected function checkInput() {
		$themes = array_keys(APP::getThemes());
		$timezones = array_keys(CTimezoneHelper::getList());

		$fields = [
			'default_lang' =>				'setting default_lang|in '.implode(',', array_keys(getLocales())),
			'default_timezone' =>			'required|in '.ZBX_DEFAULT_TIMEZONE.','.implode(',', $timezones).'|setting default_timezone',
			'default_theme' =>				'required|setting default_theme|in '.implode(',', $themes),
			'search_limit' =>				'required|setting search_limit|ge 1|le 999999',
			'max_overview_table_size' =>	'required|setting max_overview_table_size|ge 5|le 999999',
			'max_in_table' =>				'required|setting max_in_table|ge 1|le 99999',
			'server_check_interval' =>		'required|setting server_check_interval|in 0,'.SERVER_CHECK_INTERVAL,
			'work_period' =>				'required|setting work_period|time_periods',
			'show_technical_errors' =>		'setting show_technical_errors|in 0,1',
			'history_period' =>				'required|setting history_period|time_unit '.implode(':', [SEC_PER_DAY, 7 * SEC_PER_DAY]),
			'period_default' =>				'required|setting period_default|time_unit_year '.implode(':', [SEC_PER_MIN, 10 * SEC_PER_YEAR]),
			'max_period' =>					'required|setting max_period|time_unit_year '.implode(':', [SEC_PER_YEAR, 10 * SEC_PER_YEAR])
		];

		$ret = $this->validateInput($fields);

		if (!$ret) {
			switch ($this->GetValidationError()) {
				case self::VALIDATION_ERROR:
					$response = new CControllerResponseRedirect((new CUrl('zabbix.php'))
						->setArgument('action', 'gui.edit')
						->getUrl()
					);
					$response->setFormData($this->getInputAll());
					CMessageHelper::setErrorTitle(_('Cannot update configuration'));
					$this->setResponse($response);
					break;

				case self::VALIDATION_FATAL_ERROR:
					$this->setResponse(new CControllerResponseFatal());
					break;
			}
		}

		return $ret;
	}

	protected function checkPermissions() {
		return $this->checkAccess(CRoleHelper::UI_ADMINISTRATION_GENERAL);
	}

	protected function doAction() {
		$settings = [
			CSettingsHelper::DEFAULT_THEME => $this->getInput('default_theme'),
			CSettingsHelper::DEFAULT_TIMEZONE => $this->getInput('default_timezone'),
			CSettingsHelper::SEARCH_LIMIT => $this->getInput('search_limit'),
			CSettingsHelper::MAX_OVERVIEW_TABLE_SIZE => $this->getInput('max_overview_table_size'),
			CSettingsHelper::MAX_IN_TABLE => $this->getInput('max_in_table'),
			CSettingsHelper::SERVER_CHECK_INTERVAL => $this->getInput('server_check_interval'),
			CSettingsHelper::WORK_PERIOD => $this->getInput('work_period'),
			CSettingsHelper::SHOW_TECHNICAL_ERRORS => $this->getInput('show_technical_errors', 0),
			CSettingsHelper::HISTORY_PERIOD => $this->getInput('history_period'),
			CSettingsHelper::PERIOD_DEFAULT => $this->getInput('period_default'),
			CSettingsHelper::MAX_PERIOD => $this->getInput('max_period')
		];

		if ($this->hasInput('default_lang')) {
			$settings[CSettingsHelper::DEFAULT_LANG] = $this->getInput('default_lang');
		}

		$result = API::Settings()->update($settings);

		$response = new CControllerResponseRedirect((new CUrl('zabbix.php'))
			->setArgument('action', 'gui.edit')
			->getUrl()
		);

		if ($result) {
			CMessageHelper::setSuccessTitle(_('Configuration updated'));
		}
		else {
			$response->setFormData($this->getInputAll());
			CMessageHelper::setErrorTitle(_('Cannot update configuration'));
		}

		$this->setResponse($response);
	}
}
