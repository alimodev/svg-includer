<?php

require_once('src/SvgIncluder.php');

$svgFolder = 'svgs';
$svgFileExtension = '.svginline';

$svg = new Alimodev\Svg\SvgIncluder($svgFolder, $svgFileExtension);

?><!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>SVG Includer</title>
  <style>
    svg {stroke: inherit; fill: inherit;}
    .svg-icon use {fill: none; stroke-width: 1.5px;}
    .icon-row {width:100px; height:100px; margin-right:20px;}
    .ic-01 use {stroke:#00bcd4;}
    .ic-02 use {stroke:#8bc34a ;}
    .ic-03 use {stroke:#ff9800;}
    .ic-04 use {stroke:#ffc107;}
  </style>
</head>
<body>
<h1>SVG Includer</h1>
<h3>A simple library to include inline SVG images from files by pattern.</h3>
<?php

$svg->insertInlineSvg('gauge-dashboard', 'svg-icon icon-row ic-01');
$svg->insertInlineSvg('cog-circle', 'svg-icon icon-row ic-02');
$svg->insertInlineSvg('house-1', 'svg-icon icon-row ic-03');
$svg->insertInlineSvg('key-lock-1', 'svg-icon icon-row ic-04');

?>
<h4>Developed by: Alireza Mortazavi</h4>
<?php

//$svg->loadSvgs('*');
//$svg->loadSvgs('dash');
//$svg->loadSvgs(array('dash'));
//$svg->loadSvgs(array('dash/g*'));
$svg->loadSvgs(array('house', 'key-lock*', '*', 'dash', 'dash/*'));

?>
</body>
</html>
