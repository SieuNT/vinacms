<?php
/**
 * @var array $options
 * @var array $plugin
 */

define('ELFINDER_IMG_PARENT_URL', \vinacms\tools\elfinder\Assets::getPathUrl());

// run elFinder
$connector = new elFinderConnector(new \vinacms\tools\elfinder\elFinderApi($options, $plugin));
$connector->run();