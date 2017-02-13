<?php

defined('_JEXEC') or die;


class ParkwayViewProperty extends JViewLegacy
{
    
    protected $form = null;
    
    public function display($tpl = null)
    {
        
        // Get the Data
        $this->form = $this->get('Form');
        $this->item = $this->get('Item');

        // Check for errors.
        if (count($errors = $this->get('Errors')))
        {
                JError::raiseError(500, implode('<br />', $errors));

                return false;
        }



        $db = JFactory::getDBO();
        $columns = $db->getTableColumns('#__parkway_properties');
        if(!isset($columns['venues'])){
            // run your query to add column
            $query='ALTER TABLE #__parkway_properties ADD `venues` TEXT';
            $db->setQuery($query);
            $result = $db->query();
        }





        $this->addToolbar();
        //JHtml::_('jquery.framework');

        return parent::display($tpl);
    }
    protected function addToolbar()
    {
            
            $input = JFactory::getApplication()->input;
 
		// Hide Joomla Administrator Main menu
		$input->set('hidemainmenu', true);
 
		$isNew = ($this->item->id == 0);
 
		if ($isNew)
		{
			$title = JText::_('COM_PARKWAY_MANAGER_PROPERTY_NEW');
		}
		else
		{
			$title = JText::_('COM_PARKWAY_MANAGER_PROPERTY_EDIT');
		}

            

// Get the toolbar object instance
            //$bar = JToolBar::getInstance('toolbar');

            JToolbarHelper::title(JText::_('Parkway: Property'), 'property');
            //JToolbarHelper::addNew('property.save');
            //JToolbarHelper::apply('property.apply');
            JToolbarHelper::save('property.save');
            JToolBarHelper::cancel('property.cancel',
			$isNew ? 'JTOOLBAR_CANCEL' : 'JTOOLBAR_CLOSE');
            //JToolbarHelper::addNew('new', 'NEW');
           


            
                    JToolbarHelper::preferences('com_parkway');

            

            JToolbarHelper::help('COM_PARKWAY_JHELP_VIEW_PROPERTY', true);

            JHtmlSidebar::setAction('index.php?option=com_parkway');





    }
	
}


