<?php
/**
 * ownCloud - folderplayer
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later. See the COPYING file.
 *
 * @developer Lucian Last <li@last.nl>
 * @copyright Lucian Last 2018
 * @author Aleksandar Veljkovic <coa.develop@gmail.com>
 * @copyright Aleksandar Veljkovic 2016
 */

\OCP\Util::addStyle('folderplayer', '../js/bower_components/jPlayer/dist/skin/pink.flag/css/jplayer.pink.flag.min');  // include css/style.css for every app
\OCP\Util::addStyle('folderplayer', 'style');  // include css/style.css for every app

\OCP\Util::addScript('folderplayer', 'bower_components/jPlayer/dist/jplayer/jquery.jplayer.min');  // include js/script.js for every app
\OCP\Util::addScript('folderplayer', 'bower_components/jPlayer/dist/add-on/jplayer.playlist.min');  // include js/script.js for every app
\OCP\Util::addScript('folderplayer', 'script');  // include js/script.js for every app
