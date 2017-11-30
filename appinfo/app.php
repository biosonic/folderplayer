<?php
/**
 * ownCloud - folderplayer
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later. See the COPYING file.
 *
 * @author Aleksandar Veljkovic <coa.develop@gmail.com>
 * @copyright Aleksandar Veljkovic 2016
 */

namespace OCA\FolderPlayer\AppInfo;

use OCP\AppFramework\App;

require_once __DIR__ . '/autoload.php';

$app = new App('folderplayer');

/*
$container = $app->getContainer();

$container->query('OCP\INavigationManager')->add(function () use ($container) {
	$urlGenerator = $container->query('OCP\IURLGenerator');
	$l10n = $container->query('OCP\IL10N');
	return [
		// the string under which your app will be referenced in owncloud
		'id' => 'folderplayer',

		// sorting weight for the navigation. The higher the number, the higher
		// will it be listed in the navigation
		'order' => 10,

		// the route that will be shown on startup
		'href' => $urlGenerator->linkToRoute('folderplayer.page.index'),

		// the icon that will be shown in the navigation
		// this file needs to exist in img/
		'icon' => $urlGenerator->imagePath('folderplayer', 'app.svg'),

		// the title of your application. This will be used in the
		// navigation or on the settings page of your app
		'name' => $l10n->t('Folder Player'),
	];
});
 * 
 */

\OCP\Util::addStyle('folderplayer', '../js/bower_components/jPlayer/dist/skin/pink.flag/css/jplayer.pink.flag.min');  // include css/style.css for every app
\OCP\Util::addStyle('folderplayer', 'style');  // include css/style.css for every app

\OCP\Util::addScript('folderplayer', 'bower_components/jPlayer/dist/jplayer/jquery.jplayer.min');  // include js/script.js for every app
\OCP\Util::addScript('folderplayer', 'bower_components/jPlayer/dist/add-on/jplayer.playlist.min');  // include js/script.js for every app
\OCP\Util::addScript('folderplayer', 'script');  // include js/script.js for every app
