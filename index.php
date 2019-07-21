<?php

require_once('src/SvgIncluder.php');

$svgFolder = 'svgs';
$svgFileExtension = '.svginline';

$svg = new Alimodev\Svg\SvgIncluder($svgFolder, $svgFileExtension);

//$svg->loadSvgs('dash');
//$svg->loadSvgs(array('dash'));
//$svg->loadSvgs(array('house', 'key-lock-1', 'dash'));
$svg->loadSvgs(array('dash/g*'));
//$svg->loadSvgs('*');

?>
