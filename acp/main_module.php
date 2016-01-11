<?php
/**
*
* @package phpBB Extension - Acme Demo
* @copyright (c) 2013 phpBB Group
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace d120de\banner\acp;

class main_module
{
    var $u_action;

    function main($id, $mode)
    {
        global $db, $user, $auth, $template, $cache, $request;
        global $config, $phpbb_root_path, $phpbb_admin_path, $phpEx;

        $user->add_lang('acp/common');
        $this->tpl_name = 'banner_settings';
        $this->page_title = $user->lang('ACP_D120DE_BANNER_SETTINGS_DEFAULT');
        add_form_key('d120de/banner');

        $pool_path = 'store/d120de/banner/default/';
        $pooldir = @opendir($phpbb_root_path . $pool_path);
        if (!$pooldir)
        {
            trigger_error($user->lang['POOL_PATH_ERROR'] . ': ' . $pool_path, E_USER_ERROR);
        }

        // get banner filenames
        while (($banner_file = readdir($pooldir)) !== false)
        {
            if (is_file($phpbb_root_path . $pool_path . $banner_file) && 
                $banner_file != 'index.htm') // TODO check for image size (height == 60px and width <= 468px)
            {
                $template->assign_block_vars('d120de_banner_list', array(
                    'NAME' => $banner_file,
                    'PATH' => $phpbb_root_path . $pool_path . $banner_file));
            }
        }
        @closedir($pooldir);

        if ($request->is_set_post('submit'))
        {
            if (!check_form_key('d120de/banner'))
            {
                trigger_error('FORM_INVALID');
            }

            $filename = $request->variable('d120de_banner_picture_default', '');
            $filepath = $phpbb_root_path . $pool_path . $filename;

            if (is_file($filepath))
            {
                $image_dimension = getimagesize($filepath);
                $config->set('d120de_banner_width', $image_dimension[0]);
                $config->set('d120de_banner_height', $image_dimension[1]);
            }
            elseif($filename != ''  )
            {
                trigger_error('The selected Image dose not exist!', E_USER_WARNING);
            }

            $config->set('d120de_banner_link_default', $request->variable('d120de_banner_link_default', ''));
            $config->set('d120de_banner_picture_default', $request->variable('d120de_banner_picture_default', ''));
            $config->set('d120de_banner_alt_text_default', $request->variable('d120de_banner_alt_text_default', ''));
            $config->set('d120de_banner_hidesearchbox', $request->Is_set('d120de_banner_hidesearchbox'));
            $config->set('d120de_banner_hidesearchbox_default', $request->Is_set('d120de_banner_hidesearchbox_default'));

            trigger_error($user->lang('ACP_D120DE_BANNER_SETTING_SAVED') . adm_back_link($this->u_action));
        }

        $template->assign_vars(array(
            'U_ACTION'                    => $this->u_action,
            'D120DE_BANNER_LINK_DEFAULT' => $config['d120de_banner_link_default'],
            'D120DE_BANNER_PICTURE_DEFAULT' => $config['d120de_banner_picture_default'],
            'D120DE_BANNER_ALT_TEXT_DEFAULT' => $config['d120de_banner_alt_text_default'],
            'D120DE_BANNER_HIDESEARCHBOX' => $config['d120de_banner_hidesearchbox'],
            'D120DE_BANNER_HIDESEARCHBOX_DEFAULT' => $config['d120de_banner_hidesearchbox_default'],
        ));
    }
}

