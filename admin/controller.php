<?php

/**
 * @version     0.0.1
 * @package     com_parkway
 * @copyright   Copyright (C) 2016. All rights reserved.
 * @license     Private; see LICENSE.txt
 * @author      Support <support@tkorlando.com> - http://tkorlando.com
 */
// No direct access
defined('_JEXEC') or die;

class parkwayController extends JControllerLegacy {

    
    public function display($cachable = false, $urlparams = false) {
        
        require_once JPATH_COMPONENT . '/helpers/parkway.php';

        $view = JFactory::getApplication()->input->getCmd('view', '');
        JFactory::getApplication()->input->set('view', $view);

        parent::display($cachable, $urlparams);

        return $this;
    }

}

