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

//namespace OCA\Foderplayer\Settings;

use OCA\Activity\UserSettings;
use OCP\Activity\IExtension;
use OCP\Activity\IManager;
use OCP\Activity\ISetting;
use OCP\AppFramework\Http\TemplateResponse;
use OCP\IConfig;
use OCP\IL10N;
use OCP\Settings\ISettings;

class Admin implements ISettings {


  /** @var IConfig */
	protected $config;

	/** @var IL10N */
	protected $l10n;

	/** @var IManager */
	protected $manager;

	/** @var UserSettings */
	protected $userSettings;

	/**
	 * @param IConfig $config
	 * @param IL10N $l10n
	 * @param IManager $manager
	 * @param UserSettings $userSettings
	 */
	public function __construct(IConfig $config, IL10N $l10n, UserSettings $userSettings, IManager $manager) {
		$this->config = $config;
		$this->l10n = $l10n;
		$this->manager = $manager;
		$this->userSettings = $userSettings;
  }

  /**
	 * @return string the section ID, e.g. 'sharing'
	 */
  public function getSection() {
    return 'additional';
  }

  /**
	 * @return TemplateResponse
	 */
	public function getForm() {
    //return "<h1>xxxxxxxx</h1>";
    return new TemplateResponse('folderplayer', 'admin', []);
  }

  /**
	 * @return int whether the form should be rather on the top or bottom of
	 * the admin section. The forms are arranged in ascending order of the
	 * priority values. It is required to return a value between 0 and 100.
	 *
	 * E.g.: 70
	 */
  public function getPriority() {
    return 56;
  }

}
