<?php

/**
 * @author     Branko Wilhelm <branko.wilhelm@gmail.com>
 * @link       http://www.z-index.net
 * @copyright  (c) 2014 - 2015 Branko Wilhelm
 * @license    GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 *
 * @var        array $posts
 * @var        stdClass $module
 * @var        Joomla\Registry\Registry $params
 */

defined('_JEXEC') or die;

if (version_compare(JVERSION, 3, '>=')) {
    JHtml::_('jquery.framework');
}

JFactory::getDocument()->addScript('media/' . $module->module . '/js/default.js');
JFactory::getDocument()->addStyleSheet('media/' . $module->module . '/css/default.css');
?>
<?php if ($params->get('ajax')) : ?>
    <div class="mod_wow_blue_tracker ajax"></div>
<?php else: ?>
    <ul class="mod_wow_blue_tracker">
        <?php foreach ($posts as $key => $post): ?>
            <li>
                <span class="header">
                    <?php echo JHtml::_('link', $post->link, $post->title, array('target' => '_blank', 'title' => $post->title)); ?>
                </span>

                <div <?php echo ($key == 0 && $params->get('expand')) ? ' class="expand"' : ''; ?>>
                    <small><?php echo JHtml::_('date', $post->pubDate, JText::_('DATE_FORMAT_LC2')); ?></small>

                    <p>
                        <?php echo $post->description; ?>
                        <?php echo JHtml::_('link', $post->link, JText::_('MOD_WOW_BLUE_TRACKER_READMORE'), array('target' => '_blank', 'title' => $post->title)); ?>
                    </p>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>