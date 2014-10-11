<?php
/**
 * @package     Realeza
 * @subpackage  com_properties
 *
 * @copyright   Copyright (C) 2014 Emtags, All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * Properties Component Category Tree
 *
 * @static
 * @package     Realeza
 * @subpackage  com_properties
 * @since       1.0
 */
class PropertiesCategories extends JCategories
{
	public function __construct($options = array())
	{
		$options['table'] = '#__properties';
		$options['extension'] = 'com_properties';
		parent::__construct($options);
	}
}
