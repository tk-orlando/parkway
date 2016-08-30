<?php

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');
 
jimport('joomla.form.formfield');
 
class JFormFieldSpace extends JFormField {
 
	protected $type = 'City';
 
	// getLabel() left out
 
	public function getInput() {
		return 'Space: <input name="filter[space][min]" type="text" maxlength="11" size="10" placeholder="min" style="width:60px;"></input> - <input name="filter[space][max]" type="text" maxlength="11" size="10" placeholder="max" style="width:60px;"></input>SQ FT';
	}
}

