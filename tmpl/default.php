<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_userdirectory
 *
 * @copyright   Copyright (C) 2005 - 2020 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>
<?php if (!empty($users)) : ?>

	<?php foreach ($users as $user) : ?>
		<ul class="userdirectory<?php echo $moduleclass_sfx; ?> mod-list" >
			<li>
				<?php echo $user->name . ' '; ?>
		
				<a href=mailto:<?php echo $user->email; ?>><?php echo $user->email ?></a> 

				<?php echo ' ' . $user->value; ?>
			</li>
		</ul>			
	<?php endforeach; ?>
	
<?php endif; ?>
