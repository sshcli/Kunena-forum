<?php
/**
 * Kunena Component
 * @package     Kunena.Administrator.Template
 * @subpackage  Stats
 *
 * @copyright   (C) 2008 - 2015 Kunena Team. All rights reserved.
 * @license     http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link        http://www.kunena.org
 **/
defined('_JEXEC') or die();

// @var KunenaAdminViewStats $this

$document = JFactory::getDocument();
$document->addStyleSheet(JUri::base(true) . '/components/com_kunena/media/css/admin.css');

if (JFactory::getLanguage()->isRTL())
{
	$document->addStyleSheet(JUri::base(true) . '/components/com_kunena/media/css/admin.rtl.css');
}
?>
	<div id="j-sidebar-container" class="span2">
		<div id="sidebar">
			<div class="sidebar-nav"><?php include KPATH_ADMIN . '/template/common/menu.php'; ?></div>
		</div>
	</div>
	<div id="j-main-container" class="span10">

	<div class="kadmin-functitle icon-stats"><?php echo JText::_('COM_KUNENA_STATS_GEN_STATS');?></div>
	<div class="kadmin-statscover">

<!-- BEGIN: STATS -->
<div class="kadmin-statscover">

<table class="kadmin-stat">
	<caption><?php echo JText::_('COM_KUNENA_STATS_GEN_STATS'); ?></caption>

	<thead>
	<tr>
		<th><?php echo JText::_('COM_KUNENA_STATISTIC');?></th>
		<th><?php echo JText::_('COM_KUNENA_VALUE');?></th>
		<th><?php echo JText::_('COM_KUNENA_STATISTIC');?></th>
		<th><?php echo JText::_('COM_KUNENA_VALUE');?></th>
	</tr>
	</thead>

	<tbody>
	<tr>
		<td><?php echo JText::_('COM_KUNENA_STATS_TOTAL_MEMBERS'); ?> </td>
		<td><strong><?php echo $this->memberCount; ?></strong></td>
		<td><?php echo JText::_('COM_KUNENA_STATS_TOTAL_SECTIONS'); ?> </td>
		<td><strong><?php echo $this->sectionCount;?></strong></td>
	</tr>
	<tr>
		<td><?php echo JText::_('COM_KUNENA_STATS_TOTAL_REPLIES'); ?></td>
		<td><strong><?php echo $this->messageCount;?></strong></td>
		<td><?php echo JText::_('COM_KUNENA_STATS_TOTAL_CATEGORIES'); ?> </td>
		<td><strong><?php echo $this->categoryCount;?></strong></td>
	</tr>
	<tr>
		<td><?php echo JText::_('COM_KUNENA_STATS_TOTAL_TOPICS'); ?></td>
		<td><strong><?php echo $this->topicCount;?></strong></td>
		<td><?php echo JText::_('COM_KUNENA_STATS_LATEST_MEMBER'); ?> </td>
		<td><strong><?php echo KunenaFactory::getUser(intval($this->lastUserId))->getName(); ?></strong></td>
	</tr>
	<tr>
		<td><?php echo JText::_('COM_KUNENA_STATS_TODAY_TOPICS'); ?></td>
		<td><strong><?php echo $this->todayTopicCount; ?></strong></td>
		<td><?php echo JText::_('COM_KUNENA_STATS_YESTERDAY_TOPICS'); ?> </td>
		<td><strong><?php echo $this->yesterdayTopicCount;?></strong></td>
	</tr>
	<tr>
		<td><?php echo JText::_('COM_KUNENA_STATS_TODAY_REPLIES'); ?></td>
		<td><strong><?php echo $this->todayReplyCount;?></strong></td>
		<td><?php echo JText::_('COM_KUNENA_STATS_YESTERDAY_REPLIES'); ?></td>
		<td><strong><?php echo $this->yesterdayReplyCount; ?></strong></td>
	</tr>
	</tbody>
</table>

<?php
$tabclass = array("row1","row2");
$k = 0;
?>
<?php foreach ($this->top as $top) : ?>
<h2><?php echo $top[0]->title ?></h2>
<table class="kadmin-stat">
	<tbody>
		<tr>
			<th>#</th>
			<th><?php echo $top[0]->titleName ?></th>
			<th>&nbsp;</th>
			<th><?php echo $top[0]->titleCount ?></th>
		</tr>
		<?php foreach ($top as $id => $item) : ?>
		<tr>
			<td><?php echo $id + 1 ?></td>
			<td>
				<?php echo $item->link ?>
			</td>
			<td>
				<img class="kstats-bar" src="<?php echo JUri::root(true) . '/media/kunena/images/bar.png' ?>" alt="" height="15" width="<?php echo $item->percent ?>%" />
			</td>
			<td>
				<?php echo $item->count ?>
			</td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>
<?php endforeach; ?>

<!-- FINISH: STATS -->
</div>
</div>
</div>


<div class="pull-right small">
	<?php echo KunenaVersion::getLongVersionHTML(); ?>
</div>
