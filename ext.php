<?php
/**
*
* Extension Quickstart Package.
*
* @copyright (c) 2014 phpBB Limited <https://www.phpbb.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace d120de\banner;

/**
* This ext class is optional and can be omitted if left empty.
* However you can add special (un)installation commands in the
* methods enable_step(), disable_step() and purge_step(). As it is,
* these methods are defined in \phpbb\extension\base, which this
* class extends, but you can overwrite them to give special
* instructions for those cases.
*/
class ext extends \phpbb\extension\base
{

	/**
	* enable_step is executed on enabling an extension until it returns false.
	*
	* Calls to this function can be made in subsequent requests, when the
	* function is invoked through a webserver with a too low max_execution_time.
	*
	* @param	mixed	$old_state	The return value of the previous call
	*								of this method, or false on the first call
	* @return	mixed				Returns false after last step, otherwise
	*								temporary state which is passed as an
	*								argument to the next step
	*/
	public function enable_step($old_state)
    {
		switch ($old_state)
		{
			case '': // Empty means nothing has run yet
                $this->store_mkdir('d120de/banner/default/');
                $this->store_mkdir('d120de/banner/event/');
                return 'store_mkdir';
			break;
			default:
				// Run parent enable step method
				return parent::enable_step($old_state);
			break;
		}
    }
    
    private function store_mkdir($path)
    {
        global $phpbb_root_path;

        $phpbb_store_path = $phpbb_root_path.'store/';
        $full_path = $phpbb_store_path.$path;
        if(is_dir($full_path) === false)
        {
            mkdir($full_path, 0774, true);
        }
        $work_path = $phpbb_store_path;
        foreach(explode('/',$path) as $value)
        {
            $work_path .= $value.'/';
            touch($work_path.'index.htm');
        }
    }

    public function purge_step($old_state)
    {
		switch ($old_state)
		{
			case '': // Empty means nothing has run yet
                global $phpbb_root_path;
                $phpbb_store_path = $phpbb_root_path.'store/';

                $this->del_content_dir('d120de/banner/default/');
                $this->del_content_dir('d120de/banner/event/');
                $this->del_content_dir('d120de/banner/');
                
                unlink($phpbb_store_path.'d120de/index.htm');

                //this fails if there are other folders than banner 
                $del_res = rmdir($phpbb_store_path.'d120de/');
                if($del_res === false)
                {
                    //we faild create index.htm again
                    touch($phpbb_store_path.'d120de/index.htm');
                }
                return 'del_content_dir';
			break;
			default:
				// Run parent purge step method
				return parent::purge_step($old_state);
			break;
		}
    }
    /**
    * Delete the lowest dir in the path with its content like rm -rf
    */
    private function del_content_dir($path)
    {
        global $phpbb_root_path;

        $phpbb_store_path = $phpbb_root_path.'store/';
        $full_path = $phpbb_store_path.$path;
        array_map('unlink', glob($full_path.'*'));
        rmdir($full_path);
    }
}
