<?php
/*
** Copyright (C) 2001-2024 Zabbix SIA
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


require_once dirname(__FILE__).'/../../include/CLegacyWebTest.php';
require_once dirname(__FILE__).'/../behaviors/CTableBehavior.php';
require_once dirname(__FILE__).'/../behaviors/CMessageBehavior.php';

use Facebook\WebDriver\WebDriverBy;

/**
 * @backup sysmaps
 */
class testFormSysmap extends CLegacyWebTest {

	/**
	 * Attach MessageBehavior and TableBehavior to the test.
	 *
	 * @return array
	 */
	public function getBehaviors() {
		return [
			CMessageBehavior::class,
			CTableBehavior::class
		];
	}

	public $mapName = 'Test map 1';
	public $edit_map_name = 'Local network';

	public static function allMaps() {
		return CDBHelper::getDataProvider('SELECT * FROM sysmaps');
	}

	public function testFormSysmap_Layout() {
		$this->zbxTestLogin('sysmaps.php?form=Create+map');
		$this->zbxTestCheckTitle('Configuration of network maps');
		$this->zbxTestCheckHeader('Network maps');

		$this->zbxTestAssertElementText("//div[@id='userid']//span[@class='subfilter-enabled']", 'Admin (Zabbix Administrator)');
		$this->zbxTestAssertElementValue('width', 800);
		$this->zbxTestAssertElementValue('height', 600);
		$this->zbxTestDropdownAssertSelected('backgroundid', 'No image');
		$this->zbxTestDropdownAssertSelected('iconmapid', '<manual>');

		$this->assertFalse($this->zbxTestCheckboxSelected('highlight'));
		$this->assertFalse($this->zbxTestCheckboxSelected('markelements'));
		$this->assertFalse($this->zbxTestCheckboxSelected('expandproblem'));
		$this->assertFalse($this->zbxTestCheckboxSelected('label_format'));

		$this->zbxTestDropdownAssertSelected('label_type', 'Label');
		$this->zbxTestDropdownHasOptions('label_type', ['Label', 'IP address', 'Element name', 'Status only', 'Nothing']);
		$this->zbxTestDropdownAssertSelected('label_location', 'Bottom');
		$this->zbxTestDropdownHasOptions('label_location', ['Bottom', 'Left', 'Right', 'Right', 'Top']);
		$this->zbxTestDropdownAssertSelected('show_unack', 'All');
		$this->zbxTestDropdownHasOptions('show_unack', ['All', 'Separated', 'Unacknowledged only']);

		$this->zbxTestAssertNotVisibleId('label_type_hostgroup');
		$this->zbxTestAssertNotVisibleId('label_type_host');
		$this->zbxTestAssertNotVisibleId('label_type_trigger');
		$this->zbxTestAssertNotVisibleId('label_type_map');
		$this->zbxTestAssertNotVisibleId('label_type_image');

		$this->zbxTestCheckboxSelect('label_format');
		$this->zbxTestAssertNotVisibleId('label_type');
		$this->zbxTestAssertVisibleId('label_type_hostgroup');
		$this->zbxTestAssertVisibleId('label_type_host');
		$this->zbxTestAssertVisibleId('label_type_trigger');
		$this->zbxTestAssertVisibleId('label_type_map');
		$this->zbxTestAssertVisibleId('label_type_image');

		$this->zbxTestDropdownAssertSelected('label_type_hostgroup', 'Element name');
		$this->zbxTestDropdownHasOptions('label_type_hostgroup', ['Label', 'Element name', 'Status only', 'Nothing', 'Custom label']);
		$this->zbxTestDropdownAssertSelected('label_type_host', 'Element name');
		$this->zbxTestDropdownAssertSelected('label_type_trigger', 'Element name');
		$this->zbxTestDropdownAssertSelected('label_type_map', 'Element name');
		$this->zbxTestDropdownAssertSelected('label_type_image', 'Element name');

		$this->zbxTestTextPresent(['Not classified', 'Information', 'Warning', 'Average', 'High', 'Disaster']);

		$this->zbxTestDropdownAssertSelected('urls[0][elementtype]', 'Host');
		$this->zbxTestDropdownHasOptions('urls[0][elementtype]', ['Host', 'Host group', 'Image', 'Map', 'Trigger']);

		$this->zbxTestAssertElementPresentId('urls_0_name');
		$this->zbxTestAssertElementPresentId('urls_0_url');

		$this->zbxTestAssertElementPresentId('add');
		$this->zbxTestAssertElementPresentId('cancel');
	}

	public static function create() {
		return [
			[
				[
					'expected' => TEST_GOOD,
					'name' => 'Test network map name',
					'dbCheck' => true,
					'formCheck' => true
				]
			],
			[
				[
					'expected' => TEST_GOOD,
					'name' => '!@#$%^&*()',
					'owner' => 'guest',
					'width' => 1,
					'height' => 1,
					'dbCheck' => true,
					'formCheck' => true
				]
			],
			[
				[
					'expected' => TEST_GOOD,
					'name' => '0',
					'owner' => 'guest',
					'columns' => 100,
					'rows' => 100,
					'url_name' => 'test url',
					'url' => 'http://zabbix.com',
					'dbCheck' => true,
					'formCheck' => true
				]
			],
			[
				[
					'expected' => TEST_GOOD,
					'name' => 'selects',
					'selects' => [
						['icon_label_type' => 'Status only',
						'icon_label_location' => 'Top',
						'problem_display' => 'Separated']
					],
					'dbCheck' => true,
					'formCheck' => true
				]
			],
			[
				[
					'expected' => TEST_BAD,
					'name' => 'Test map 1',
					'error_msg' => 'Cannot add network map',
					'errors' => [
						'Map "Test map 1" already exists.'
					]

				]
			],
			[
				[
					'expected' => TEST_BAD,
					'name' => '',
					'error_msg' => 'Page received incorrect data',
					'errors' => [
						'Incorrect value for field "Name": cannot be empty.'
					]
				]
			],
			[
				[
					'expected' => TEST_BAD,
					'name' => 'without owner',
					'remove_owner' => true,
					'error_msg' => 'Cannot add network map',
					'errors' => [
						'Map owner cannot be empty.'
					]
				]
			],
			[
				[
					'expected' => TEST_BAD,
					'name' => 'map value',
					'width' => 0,
					'height' => 1,
					'error_msg' => 'Cannot add network map',
					'errors' => [
						'Incorrect "width" value for map "map value".'
					]
				]
			],
			[
				[
					'expected' => TEST_BAD,
					'name' => 'map value',
					'width' => 1,
					'height' => 0,
					'error_msg' => 'Cannot add network map',
					'errors' => [
						'Incorrect "height" value for map "map value".'
					]
				]
			],
			[
				[
					'expected' => TEST_BAD,
					'name' => 'map urls',
					'width' => 1,
					'height' => 1,
					'url_name' => 'test url',
					'error_msg' => 'Cannot add network map',
					'errors' => [
						'URL should have both "name" and "url" fields for map "map urls".'
					]
				]
			],
			[
				[
					'expected' => TEST_BAD,
					'name' => 'map urls',
					'width' => 1,
					'height' => 1,
					'url' => 'http://zabbix.com',
					'error_msg' => 'Cannot add network map',
					'errors' => [
						'URL should have both "name" and "url" fields for map "map urls".'
					]
				]
			]
		];
	}

	public function maxlengthDataProvider() {
		return [
			[
				[
					'field' => 'name',
					'maxlength' => 128
				]
			]
		];
	}

	/**
	 * @dataProvider maxlengthDataProvider
	 */
	public function testFormFieldMaxLengthStripped($data) {
		$maxlength = $data['maxlength'];
		$test_value = str_repeat('0123456789', ceil($maxlength/10) + 10);

		$this->zbxTestLogin('sysmaps.php?form=Create+map');
		$this->zbxTestInputTypeWait($data['field'], $test_value);
		$this->zbxTestAssertElementValue($data['field'], substr($test_value, 0, $maxlength));
	}

	/**
	 * @dataProvider create
	 */
	public function testFormSysmapCreate($data) {
		$this->zbxTestLogin('sysmaps.php?form=Create+map');
		$this->zbxTestInputTypeWait('name', $data['name']);
		$this->zbxTestAssertElementValue('name', $data['name']);

		if (isset($data['width'])) {
			$this->zbxTestInputTypeOverwrite('width', $data['width']);
			$this->zbxTestAssertElementValue('width', $data['width']);
		}
		$width = $this->zbxTestGetValue("//input[@id='width']");

		if (isset($data['height'])) {
			$this->zbxTestInputTypeOverwrite('height', $data['height']);
			$this->zbxTestAssertElementValue('height', $data['height']);
		}
		$height = $this->zbxTestGetValue("//input[@id='height']");

		if (isset($data['url_name'])) {
			$this->zbxTestInputType('urls_0_name', $data['url_name']);
			$this->zbxTestAssertElementValue('urls_0_name', $data['url_name']);
		}

		if (isset($data['url'])) {
			$this->zbxTestInputType('urls_0_url', $data['url']);
			$this->zbxTestAssertElementValue('urls_0_url', $data['url']);
		}

		if (isset($data['selects'])) {
			foreach ($data['selects'] as $select) {
				$this->zbxTestDropdownSelect('label_type', $select['icon_label_type']);
				$this->zbxTestDropdownSelect('label_location', $select['icon_label_location']);
				$this->zbxTestDropdownSelect('show_unack', $select['problem_display']);
			}
		}

		if (isset($data['remove_owner'])) {
			$this->zbxTestClickXpathWait('//div[@id="userid"]//span['.CXPathHelper::fromClass('zi-remove-smaller').']');
		}

		if ($data['expected'] == TEST_GOOD) {
			$user_id = $this->zbxTestGetAttributeValue("//div[@id='userid']//li[@data-id]", 'data-id');
		}

		$this->zbxTestDoubleClickBeforeMessage('add', 'filter_name');

		switch ($data['expected']) {
			case TEST_GOOD:
				$this->zbxTestTextNotPresent('Page received incorrect data', 'Cannot add network map');
				$this->zbxTestWaitUntilMessageTextPresent('msg-good', 'Network map added');
				$this->assertEquals(1, CDBHelper::getCount("SELECT sysmapid FROM sysmaps WHERE name='".$data['name']."'"));
				break;

		case TEST_BAD:
				$this->zbxTestTextNotPresent('Network map added');
				$this->zbxTestWaitUntilMessageTextPresent('msg-bad', $data['error_msg']);
				foreach ($data['errors'] as $msg) {
					$this->zbxTestTextPresent($msg);
				}
				break;
		}

		if (isset($data['dbCheck'])) {
			$result = DBselect("SELECT name, width, height, userid FROM sysmaps where name = '".$data['name']."'");
			while ($row = DBfetch($result)) {
				$this->assertEquals($row['name'], $data['name']);
				$this->assertEquals($row['width'], $width);
				$this->assertEquals($row['height'], $height);
				$this->assertEquals($row['userid'], $user_id);
			}
		}

		if (isset($data['formCheck'])) {
			$this->zbxTestClickXpathWait("//a[text()='".$data['name']."']/../..//a[text()='Properties']");
			$this->zbxTestWaitUntilElementVisible(WebDriverBy::id('name'));
			$this->zbxTestAssertElementValue('name', $data['name']);
			$this->zbxTestAssertElementValue('width', $width);
			$this->zbxTestAssertElementValue('height', $height);
			$this->zbxTestAssertAttribute("//div[@id='userid']//li[@data-id]", 'data-id', $user_id);

			if (isset($data['selects'])) {
				foreach ($data['selects'] as $select) {
					$this->zbxTestDropdownAssertSelected('label_type', $select['icon_label_type']);
					$this->zbxTestDropdownAssertSelected('label_location', $select['icon_label_location']);
					$this->zbxTestDropdownAssertSelected('show_unack', $select['problem_display']);
				}
			}
		}
	}

	public function testFormSysmap_CancelCreate() {
		$old_hash = CDBHelper::getHash('SELECT * FROM sysmaps ORDER BY sysmapid');
		$this->page->login()->open('sysmaps.php');
		$this->query('button:Create map')->one()->click();
		$this->page->waitUntilReady();

		// Check the title and header of Create map page.
		$this->assertTitleAndHeader('Network maps');

		$this->query('button:Cancel')->one()->click();
		$this->page->waitUntilReady();

		// Check that user is returned to maps page.
		$this->assertTitleAndHeader();

		$this->assertEquals($old_hash, CDBHelper::getHash('SELECT * FROM sysmaps ORDER BY sysmapid'));
	}

	/**
	* @dataProvider allMaps
	*/
	public function testFormSysmap_SimpleUpdateProperties($map) {
		$name = $map['name'];
		$sysmapid = $map['sysmapid'];

		$sqlMap = 'SELECT * FROM sysmaps WHERE name='.zbx_dbstr($name).' ORDER BY sysmapid';
		$oldHashMap = CDBHelper::getHash($sqlMap);
		$sqlElements = 'SELECT * FROM sysmaps_elements WHERE sysmapid='.zbx_dbstr($sysmapid).' ORDER BY selementid';
		$oldHashElements = CDBHelper::getHash($sqlElements);
		$sqlLinks = 'SELECT * FROM sysmaps_links WHERE sysmapid='.zbx_dbstr($sysmapid).' ORDER BY linkid';
		$oldHashLinks = CDBHelper::getHash($sqlLinks);
		$sqlLinkTriggers = 'SELECT * FROM sysmaps_link_triggers WHERE linkid'.
				' IN (SELECT linkid FROM sysmaps_links where sysmapid='.zbx_dbstr($sysmapid).') ORDER BY linktriggerid';
		$oldHashLinkTriggers = CDBHelper::getHash($sqlLinkTriggers);

		$this->page->login()->open('sysmaps.php')->waitUntilReady();
		$this->assertTitleAndHeader();
		$this->getTable()->findRow('Name', $name)->getColumn('Actions')->query('link:Properties')->one()->click();
		$this->assertTitleAndHeader('Network maps');
		$this->query('button:Update')->one()->click();
		$this->assertTitleAndHeader();
		$this->assertMessage(TEST_GOOD, 'Network map updated');
		$this->assertTrue($this->query('link', $name)->one()->isPresent());

		$hash_data = [
			$oldHashMap => $sqlMap,
			$oldHashElements => $sqlElements,
			$oldHashLinks => $sqlLinks,
			$oldHashLinkTriggers => $sqlLinkTriggers
		];

		foreach ($hash_data as $old => $new) {
			$this->assertEquals($old, CDBHelper::getHash($new));
		}
	}

	public function testFormSysmap_UpdateMapName() {
		$new_map_name = 'Map name changed';

		$this->zbxTestLogin('sysmaps.php');
		$this->zbxTestClickXpathWait("//a[text()='$this->edit_map_name']/../..//a[text()='Properties']");

		$this->zbxTestInputTypeOverwrite('name', $new_map_name);
		$this->zbxTestClickWait('update');

		$this->zbxTestWaitUntilMessageTextPresent('msg-good', 'Network map updated');
		$this->zbxTestTextPresent($new_map_name);
		$this->assertEquals(1, CDBHelper::getCount("SELECT sysmapid FROM sysmaps WHERE name='".$new_map_name."'"));
		$this->assertEquals(0, CDBHelper::getCount("SELECT sysmapid FROM sysmaps WHERE name='$this->edit_map_name'"));
	}

	public function testFormSysmap_CloneMap() {
		$mapName = 'Cloned map';

		$this->zbxTestLogin('sysmaps.php');
		$this->zbxTestClickXpathWait("//a[text()='$this->mapName']/../..//a[text()='Properties']");
		$this->zbxTestClickWait('clone');
		$this->zbxTestInputTypeOverwrite('name', $mapName);
		$this->zbxTestClickWait('add');
		$this->zbxTestCheckTitle('Configuration of network maps');
		$this->zbxTestWaitUntilMessageTextPresent('msg-good', 'Network map added');
		$this->assertEquals(1, CDBHelper::getCount("SELECT sysmapid FROM sysmaps WHERE name='".$mapName."'"));
		$this->zbxTestTextPresent($mapName);
		return $mapName;
	}

	/**
	 * @depends testFormSysmap_CloneMap
	 */
	public function testFormSysmap_DeleteClonedMap($mapName = 'Cloned map') {
		// Delete Map if it was created
		$this->zbxTestLogin('sysmaps.php');
		$this->zbxTestClickXpathWait("//a[text()='".$mapName."']/../..//a[text()='Properties']");
		$this->zbxTestClickWait('delete');
		$this->zbxTestAcceptAlert();
		$this->zbxTestWaitUntilMessageTextPresent('msg-good', 'Network map deleted');
		$this->assertEquals(0, CDBHelper::getCount("SELECT sysmapid FROM sysmaps WHERE name='".$mapName."'"));
	}

	/**
	 * Check title and header on the pages related to sysmap.
	 *
	 * @param string	$header		expected header of the page
	 * @param string	$title		expected title of the page
	 */
	protected function assertTitleAndHeader($header = 'Maps', $title = 'Configuration of network maps') {
		$this->page->assertTitle($title);
		$this->page->assertHeader($header);
	}
}
