<?php

/* SVN FILE: $Id$ */
/**
 * [PUBLISH] グロバールメニュー
 * 
 * PHP versions 5
 *
 * baserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright 2008 - 2013, baserCMS Users Community <http://sites.google.com/site/baserusers/>
 *
 * @copyright		Copyright 2008 - 2013, baserCMS Users Community
 * @link			http://basercms.net baserCMS Project
 * @package			Baser.View
 * @since			baserCMS v 0.1.0
 * @version			$Revision$
 * @modifiedby		$LastChangedBy$
 * @lastmodified	$Date$
 * @license			http://basercms.net/license/index.html
 */
$this->request->params['action'] = str_replace('mobile_', '', $this->request->params['action']);
include BASER_VIEWS . 'Contents' . DS . 'search' . $this->ext;
$this->request->params['action'] = 'mobile_' . $this->request->params['action'];