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
    'ACP_D120DE_BANNER_SEARCHBOX_LEGEND'  => 'Suchbox verhalten',
    'ACP_D120DE_BANNER_HIDE_SEARCHBOX_DEFAULT' => 'Verberge Suchbox bei Standard Banner',
    'ACP_D120DE_BANNER_HIDE_SEARCHBOX' => 'Verberge Suchbox bei Veranstaltungsbanner',
    'ACP_D120DE_BANNER_DEFAULT_LEGEND' => 'Standard Banner',
    'ACP_D120DE_BANNER_DEFAULT_LINK' => 'Link des Standard Banner',
    'ACP_D120DE_BANNER_DEFAULT_LINK_EXPLAIN' => 'Leer lassen für keine Verlinkung',
    'ACP_D120DE_BANNER_DEFAULT_ALT_TEXT' => 'Alternativ Text des Standard Banners',
    'ACP_D120DE_BANNER_DEFAULT_ALT_TEXT_EXPLAIN' => 'Wird nicht in der mobilen Darstellung angezeigt',
    'ACP_D120DE_BANNER_DEFAULT_PICTURE' => 'Bild des Standard Banners',
    'ACP_D120DE_BANNER_DEFAULT_PICTURE_EXPLAIN' => 'Ohne Bild wird kein Standard Banner angezeigt',
    'ACP_D120DE_BANNER_TITLE' => 'Banner',
    'ACP_D120DE_SETTINGS_DEFAULT' => 'Standard Einstellungen',
	'ACP_D120DE_BANNER_SETTING_SAVED'	=> 'Die Einstellungen wurden erfolgreich gespeichert!',
));
