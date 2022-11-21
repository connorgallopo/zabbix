/*
** Zabbix
** Copyright (C) 2001-2022 Zabbix SIA
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

#ifndef ZABBIX_ALERT_MANAGER_H
#define ZABBIX_ALERT_MANAGER_H

#include "zbxcommon.h"
#include "zbxthreads.h"

typedef struct
{
	zbx_get_program_type_f	zbx_get_program_type_cb_arg;
	zbx_get_config_forks_f	get_process_forks_cb_arg;
	zbx_get_config_str_f	get_scripts_path_cb_arg;
}
zbx_thread_alert_manager_args;

ZBX_THREAD_ENTRY(alert_manager_thread, args);

#endif
