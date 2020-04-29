<?php
defined('MCORE') || die();

include __DIR__.'/debug.php';
include __DIR__.'/lib.php';

include __DIR__.'/class.db.php';
$DB = new MCore_DB($CFG->db);

include __DIR__.'/class.user.php';
$USER = new MCore_user();
$USER->answer();

include __DIR__.'/class.file.php';