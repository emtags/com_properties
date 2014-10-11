<?php
/**
 * @package     Realeza
 * @subpackage  com_properties
 *
 * @copyright   Copyright (C) 2014 Emtags, All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');
JHtml::_('behavior.caption');
echo JLayoutHelper::render('joomla.content.categories_default', $this);
echo $this->loadTemplate('items');
?>
</div>
