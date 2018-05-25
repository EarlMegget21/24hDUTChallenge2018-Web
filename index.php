<?php
session_start();
//TODO: peut être créer un script PHP qui append tous les js dans un seul js qui sera inclu dans la page et pareil avec les css (genre d'assetic)
require_once __DIR__ . '/lib/File.php';
require_once File::build_path(array('lib','Session.php'));
require_once File::build_path(array('controller','Router.php'));