<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_userdirectory
 *
 * @copyright   Copyright (C) 2005 - 2020 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// include the latest functions only once
JLoader::register('ModUserDirectoryHelper', __DIR__ . '/helper.php');

$phone_field    = (int)$params->get('phonenumber', 1);
if (!$phone_field)
{
	 $app->enqueueMessage(JText::_('MOD_USERDIRECTORY_FIELD_PHONENUMBER_ERROR'), 'error');
}
$users           = ModUserDirectoryHelper::getUsers($params);
$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'), ENT_COMPAT, 'UTF-8');

require JModuleHelper::getLayoutPath('mod_userdirectory', $params->get('layout', 'default'));
