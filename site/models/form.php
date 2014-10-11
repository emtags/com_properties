<?php
/**
 * @package     Realeza
 * @subpackage  com_properties
 *
 * @copyright   Copyright (C) 2014 Emtags, All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

require_once JPATH_COMPONENT_ADMINISTRATOR.'/models/property.php';

/**
 * Properties model.
 *
 * @package     Realeza
 * @subpackage  com_properties
 * @since       1.0
 */
class PropertiesModelForm extends PropertiesModelProperty
{
	/**
	 * Model typeAlias string. Used for version history.
	 *
	 * @var        string
	 */
	public $typeAlias = 'com_properties.property';

	/**
	 * Get the return URL.
	 *
	 * @return  string	The return URL.
	 * @since   1.0
	 */
	public function getReturnPage()
	{
		return base64_encode($this->getState('return_page'));
	}

	/**
	 * Method to auto-populate the model state.
	 *
	 * Note. Calling getState in this method will result in recursion.
	 *
	 * @since   1.0
	 */
	protected function populateState()
	{
		$app = JFactory::getApplication();

		// Load state from the request.
		$pk = $app->input->getInt('w_id');
		$this->setState('property.id', $pk);
		// Add compatibility variable for default naming conventions.
		$this->setState('form.id', $pk);

		$categoryId	= $app->input->getInt('catid');
		$this->setState('property.catid', $categoryId);

		$return = $app->input->get('return', null, 'base64');

		if (!JUri::isInternal(base64_decode($return)))
		{
			$return = null;
		}

		$this->setState('return_page', base64_decode($return));

		// Load the parameters.
		$params	= $app->getParams();
		$this->setState('params', $params);

		$this->setState('layout', $app->input->getString('layout'));
	}
}
