<?php
/**
*
* @package phpBB Extension - Acme Demo
* @copyright (c) 2013 phpBB Group
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace d120de\banner\event;

/**
* @ignore
*/
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
* Event listener
*/
class main_listener implements EventSubscriberInterface
{
	static public function getSubscribedEvents()
	{
		return array(
			'core.page_header_after'						=> 'add_page_header_link', // Richtiges Signal suchen
		);
	}

	/* @var \phpbb\config\config */
	protected $config;

	/* @var \phpbb\controller\helper */
	protected $helper;

	/* @var \phpbb\template\template */
	protected $template;

	/**
	* Constructor
	*
	* @param \phpbb\controller\helper	$helper		Controller helper object
	* @param \phpbb\template			$template	Template object
	*/
	public function __construct(\phpbb\config\config $config, \phpbb\controller\helper $helper, \phpbb\template\template $template)
	{
        $this->config = $config;
		$this->helper = $helper;
		$this->template = $template;
	}

	public function add_page_header_link($event)
	{
        global $phpbb_root_path;

        $picture_prefix = $phpbb_root_path.'store/d120de/banner/';

        $this->template->assign_vars(array(
        'D120DE_BANNER_LINK' => $this->config['d120de_banner_link_default'],
        'D120DE_BANNER_PICTURE' => $this->config['d120de_banner_picture'],
        'D120DE_BANNER_ALT_TEXT' => $this->config['d120de_banner_alt_text_default'],
        'D120DE_BANNER_HIDESEARCHBOX' => $this->config['d120de_banner_hidesearchbox_default'],
        ));
        $this->template->assign_vars(array (
        'D120DE_BANNER_PICTURE_PREFIX' => $picture_prefix,
        'D120DE_BANNER_WIDTH' => $this->config['d120de_banner_width'],
        'D120DE_BANNER_HEIGHT' => $this->config['d120de_banner_height'],
        'D120DE_BANNER_ENABLED' => $this->config['d120de_banner_enabled'],
        ));
	}
    
}
