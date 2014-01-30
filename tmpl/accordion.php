<?php

/**
 * @author     Branko Wilhelm <branko.wilhelm@gmail.com>
 * @link       http://www.z-index.net
 * @copyright  (c) 2014 Branko Wilhelm
 * @license    GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

defined('_JEXEC') or die;

JFactory::getDocument()->addScript(JUri::base(true) . '/modules/' . $module->module . '/tmpl/accordion.js');
JFactory::getDocument()->addStyleSheet(JUri::base(true) . '/modules/' . $module->module . '/tmpl/accordion.css');
?>
<?php if ($params->get('ajax')) : ?>
    <div class="mod_wow_blue_tracker ajax"></div>
<?php else: ?>
    <ul class="mod_wow_blue_tracker">
        <?php foreach ($posts as $post): ?>
            <li>
                <h4><?php echo $post->title; ?></h4>

                <p>
                    <?php echo $post->description; ?>
                    <?php echo JHtml::link($post->link, JText::_('MOD_WOW_BLUE_TRACKER_READMORE'), array('target' => '_blank', 'title' => $post->title)); ?>
                </p>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>