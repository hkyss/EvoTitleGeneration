# TitleGeneration
version 1.0

## Install
1. Copy this repository into site folder
2. Create a snippet with code
```php
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
 * @lastupdate  14.04.2021
 */

echo include_once MODX_BASE_PATH.'assets/snippets/TitleGeneration/snippet.TitleGeneration.php';
```

## Example
```
[!TitleGeneration!]

[!TitleGeneration?
&mask=`[+pagetitle+] | [+parent_pagetitle+]`
!]
```