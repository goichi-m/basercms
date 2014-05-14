<?php
/* SVN FILE: $Id$ */
/**
 * [PUBLISH] ブログ年別アーカイブ
 * 
 * PHP versions 5
 *
 * baserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright 2008 - 2014, baserCMS Users Community <http://sites.google.com/site/baserusers/>
 *
 * @copyright		Copyright 2008 - 2014, baserCMS Users Community
 * @link			http://basercms.net baserCMS Project
 * @package			Blog.View
 * @since			baserCMS v 0.1.0
 * @version			$Revision$
 * @modifiedby		$LastChangedBy$
 * @lastmodified	$Date$
 * @license			http://basercms.net/license/index.html
 */
if (!isset($view_count)) {
	$view_count = false;
}
if (!isset($limit)) {
	$limit = false;
}
if (isset($blogContent)) {
	$id = $blogContent['BlogContent']['id'];
} else {
	$id = $blog_content_id;
}
$actionUrl = '/blog/blog/get_posted_years/' . $id;
if ($limit) {
	$actionUrl .= '/' . $limit;
} else {
	$actionUrl .= '/0';
}
if ($view_count) {
	$actionUrl .= '/1';
}
$data = $this->requestAction($actionUrl);
$postedDates = $data['postedDates'];
$blogContent = $data['blogContent'];
$baseCurrentUrl = $blogContent['BlogContent']['name'] . '/archives/date/';
?>


<aside class="widget-blog-yearly-archives widget-blog-yearly-archives-<?php echo $id ?> blogWidget">
<?php if ($name && $use_title): ?>
<h3><?php echo $name ?></h3>
<?php endif ?>
<?php if (!empty($postedDates)): ?>
<ul>
		<?php foreach ($postedDates as $postedDate): ?>
			<?php if (isset($this->params['named']['year']) && $this->params['named']['year'] == $postedDate['year']): ?>
				<?php $class = ' class="selected fontawesome-circle-arrow-right"' ?>
			<?php elseif ($this->request->url == $baseCurrentUrl . $postedDate['year']): ?>
				<?php $class = ' class="current fontawesome-circle-arrow-right"' ?>
			<?php else: ?>
				<?php $class = ' class="fontawesome-circle-arrow-right"' ?>
			<?php endif ?>
			<?php if ($view_count): ?>
				<?php $title = $postedDate['year'] . '年' . '(' . $postedDate['count'] . ')' ?>
			<?php else: ?>
				<?php $title = $postedDate['year'] . '年' ?>
			<?php endif ?>
<li<?php echo $class ?>>
				<?php
				$this->BcBaser->link($title, array(
					'admin' => false,
					'plugin' => '',
					'controller' => $blogContent['BlogContent']['name'],
					'action' => 'archives',
					'date', $postedDate['year']
				))
				?>
</li>
		<?php endforeach; ?>
</ul>
<?php endif; ?>
</aside>