<?php

/**
 * @author     Branko Wilhelm <branko.wilhelm@gmail.com>
 * @link       http://www.z-index.net
 * @copyright  (c) 2014 Branko Wilhelm
 * @license    GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

defined('_JEXEC') or die;

if (version_compare(JVERSION, 3, '>=')) {
    JHtml::_('jquery.framework');
}

JFactory::getDocument()->addScript(JUri::base(true) . '/modules/' . $module->module . '/tmpl/default.js');
JFactory::getDocument()->addStyleSheet(JUri::base(true) . '/modules/' . $module->module . '/tmpl/default.css');
?>
<?php if ($params->get('ajax')) : ?>
    <div class="mod_wow_blue_tracker ajax"></div>
<?php else: ?>
    <ul class="mod_wow_blue_tracker">
        <?php foreach ($posts as $post): ?>
            <li>
                <span class="header"><a href="<?php echo $post->link; ?>" title="<?php echo $post->title; ?>"><?php echo $post->title; ?></a></span>

                <div>
                    <small><?php echo JHtml::date($post->pubDate, JText::_('DATE_FORMAT_LC2')); ?></small>

                    <p>
                        <?php echo $post->description; ?>
                        <?php echo JHtml::link($post->link, JText::_('MOD_WOW_BLUE_TRACKER_READMORE'), array('target' => '_blank', 'title' => $post->title)); ?>
                    </p>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>