<?php

$tmpl = new OCP\Template('folderplayer', 'personal');
$tmpl->assign('folderplayer_parameters', "boban");
return $tmpl->fetchPage();
