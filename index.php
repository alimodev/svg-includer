<?php

/**
 * SVG Includer
 */
require_once('src/SvgIncluder.php');

$svgFolder = 'svgs';
$svgFileExtension = '.svgsinline';

$svg = new Alimodev\Svg\SvgIncluder($svgFolder);

$svg->loadSvgs();

?>
