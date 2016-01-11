<?php
/**
*
* @package D120.de - Banner Extension
* @copyright (c) 2015 Claudius Kleemann
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

$lang = array_merge($lang, array(
    'ACP_D120DE_BANNER_SEARCHBOX_LEGEND'  => 'Searchbox behavior',
    'ACP_D120DE_BANNER_HIDE_SEARCHBOX_DEFAULT' => 'Hide Searchbox on default Banner',
    'ACP_D120DE_BANNER_HIDE_SEARCHBOX' => 'Hide Searchbox on event Banner',
    'ACP_D120DE_BANNER_DEFAULT_LEGEND' => 'Default Banner',
    'ACP_D120DE_BANNER_DEFAULT_LINK' => 'Link of the default Banner',
    'ACP_D120DE_BANNER_DEFAULT_LINK_EXPLAIN' => 'leave it empty for no link',
    'ACP_D120DE_BANNER_DEFAULT_ALT_TEXT' => 'Alternativ Text of the default Banner',
    'ACP_D120DE_BANNER_DEFAULT_ALT_TEXT_EXPLAIN' => 'Will not be shown on mobile view',
    'ACP_D120DE_BANNER_DEFAULT_PICTURE' => 'Picture of the default Banner',
    'ACP_D120DE_BANNER_DEFAULT_PICTURE_EXPLAIN' => 'Without a picture no Banner is shown',
    'ACP_D120DE_BANNER_NO_PICTURE' => 'No Picture',
    'ACP_D120DE_BANNER_TITLE' => 'Banner',
    'ACP_D120DE_BANNER_SETTINGS_DEFAULT' => 'Default Settings',
	'ACP_D120DE_BANNER_SETTING_SAVED'	=> 'Settings have been saved successfully!',
    'ACP_D120DE_BANNER_DEFAULT_EXPLAIN' => 'Lore ipsum',
    'ACP_D120DE_BANNER_UPLOAD_DEFAULT_TITLE' => 'Upload a new default Banner',
    'ACP_D120DE_BANNER_UPLOAD_BANNER_FILE' => 'File from your local disk',
));
