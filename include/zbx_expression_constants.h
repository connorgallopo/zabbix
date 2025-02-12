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

#ifndef ZABBIX_ZBX_MACRO_CONSTANTS_H
#define ZABBIX_ZBX_MACRO_CONSTANTS_H

#define STR_UNKNOWN_VARIABLE		"*UNKNOWN*"

#define MVAR_ACTION			"{ACTION."			/* a prefix for all action macros */
#define MVAR_ACTION_ID			MVAR_ACTION "ID}"
#define MVAR_ACTION_NAME		MVAR_ACTION "NAME}"
#define MVAR_DATE			"{DATE}"
#define MVAR_EVENT			"{EVENT."			/* a prefix for all event macros */
#define MVAR_EVENT_ACK_HISTORY		MVAR_EVENT "ACK.HISTORY}"	/* deprecated */
#define MVAR_EVENT_ACK_STATUS		MVAR_EVENT "ACK.STATUS}"
#define MVAR_EVENT_AGE			MVAR_EVENT "AGE}"
#define MVAR_EVENT_DATE			MVAR_EVENT "DATE}"
#define MVAR_EVENT_DURATION		MVAR_EVENT "DURATION}"
#define MVAR_EVENT_ID			MVAR_EVENT "ID}"
#define MVAR_EVENT_NAME			MVAR_EVENT "NAME}"
#define MVAR_EVENT_STATUS		MVAR_EVENT "STATUS}"
#define MVAR_EVENT_TAGS			MVAR_EVENT "TAGS}"
#define MVAR_EVENT_TAGSJSON		MVAR_EVENT "TAGSJSON}"
#define MVAR_EVENT_TAGS_PREFIX		MVAR_EVENT "TAGS."
#define MVAR_EVENT_TIME			MVAR_EVENT "TIME}"
#define MVAR_EVENT_TIMESTAMP		MVAR_EVENT "TIMESTAMP}"
#define MVAR_EVENT_VALUE		MVAR_EVENT "VALUE}"
#define MVAR_EVENT_SEVERITY		MVAR_EVENT "SEVERITY}"
#define MVAR_EVENT_NSEVERITY		MVAR_EVENT "NSEVERITY}"
#define MVAR_EVENT_OBJECT		MVAR_EVENT "OBJECT}"
#define MVAR_EVENT_SOURCE		MVAR_EVENT "SOURCE}"
#define MVAR_EVENT_OPDATA		MVAR_EVENT "OPDATA}"
#define MVAR_EVENT_RECOVERY		MVAR_EVENT "RECOVERY."		/* a prefix for all recovery event macros */
#define MVAR_EVENT_RECOVERY_DATE	MVAR_EVENT_RECOVERY "DATE}"
#define MVAR_EVENT_RECOVERY_ID		MVAR_EVENT_RECOVERY "ID}"
#define MVAR_EVENT_RECOVERY_STATUS	MVAR_EVENT_RECOVERY "STATUS}"	/* deprecated */
#define MVAR_EVENT_RECOVERY_TAGS	MVAR_EVENT_RECOVERY "TAGS}"
#define MVAR_EVENT_RECOVERY_TAGSJSON	MVAR_EVENT_RECOVERY "TAGSJSON}"
#define MVAR_EVENT_RECOVERY_TIME	MVAR_EVENT_RECOVERY "TIME}"
#define MVAR_EVENT_RECOVERY_TIMESTAMP	MVAR_EVENT_RECOVERY "TIMESTAMP}"
#define MVAR_EVENT_RECOVERY_VALUE	MVAR_EVENT_RECOVERY "VALUE}"	/* deprecated */
#define MVAR_EVENT_RECOVERY_NAME	MVAR_EVENT_RECOVERY "NAME}"
#define MVAR_EVENT_UPDATE		MVAR_EVENT "UPDATE."
#define MVAR_EVENT_UPDATE_ACTION	MVAR_EVENT_UPDATE "ACTION}"
#define MVAR_EVENT_UPDATE_DATE		MVAR_EVENT_UPDATE "DATE}"
#define MVAR_EVENT_UPDATE_HISTORY	MVAR_EVENT_UPDATE "HISTORY}"
#define MVAR_EVENT_UPDATE_MESSAGE	MVAR_EVENT_UPDATE "MESSAGE}"
#define MVAR_EVENT_UPDATE_TIME		MVAR_EVENT_UPDATE "TIME}"
#define MVAR_EVENT_UPDATE_TIMESTAMP	MVAR_EVENT_UPDATE "TIMESTAMP}"
#define MVAR_EVENT_UPDATE_STATUS	MVAR_EVENT_UPDATE "STATUS}"
#define MVAR_EVENT_UPDATE_NSEVERITY	MVAR_EVENT_UPDATE "NSEVERITY}"
#define MVAR_EVENT_UPDATE_SEVERITY	MVAR_EVENT_UPDATE "SEVERITY}"
#define MVAR_EVENT_UPDATE_ACTIONJSON	MVAR_EVENT_UPDATE "ACTIONJSON}"
#define MVAR_EVENT_CAUSE		MVAR_EVENT "CAUSE."		/* a prefix for all event cause macros */
#define MVAR_EVENT_CAUSE_ACK_STATUS	MVAR_EVENT_CAUSE "ACK.STATUS}"
#define MVAR_EVENT_CAUSE_AGE		MVAR_EVENT_CAUSE "AGE}"
#define MVAR_EVENT_CAUSE_DATE		MVAR_EVENT_CAUSE "DATE}"
#define MVAR_EVENT_CAUSE_DURATION	MVAR_EVENT_CAUSE "DURATION}"
#define MVAR_EVENT_CAUSE_ID		MVAR_EVENT_CAUSE "ID}"
#define MVAR_EVENT_CAUSE_NAME		MVAR_EVENT_CAUSE "NAME}"
#define MVAR_EVENT_CAUSE_STATUS		MVAR_EVENT_CAUSE "STATUS}"
#define MVAR_EVENT_CAUSE_TAGS		MVAR_EVENT_CAUSE "TAGS}"
#define MVAR_EVENT_CAUSE_TAGSJSON	MVAR_EVENT_CAUSE "TAGSJSON}"
#define MVAR_EVENT_CAUSE_TAGS_PREFIX	MVAR_EVENT_CAUSE "TAGS."
#define MVAR_EVENT_CAUSE_TIME		MVAR_EVENT_CAUSE "TIME}"
#define MVAR_EVENT_CAUSE_TIMESTAMP	MVAR_EVENT_CAUSE "TIMESTAMP}"
#define MVAR_EVENT_CAUSE_VALUE		MVAR_EVENT_CAUSE "VALUE}"
#define MVAR_EVENT_CAUSE_SEVERITY	MVAR_EVENT_CAUSE "SEVERITY}"
#define MVAR_EVENT_CAUSE_NSEVERITY	MVAR_EVENT_CAUSE "NSEVERITY}"
#define MVAR_EVENT_CAUSE_OBJECT		MVAR_EVENT_CAUSE "OBJECT}"
#define MVAR_EVENT_CAUSE_SOURCE		MVAR_EVENT_CAUSE "SOURCE}"
#define MVAR_EVENT_CAUSE_OPDATA		MVAR_EVENT_CAUSE "OPDATA}"
#define MVAR_EVENT_CAUSE_UPDATE		MVAR_EVENT_CAUSE "UPDATE."
#define MVAR_EVENT_CAUSE_UPDATE_HISTORY	MVAR_EVENT_CAUSE_UPDATE "HISTORY}"
#define MVAR_EVENT_SYMPTOMS		MVAR_EVENT "SYMPTOMS}"

#define MVAR_ESC_HISTORY		"{ESC.HISTORY}"
#define MVAR_PROXY_NAME			"{PROXY.NAME}"
#define MVAR_PROXY_DESCRIPTION		"{PROXY.DESCRIPTION}"
#define MVAR_HOST_DNS			"{HOST.DNS}"
#define MVAR_HOST_CONN			"{HOST.CONN}"
#define MVAR_HOST_HOST			"{HOST.HOST}"
#define MVAR_HOST_ID			"{HOST.ID}"
#define MVAR_HOST_IP			"{HOST.IP}"
#define MVAR_IPADDRESS			"{IPADDRESS}"			/* deprecated */
#define MVAR_HOST_METADATA		"{HOST.METADATA}"
#define MVAR_HOST_NAME			"{HOST.NAME}"
#define MVAR_HOSTNAME			"{HOSTNAME}"			/* deprecated */
#define MVAR_HOST_DESCRIPTION		"{HOST.DESCRIPTION}"
#define MVAR_HOST_PORT			"{HOST.PORT}"
#define MVAR_HOST_TARGET_DNS		"{HOST.TARGET.DNS}"
#define MVAR_HOST_TARGET_CONN		"{HOST.TARGET.CONN}"
#define MVAR_HOST_TARGET_HOST		"{HOST.TARGET.HOST}"
#define MVAR_HOST_TARGET_IP		"{HOST.TARGET.IP}"
#define MVAR_HOST_TARGET_NAME		"{HOST.TARGET.NAME}"
#define MVAR_TIME			"{TIME}"
#define MVAR_TIMESTAMP			"{TIMESTAMP}"
#define MVAR_ITEM_LASTVALUE		"{ITEM.LASTVALUE}"
#define MVAR_ITEM_LASTVALUE_DATE	"{ITEM.LASTVALUE.DATE}"
#define MVAR_ITEM_LASTVALUE_TIME	"{ITEM.LASTVALUE.TIME}"
#define MVAR_ITEM_LASTVALUE_TIMESTAMP	"{ITEM.LASTVALUE.TIMESTAMP}"
#define MVAR_ITEM_LASTVALUE_AGE 	"{ITEM.LASTVALUE.AGE}"
#define MVAR_ITEM_VALUE			"{ITEM.VALUE}"
#define MVAR_ITEM_VALUE_DATE		"{ITEM.VALUE.DATE}"
#define MVAR_ITEM_VALUE_TIME		"{ITEM.VALUE.TIME}"
#define MVAR_ITEM_VALUE_TIMESTAMP	"{ITEM.VALUE.TIMESTAMP}"
#define MVAR_ITEM_VALUE_AGE		"{ITEM.VALUE.AGE}"
#define MVAR_ITEM_VALUETYPE		"{ITEM.VALUETYPE}"
#define MVAR_ITEM_ID			"{ITEM.ID}"
#define MVAR_ITEM_NAME			"{ITEM.NAME}"
#define MVAR_ITEM_NAME_ORIG		"{ITEM.NAME.ORIG}"
#define MVAR_ITEM_KEY			"{ITEM.KEY}"
#define MVAR_ITEM_KEY_ORIG		"{ITEM.KEY.ORIG}"
#define MVAR_ITEM_STATE			"{ITEM.STATE}"
#define MVAR_TRIGGER_KEY		"{TRIGGER.KEY}"			/* deprecated */
#define MVAR_ITEM_DESCRIPTION		"{ITEM.DESCRIPTION}"
#define MVAR_ITEM_DESCRIPTION_ORIG	"{ITEM.DESCRIPTION.ORIG}"
#define MVAR_ITEM_LOG			"{ITEM.LOG."
#define MVAR_ITEM_LOG_DATE		MVAR_ITEM_LOG "DATE}"
#define MVAR_ITEM_LOG_TIME		MVAR_ITEM_LOG "TIME}"
#define MVAR_ITEM_LOG_TIMESTAMP		MVAR_ITEM_LOG "TIMESTAMP}"
#define MVAR_ITEM_LOG_AGE		MVAR_ITEM_LOG "AGE}"
#define MVAR_ITEM_LOG_SOURCE		MVAR_ITEM_LOG "SOURCE}"
#define MVAR_ITEM_LOG_SEVERITY		MVAR_ITEM_LOG "SEVERITY}"
#define MVAR_ITEM_LOG_NSEVERITY		MVAR_ITEM_LOG "NSEVERITY}"
#define MVAR_ITEM_LOG_EVENTID		MVAR_ITEM_LOG "EVENTID}"
#define	MVAR_ITEM_STATE_ERROR		"{ITEM.STATE.ERROR}"

#define MVAR_SERVICE				"{SERVICE."
#define MVAR_SERVICE_NAME			MVAR_SERVICE "NAME}"
#define MVAR_SERVICE_DESCRIPTION		MVAR_SERVICE "DESCRIPTION}"
#define MVAR_SERVICE_ROOTCAUSE			MVAR_SERVICE "ROOTCAUSE}"
#define MVAR_SERVICE_TAGS			MVAR_SERVICE "TAGS}"
#define MVAR_SERVICE_TAGSJSON			MVAR_SERVICE "TAGSJSON}"
#define MVAR_SERVICE_TAGS_PREFIX		MVAR_SERVICE "TAGS."
#define MVAR_SERVICE_ID 			MVAR_SERVICE "ID}"

#define MVAR_TRIGGER_DESCRIPTION		"{TRIGGER.DESCRIPTION}"
#define MVAR_TRIGGER_COMMENT			"{TRIGGER.COMMENT}"		/* deprecated */
#define MVAR_TRIGGER_ID				"{TRIGGER.ID}"
#define MVAR_TRIGGER_NAME			"{TRIGGER.NAME}"
#define MVAR_TRIGGER_NAME_ORIG			"{TRIGGER.NAME.ORIG}"
#define MVAR_TRIGGER_EXPRESSION			"{TRIGGER.EXPRESSION}"
#define MVAR_TRIGGER_EXPRESSION_RECOVERY	"{TRIGGER.EXPRESSION.RECOVERY}"
#define MVAR_TRIGGER_SEVERITY			"{TRIGGER.SEVERITY}"
#define MVAR_TRIGGER_NSEVERITY			"{TRIGGER.NSEVERITY}"
#define MVAR_TRIGGER_STATUS			"{TRIGGER.STATUS}"
#define MVAR_TRIGGER_STATE			"{TRIGGER.STATE}"
#define MVAR_TRIGGER_TEMPLATE_NAME		"{TRIGGER.TEMPLATE.NAME}"
#define MVAR_TRIGGER_HOSTGROUP_NAME		"{TRIGGER.HOSTGROUP.NAME}"
#define MVAR_FUNCTION_VALUE			"{FUNCTION.VALUE}"
#define MVAR_FUNCTION_RECOVERY_VALUE		"{FUNCTION.RECOVERY.VALUE}"
#define MVAR_TRIGGER_EXPRESSION_EXPLAIN		"{TRIGGER.EXPRESSION.EXPLAIN}"
#define MVAR_TRIGGER_EXPRESSION_RECOVERY_EXPLAIN	"{TRIGGER.EXPRESSION.RECOVERY.EXPLAIN}"

#define MVAR_STATUS				"{STATUS}"			/* deprecated */
#define MVAR_TRIGGER_VALUE			"{TRIGGER.VALUE}"
#define MVAR_TRIGGER_URL			"{TRIGGER.URL}"
#define MVAR_TRIGGER_URL_NAME			"{TRIGGER.URL.NAME}"

#define MVAR_TRIGGER_EVENTS_ACK			"{TRIGGER.EVENTS.ACK}"
#define MVAR_TRIGGER_EVENTS_UNACK		"{TRIGGER.EVENTS.UNACK}"
#define MVAR_TRIGGER_EVENTS_PROBLEM_ACK		"{TRIGGER.EVENTS.PROBLEM.ACK}"
#define MVAR_TRIGGER_EVENTS_PROBLEM_UNACK	"{TRIGGER.EVENTS.PROBLEM.UNACK}"
#define	MVAR_TRIGGER_STATE_ERROR		"{TRIGGER.STATE.ERROR}"

#define MVAR_LLDRULE_DESCRIPTION		"{LLDRULE.DESCRIPTION}"
#define MVAR_LLDRULE_DESCRIPTION_ORIG		"{LLDRULE.DESCRIPTION.ORIG}"
#define MVAR_LLDRULE_ID				"{LLDRULE.ID}"
#define MVAR_LLDRULE_KEY			"{LLDRULE.KEY}"
#define MVAR_LLDRULE_KEY_ORIG			"{LLDRULE.KEY.ORIG}"
#define MVAR_LLDRULE_NAME			"{LLDRULE.NAME}"
#define MVAR_LLDRULE_NAME_ORIG			"{LLDRULE.NAME.ORIG}"
#define MVAR_LLDRULE_STATE			"{LLDRULE.STATE}"
#define MVAR_LLDRULE_STATE_ERROR		"{LLDRULE.STATE.ERROR}"

#define MVAR_INVENTORY				"{INVENTORY."			/* a prefix for all inventory macros */
#define MVAR_INVENTORY_TYPE			MVAR_INVENTORY "TYPE}"
#define MVAR_INVENTORY_TYPE_FULL		MVAR_INVENTORY "TYPE.FULL}"
#define MVAR_INVENTORY_NAME			MVAR_INVENTORY "NAME}"
#define MVAR_INVENTORY_ALIAS			MVAR_INVENTORY "ALIAS}"
#define MVAR_INVENTORY_OS			MVAR_INVENTORY "OS}"
#define MVAR_INVENTORY_OS_FULL			MVAR_INVENTORY "OS.FULL}"
#define MVAR_INVENTORY_OS_SHORT			MVAR_INVENTORY "OS.SHORT}"
#define MVAR_INVENTORY_SERIALNO_A		MVAR_INVENTORY "SERIALNO.A}"
#define MVAR_INVENTORY_SERIALNO_B		MVAR_INVENTORY "SERIALNO.B}"
#define MVAR_INVENTORY_TAG			MVAR_INVENTORY "TAG}"
#define MVAR_INVENTORY_ASSET_TAG		MVAR_INVENTORY "ASSET.TAG}"
#define MVAR_INVENTORY_MACADDRESS_A		MVAR_INVENTORY "MACADDRESS.A}"
#define MVAR_INVENTORY_MACADDRESS_B		MVAR_INVENTORY "MACADDRESS.B}"
#define MVAR_INVENTORY_HARDWARE			MVAR_INVENTORY "HARDWARE}"
#define MVAR_INVENTORY_HARDWARE_FULL		MVAR_INVENTORY "HARDWARE.FULL}"
#define MVAR_INVENTORY_SOFTWARE			MVAR_INVENTORY "SOFTWARE}"
#define MVAR_INVENTORY_SOFTWARE_FULL		MVAR_INVENTORY "SOFTWARE.FULL}"
#define MVAR_INVENTORY_SOFTWARE_APP_A		MVAR_INVENTORY "SOFTWARE.APP.A}"
#define MVAR_INVENTORY_SOFTWARE_APP_B		MVAR_INVENTORY "SOFTWARE.APP.B}"
#define MVAR_INVENTORY_SOFTWARE_APP_C		MVAR_INVENTORY "SOFTWARE.APP.C}"
#define MVAR_INVENTORY_SOFTWARE_APP_D		MVAR_INVENTORY "SOFTWARE.APP.D}"
#define MVAR_INVENTORY_SOFTWARE_APP_E		MVAR_INVENTORY "SOFTWARE.APP.E}"
#define MVAR_INVENTORY_CONTACT			MVAR_INVENTORY "CONTACT}"
#define MVAR_INVENTORY_LOCATION			MVAR_INVENTORY "LOCATION}"
#define MVAR_INVENTORY_LOCATION_LAT		MVAR_INVENTORY "LOCATION.LAT}"
#define MVAR_INVENTORY_LOCATION_LON		MVAR_INVENTORY "LOCATION.LON}"
#define MVAR_INVENTORY_NOTES			MVAR_INVENTORY "NOTES}"
#define MVAR_INVENTORY_CHASSIS			MVAR_INVENTORY "CHASSIS}"
#define MVAR_INVENTORY_MODEL			MVAR_INVENTORY "MODEL}"
#define MVAR_INVENTORY_HW_ARCH			MVAR_INVENTORY "HW.ARCH}"
#define MVAR_INVENTORY_VENDOR			MVAR_INVENTORY "VENDOR}"
#define MVAR_INVENTORY_CONTRACT_NUMBER		MVAR_INVENTORY "CONTRACT.NUMBER}"
#define MVAR_INVENTORY_INSTALLER_NAME		MVAR_INVENTORY "INSTALLER.NAME}"
#define MVAR_INVENTORY_DEPLOYMENT_STATUS	MVAR_INVENTORY "DEPLOYMENT.STATUS}"
#define MVAR_INVENTORY_URL_A			MVAR_INVENTORY "URL.A}"
#define MVAR_INVENTORY_URL_B			MVAR_INVENTORY "URL.B}"
#define MVAR_INVENTORY_URL_C			MVAR_INVENTORY "URL.C}"
#define MVAR_INVENTORY_HOST_NETWORKS		MVAR_INVENTORY "HOST.NETWORKS}"
#define MVAR_INVENTORY_HOST_NETMASK		MVAR_INVENTORY "HOST.NETMASK}"
#define MVAR_INVENTORY_HOST_ROUTER		MVAR_INVENTORY "HOST.ROUTER}"
#define MVAR_INVENTORY_OOB_IP			MVAR_INVENTORY "OOB.IP}"
#define MVAR_INVENTORY_OOB_NETMASK		MVAR_INVENTORY "OOB.NETMASK}"
#define MVAR_INVENTORY_OOB_ROUTER		MVAR_INVENTORY "OOB.ROUTER}"
#define MVAR_INVENTORY_HW_DATE_PURCHASE		MVAR_INVENTORY "HW.DATE.PURCHASE}"
#define MVAR_INVENTORY_HW_DATE_INSTALL		MVAR_INVENTORY "HW.DATE.INSTALL}"
#define MVAR_INVENTORY_HW_DATE_EXPIRY		MVAR_INVENTORY "HW.DATE.EXPIRY}"
#define MVAR_INVENTORY_HW_DATE_DECOMM		MVAR_INVENTORY "HW.DATE.DECOMM}"
#define MVAR_INVENTORY_SITE_ADDRESS_A		MVAR_INVENTORY "SITE.ADDRESS.A}"
#define MVAR_INVENTORY_SITE_ADDRESS_B		MVAR_INVENTORY "SITE.ADDRESS.B}"
#define MVAR_INVENTORY_SITE_ADDRESS_C		MVAR_INVENTORY "SITE.ADDRESS.C}"
#define MVAR_INVENTORY_SITE_CITY		MVAR_INVENTORY "SITE.CITY}"
#define MVAR_INVENTORY_SITE_STATE		MVAR_INVENTORY "SITE.STATE}"
#define MVAR_INVENTORY_SITE_COUNTRY		MVAR_INVENTORY "SITE.COUNTRY}"
#define MVAR_INVENTORY_SITE_ZIP			MVAR_INVENTORY "SITE.ZIP}"
#define MVAR_INVENTORY_SITE_RACK		MVAR_INVENTORY "SITE.RACK}"
#define MVAR_INVENTORY_SITE_NOTES		MVAR_INVENTORY "SITE.NOTES}"
#define MVAR_INVENTORY_POC_PRIMARY_NAME		MVAR_INVENTORY "POC.PRIMARY.NAME}"
#define MVAR_INVENTORY_POC_PRIMARY_EMAIL	MVAR_INVENTORY "POC.PRIMARY.EMAIL}"
#define MVAR_INVENTORY_POC_PRIMARY_PHONE_A	MVAR_INVENTORY "POC.PRIMARY.PHONE.A}"
#define MVAR_INVENTORY_POC_PRIMARY_PHONE_B	MVAR_INVENTORY "POC.PRIMARY.PHONE.B}"
#define MVAR_INVENTORY_POC_PRIMARY_CELL		MVAR_INVENTORY "POC.PRIMARY.CELL}"
#define MVAR_INVENTORY_POC_PRIMARY_SCREEN	MVAR_INVENTORY "POC.PRIMARY.SCREEN}"
#define MVAR_INVENTORY_POC_PRIMARY_NOTES	MVAR_INVENTORY "POC.PRIMARY.NOTES}"
#define MVAR_INVENTORY_POC_SECONDARY_NAME	MVAR_INVENTORY "POC.SECONDARY.NAME}"
#define MVAR_INVENTORY_POC_SECONDARY_EMAIL	MVAR_INVENTORY "POC.SECONDARY.EMAIL}"
#define MVAR_INVENTORY_POC_SECONDARY_PHONE_A	MVAR_INVENTORY "POC.SECONDARY.PHONE.A}"
#define MVAR_INVENTORY_POC_SECONDARY_PHONE_B	MVAR_INVENTORY "POC.SECONDARY.PHONE.B}"
#define MVAR_INVENTORY_POC_SECONDARY_CELL	MVAR_INVENTORY "POC.SECONDARY.CELL}"
#define MVAR_INVENTORY_POC_SECONDARY_SCREEN	MVAR_INVENTORY "POC.SECONDARY.SCREEN}"
#define MVAR_INVENTORY_POC_SECONDARY_NOTES	MVAR_INVENTORY "POC.SECONDARY.NOTES}"

/* PROFILE.* is deprecated, use INVENTORY.* instead */
#define MVAR_PROFILE			"{PROFILE."			/* prefix for profile macros */
#define MVAR_PROFILE_DEVICETYPE		MVAR_PROFILE "DEVICETYPE}"
#define MVAR_PROFILE_NAME		MVAR_PROFILE "NAME}"
#define MVAR_PROFILE_OS			MVAR_PROFILE "OS}"
#define MVAR_PROFILE_SERIALNO		MVAR_PROFILE "SERIALNO}"
#define MVAR_PROFILE_TAG		MVAR_PROFILE "TAG}"
#define MVAR_PROFILE_MACADDRESS		MVAR_PROFILE "MACADDRESS}"
#define MVAR_PROFILE_HARDWARE		MVAR_PROFILE "HARDWARE}"
#define MVAR_PROFILE_SOFTWARE		MVAR_PROFILE "SOFTWARE}"
#define MVAR_PROFILE_CONTACT		MVAR_PROFILE "CONTACT}"
#define MVAR_PROFILE_LOCATION		MVAR_PROFILE "LOCATION}"
#define MVAR_PROFILE_NOTES		MVAR_PROFILE "NOTES}"

#define MVAR_DISCOVERY_RULE_NAME	"{DISCOVERY.RULE.NAME}"
#define MVAR_DISCOVERY_SERVICE_NAME	"{DISCOVERY.SERVICE.NAME}"
#define MVAR_DISCOVERY_SERVICE_PORT	"{DISCOVERY.SERVICE.PORT}"
#define MVAR_DISCOVERY_SERVICE_STATUS	"{DISCOVERY.SERVICE.STATUS}"
#define MVAR_DISCOVERY_SERVICE_UPTIME	"{DISCOVERY.SERVICE.UPTIME}"
#define MVAR_DISCOVERY_DEVICE_IPADDRESS	"{DISCOVERY.DEVICE.IPADDRESS}"
#define MVAR_DISCOVERY_DEVICE_DNS	"{DISCOVERY.DEVICE.DNS}"
#define MVAR_DISCOVERY_DEVICE_STATUS	"{DISCOVERY.DEVICE.STATUS}"
#define MVAR_DISCOVERY_DEVICE_UPTIME	"{DISCOVERY.DEVICE.UPTIME}"

#define MVAR_ALERT_SENDTO		"{ALERT.SENDTO}"
#define MVAR_ALERT_SUBJECT		"{ALERT.SUBJECT}"
#define MVAR_ALERT_MESSAGE		"{ALERT.MESSAGE}"

#define MVAR_ACK_MESSAGE		"{ACK.MESSAGE}"			/* deprecated */
#define MVAR_ACK_TIME			"{ACK.TIME}"			/* deprecated */
#define MVAR_ACK_DATE			"{ACK.DATE}"			/* deprecated */
#define MVAR_USER_ALIAS			"{USER.ALIAS}"			/* deprecated */
#define MVAR_USER_USERNAME		"{USER.USERNAME}"
#define MVAR_USER_NAME			"{USER.NAME}"
#define MVAR_USER_SURNAME		"{USER.SURNAME}"
#define MVAR_USER_FULLNAME		"{USER.FULLNAME}"

#define MVAR_USER_MACRO			"{$"

#endif
