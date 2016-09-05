<?php

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');
 
jimport('joomla.form.formfield');
 
class JFormFieldProperty extends JFormField {
 
	protected $type = 'Property';
 
	// getLabel() left out
 
	public function getInput() {
            
            //get id of vacancy
            //get all floor and suite plans based on the building
		
            return '{Property Placeholder}';
	}
}

