<?php
defined('TYPO3_MODE') or die('Access denied.');

call_user_func(function ($extension) {
    $GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['solr']['PiResults']['addViewHelpers'][$extension] = \Serfhos\MySolrFluid\Solr\ViewHelperProvider::class;
}, $_EXTKEY);
