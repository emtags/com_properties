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
 * Property Component HTML Helper
 *
 * @static
 * @package     Realeza
 * @subpackage  com_properties
 * @since       1.0
 */
class JHtmlIcon
{
	public static function create($property, $params)
	{
		JHtml::_('bootstrap.tooltip');

		$uri = JUri::getInstance();
		$url = JRoute::_(PropertiesHelperRoute::getFormRoute(0, base64_encode($uri)));
		$text = JHtml::_('image', 'system/new.png', JText::_('JNEW'), null, true);
		$button = JHtml::_('link', $url, $text);
		$output = '<span class="hasTooltip" title="' . JHtml::tooltipText('COM_PROPERTIES_FORM_CREATE_PROPERTY') . '">' . $button . '</span>';
		return $output;
	}

	public static function edit($property, $params, $attribs = array())
	{
		$uri = JUri::getInstance();

		if ($params && $params->get('popup'))
		{
			return;
		}

		if ($property->state < 0)
		{
			return;
		}

		JHtml::_('bootstrap.tooltip');

		$url	= PropertiesHelperRoute::getFormRoute($property->id, base64_encode($uri));
		$icon	= $property->state ? 'edit.png' : 'edit_unpublished.png';
		$text	= JHtml::_('image', 'system/'.$icon, JText::_('JGLOBAL_EDIT'), null, true);

		if ($property->state == 0)
		{
			$overlib = JText::_('JUNPUBLISHED');
		}
		else
		{
			$overlib = JText::_('JPUBLISHED');
		}

		$date = JHtml::_('date', $property->created);
		$author = $property->created_by_alias ? $property->created_by_alias : $property->author;

		$overlib .= '&lt;br /&gt;';
		$overlib .= $date;
		$overlib .= '&lt;br /&gt;';
		$overlib .= htmlspecialchars($author, ENT_COMPAT, 'UTF-8');

		$button = JHtml::_('link', JRoute::_($url), $text);

		$output = '<span class="hasTooltip" title="' . JHtml::tooltipText('COM_PROPERTIES_EDIT') . ' :: ' . $overlib . '">' . $button . '</span>';

		return $output;
	}
}
