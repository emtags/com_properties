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
 * View to edit a property.
 *
 * @package     Realeza
 * @subpackage  com_properties
 * @since       1.0
 */
class PropertiesViewProperty extends JViewLegacy
{
	protected $state;

	protected $item;

	protected $form;

	/**
	 * Display the view
	 */
	public function display($tpl = null)
	{
		$this->state	= $this->get('State');
		$this->item		= $this->get('Item');
		$this->form		= $this->get('Form');

		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode("\n", $errors));
			return false;
		}

		$this->addToolbar();
		parent::display($tpl);
	}

	/**
	 * Add the page title and toolbar.
	 *
	 * @since   1.0
	 */
	protected function addToolbar()
	{
		JFactory::getApplication()->input->set('hidemainmenu', true);

		$user		= JFactory::getUser();
		$isNew		= ($this->item->id == 0);
		$checkedOut	= !($this->item->checked_out == 0 || $this->item->checked_out == $user->get('id'));

		// Since we don't track these assets at the item level, use the category id.
		$canDo		= JHelperContent::getActions('com_properties', 'category', $this->item->catid);

		JToolbarHelper::title(JText::_('COM_PROPERTIES_MANAGER_PROPERTY'), 'link properties');

		// If not checked out, can save the item.
		if (!$checkedOut && ($canDo->get('core.edit')||(count($user->getAuthorisedCategories('com_properties', 'core.create')))))
		{
			JToolbarHelper::apply('property.apply');
			JToolbarHelper::save('property.save');
		}
		if (!$checkedOut && (count($user->getAuthorisedCategories('com_properties', 'core.create'))))
		{
			JToolbarHelper::save2new('property.save2new');
		}
		// If an existing item, can save to a copy.
		if (!$isNew && (count($user->getAuthorisedCategories('com_properties', 'core.create')) > 0))
		{
			JToolbarHelper::save2copy('property.save2copy');
		}
		if (empty($this->item->id))
		{
			JToolbarHelper::cancel('property.cancel');
		}
		else
		{
			if ($this->state->params->get('save_history', 0) && $user->authorise('core.edit'))
			{
				JToolbarHelper::versions('com_properties.property', $this->item->id);
			}

			JToolbarHelper::cancel('property.cancel', 'JTOOLBAR_CLOSE');
		}

		JToolbarHelper::divider();
		JToolbarHelper::help('JHELP_COMPONENTS_PROPERTIES_LINKS_EDIT');
	}
}
