<?php
/**
 * @package     Realeza
 * @subpackage  com_properties
 *
 * @copyright   Copyright (C) 2014 Emtags, All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_PLATFORM') or die;

/**
 * Geo Hidden input form
 *
 * @package     Realeza
 * @subpackage  com_properties
 */
class JFormFieldGeoHidden extends JFormField
{
	/**
	 * The form field type.
	 *
	 * @var    string
	 * @since  11.1
	 */
	protected $type = 'GeoHidden';

	/**
	 * Method to get the field input markup.
	 *
	 * @return  string  The field input markup.
	 *
	 * @since   11.1
	 */
	protected function getInput()
	{
		$geodata      = $this->getGeoData();

		// Initialize some field attributes.
		$class = !empty($this->class) ? ' class="' . $this->class . '"' : '';
		$disabled = $this->disabled ? ' disabled' : '';

		// Initialize JavaScript field attributes.
		$onchange = $this->onchange ? ' onchange="' . $this->onchange . '"' : '';

		return '<input data-geo="' . $geodata . '" type="hidden" name="' . $this->name . '" id="' . $this->id . '" value="'
			. htmlspecialchars($this->value, ENT_COMPAT, 'UTF-8') . '"' . $class . $disabled . $onchange . ' />';
	}

	/**
	 * Method to get certain otherwise inaccessible properties from the form field object.
	 *
	 * @param   string  $name  The property name for which to the the value.
	 *
	 * @return  mixed  The property value or null.
	 *
	 * @since   3.2
	 */
	public function __get($name)
	{
		switch ($name)
		{
			case 'geo-data':
				return $this->getGeoData();
		}

		return parent::__get($name);
	}

	/**
	 * Method to get the field geo-data.
	 *
	 * @return  string  The geo-data.
	 */
	protected function getGeoData()
	{
		// Get the geodata text from the XML element
		$geodata = $this->element['geo-data'] ? (string) $this->element['geo-data'] : '';

		return $geodata;
	}

	/**
	 * Method to get the field label markup.
	 *
	 * @return  string  The field label markup.
	 *
	 * @since   11.1
	 */
	protected function getLabel()
	{
		return '';
	}
}
