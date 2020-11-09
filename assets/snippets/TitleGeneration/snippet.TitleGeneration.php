<?php
/**
 * TitleGeneration
 *
 * Site page title generation
 *
 * @category    snippet
 * @version     1.0
 * @license     http://www.gnu.org/copyleft/gpl.html GNU Public License (GPL)
 * @internal    @properties
 * @internal    @modx_category Content
 * @internal    @installset base
 * @author      hkyss [hkyss.off.dev@gmail.com]
 * @lastupdate  09.11.2020
 */

if(!defined('MODX_BASE_PATH')){die('What are you doing? Get out of here!');}

$documentObject = $modx->documentObject;

if(!empty($documentObject['longtitle'])) {
    return $documentObject['longtitle'];
}

if((int)$documentObject['id'] === 1 || (int)$documentObject['parent'] === 0 || (int)$documentObject['parent'] === 221 || (int)$documentObject['parent'] === 222) {
    return $documentObject['pagetitle'];
}
else {
    $documentObject['domain'] = $modx->config['valid_hostnames'];
    $documentObject['parent_pagetitle'] = $modx->runSnippet('DocInfo',array('docid'=>$documentObject['parent'],'field'=>'pagetitle'));
    $mask = isset($mask) ? $mask : '[+pagetitle+] — [+parent_pagetitle+] [+domain+]';

    return $modx->parseText($mask,$documentObject);
}
