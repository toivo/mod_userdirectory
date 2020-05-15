<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_userdirectory
 *
 * @copyright   Copyright (C) 2005 - 2020 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * Helper for mod_userdirectory
 *
 * @since  1.6
 */
class ModUserDirectoryHelper
{
	/**
	 * Get users sorted by activation date
	 *
	 * @param   \Joomla\Registry\Registry  $params  module parameters
	 *
	 * @return  array  The array of users
	 *
	 * @since   1.6
	 */
	public static function getUsers($params)
	{
		// custom field_id in field_values table
		$phone_field	= $params->get('phonenumber', 1);
		
		$db    = JFactory::getDbo();
		$query = $db->getQuery(true)
			->select($db->quoteName(array('a.id', 'a.name', 'a.email', 'v.value')))
			->order($db->quoteName('a.name') . ' ASC')
			->from('#__users AS a')
			->join('LEFT', '#__fields_values AS v ON v.item_id = a.id AND v.field_id = ' . $phone_field)
			->where('a.block <> 1');
		
		$db->setQuery($query, 0);		

		try
		{
			return (array) $db->loadObjectList();
		}
		catch (RuntimeException $e)
		{
			JFactory::getApplication()->enqueueMessage(JText::_('JERROR_AN_ERROR_HAS_OCCURRED'), 'error');

			return array();
		}
	}
}
