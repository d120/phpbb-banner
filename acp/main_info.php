<?php
/**
*
* @package d120.de Extensions - Banner Extension
* @copyright (c) 2013 phpBB Group
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace d120de\banner\acp;

class main_info
{
	function module()
	{
		return array(
			'filename'	=> '\d120de\banner\acp\main_module',
			'title'		=> 'ACP_D120DE_BANNER_TITLE',
			'version'	=> '1.0.0',
			'modes'		=> array(
				'settings'	=> array('title' => 'ACP_D120DE_BANNER_SETTINGS_DEFAULT', 'auth' => 'acl_a_board', 'cat' => array('ACP_D120DE_BANNER_TITLE')),
			),
		);
	}
}
