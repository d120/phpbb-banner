<?php
/**
*
* @package phpBB Extension - Acme Demo
* @copyright (c) 2013 phpBB Group
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace d120de\banner\migrations;

class release_0_1_0 extends \phpbb\db\migration\migration
{
	public function effectively_installed()
	{
        $arr = array('d120de_banner_link',
                'd120de_banner_picture',
                'd120de_banner_link_default',
                'd120de_banner_picture_default',
                'd120de_banner_hidesearchbox',
                'd120de_banner_hidesearchbox_default',);
        foreach ($arr as &$value)
        {
            if (isset($this->config[$value]) === false)
            {
                return false;
            }
        }
        return true;
	}

	static public function depends_on()
	{
		return array('\phpbb\db\migration\data\v310\alpha2');
	}

	public function update_data()
	{
		return array(
			array('config.add', array('d120de_banner_link', '')),
            array('config.add', array('d120de_banner_picture', '')),
            array('config.add', array('d120de_banner_alt_text', '')),
            array('config.add', array('d120de_banner_link_default', '')),
            array('config.add', array('d120de_banner_picture_default', '')),
            array('config.add', array('d120de_banner_alt_text_default', '')),
            array('config.add', array('d120de_banner_hidesearchbox', 0)),
            array('config.add', array('d120de_banner_hidesearchbox_default', 0)),
            array('config.add', array('d120de_banner_enabled', 0)),
            array('config.add', array('d120de_banner_width', 0)),
            array('config.add', array('d120de_banner_height', 0)),

			array('module.add', array(
				'acp',
				'ACP_CAT_DOT_MODS',
				'ACP_D120DE_BANNER_TITLE'
			)),
			array('module.add', array(
				'acp',
				'ACP_D120DE_BANNER_TITLE',
				array(
					'module_basename'	=> '\d120de\banner\acp\main_module',
					'modes'				=> array('settings'),
				),
			)),
		);
	}
}
