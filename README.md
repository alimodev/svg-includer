# SVG Includer Library
##### A simple PHP library to include inline SVG images from .svginline files by pattern matching filtering.
#
## Getting Started

To get started, see the examples in the index.php.
All you have to do is to create an instance of the class and start using it!
Don't forget to set your svg folder and the svg file extension of your inline svg files. You can have multiple instances with different folder addresses and extensions.

#### To Create an Instance:
To create an instance of the class:
```php
require_once('src/SvgIncluder.php');
$svgFolder = 'svgs';
$svgFileExtension = '.svginline';
$svg = new Alimodev\Svg\SvgIncluder($svgFolder, $svgFileExtension);
```

## Loading the SVG images

To load the inline SVGs, you can use the loadSvgs() method.
You can pass the names of all the files and folders that you wanna add inline SVGs from as in array for the argument of this method.
You can also pass a single string for single elements or use * as wildcard for searching and filtering SVG files. All the found SVGs will be echoes inline to your HTML and you can later use them in your document with their IDs.
```php
$svg->loadSvgs('*');
```
The outut of this method will be like:
```HTML
<svg xmlns="http://www.w3.org/2000/svg" style="display: block; width: 1px; height: 1px; visibility: hidden; opacity: 0;">
<symbol viewBox="0 0 24 24" id="your-svg-id">
	<g>
		<path d="M3.75,18v3.75c0,0.828,0.672,1.5,1.5,1.5h4.5v-6c0-0.828,0.672-1.5,1.5-1.5h1.5c0.828,0,1.5,0.672,1.5,1.5v6 h4.5c0.828,0,1.5-0.672,1.5-1.5V18 M0.75,16.5L10.939,6.311c0.586-0.586,1.535-0.586,2.121-0.001c0,0,0,0,0.001,0.001L23.25,16.5 M16.5,9.75v-1.5h3.75v5.25 M17.122,0.75l-0.407,0.543c-0.339,0.444-0.269,1.077,0.16,1.436l0,0 c0.429,0.359,0.499,0.992,0.16,1.436l-0.407,0.543 M20.872,0.75l-0.407,0.543c-0.339,0.444-0.269,1.077,0.16,1.436l0,0 c0.429,0.359,0.499,0.992,0.16,1.436l-0.407,0.543"></path>
	</g>
</symbol>
</svg>
```
> You can load SVGs on the bottom or top of your HTML document. It doesn't make a difference.
> For more examples, see the index.php

## Inserting Inline SVG Tag by ID

To use an SVG image loaded in your HTML document by the loadSVG() method, you can use the insertInlineSvg() method to add inline svg tags by it's id. You can pass the optional classes for the svg tag as the second argument of this method.
```php
$svg->insertInlineSvg('your-svg-id', 'optional-class');
```
The output of this method will be:
```HTML
<svg class="optional-class"><use xlink:href="#your-svg-id"></use></svg>
```

## Authors

* **Alireza Mortazavi**
