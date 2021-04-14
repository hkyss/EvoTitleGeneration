<?php
if(!defined('MODX_BASE_PATH')) {
  die('Something was wrong.');
}

$documentObject = $modx->documentObject;

if(!empty($documentObject['longtitle'])) {
    return $documentObject['longtitle'];
}

if((int)$documentObject['id'] === 1 || (int)$documentObject['parent'] === 0) {
    return $documentObject['pagetitle'];
}
else {
    $documentObject['domain'] = $modx->config['valid_hostnames'];

    $parent_info = $modx->getDocument((int)$documentObject['parent']);
    if(!empty($parent_info)) {
      foreach($parent_info as $item_key => $item) {
        $documentObject['parent_'.$item_key] = $item;
        unset($parent_info[$item_key]);
      }
    }

    $mask = isset($mask) ? $mask : '[+pagetitle+] — [+parent_pagetitle+] [+domain+]';

    return $modx->parseText($mask,$documentObject);
}
