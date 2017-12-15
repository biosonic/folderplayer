<?php

namespace OCA\Folderplayer\AppInfo;

class Application extends \OCP\AppFramework\App {

  public function __construct($urlParams = array()) {
    parent::__construct('folderplayer', $urlParams);
    //$this->registerServices();
  }

  public function registerSettings() {
    // Register settings scripts
    \OCP\App::registerPersonal('folderplayer', 'settings/personal');
    //App::registerPersonal('folderplayer', 'personal'); // <-- can not make this to work
  }

}
