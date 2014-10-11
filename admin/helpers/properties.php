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
 * Properties helper.
 *
 * @package     Emtags
 * @subpackage  com_properties
 * @since       1.0
 */
class PropertiesHelper extends JHelperContent
{
	/**
	 * Configure the Linkbar.
	 *
	 * @param   string  $vName  The name of the active view.
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	public static function addSubmenu($vName = 'properties')
	{
		JHtmlSidebar::addEntry(
			JText::_('COM_PROPERTIES_SUBMENU_PROPERTIES'),
			'index.php?option=com_properties&view=properties',
			$vName == 'properties'
		);

		JHtmlSidebar::addEntry(
			JText::_('COM_PROPERTIES_SUBMENU_CATEGORIES'),
			'index.php?option=com_categories&extension=com_properties',
			$vName == 'categories'
		);
	}
}
