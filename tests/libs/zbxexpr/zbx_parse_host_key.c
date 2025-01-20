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

#include "zbxmocktest.h"
#include "zbxmockutil.h"
#include "zbxmockassert.h"

#include "zbxexpr.h"

void	zbx_mock_test_entry(void **state)
{
	char	*exp = zbx_strdup(NULL, zbx_mock_get_parameter_string("in.exp"));
	int	exp_result = zbx_mock_str_to_return_code(zbx_mock_get_parameter_string("out.return"));

	ZBX_UNUSED(state);

	char	*host, *key;
	int 	result = zbx_parse_host_key(exp, &host, &key);

	zbx_mock_assert_int_eq("return value", exp_result, result);

	if(SUCCEED == result)
	{
		const char	*exp_host = zbx_mock_get_parameter_string("out.exp_host");
		const char	*exp_key = zbx_mock_get_parameter_string("out.exp_key");
		zbx_mock_assert_str_eq("return value", exp_host, host);
		zbx_mock_assert_str_eq("return value", exp_key, key);
		zbx_free(host);
		zbx_free(key);
	}

	zbx_free(exp);
}
