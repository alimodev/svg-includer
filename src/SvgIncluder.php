<?php
/**
 * SVG Includer
 *
 */
namespace Alimodev\Svg;

class SvgIncluder{
  /**
   * Object Decleration
   */
  private $svgFolder = '';
  private $svgFileExt = '';

  /**
   * Public Methods
   */
  public function __construct($userSvgFolder = 'svgs', $userSvgFileExt = '.svginline')
  {
    $this->svgFolder = $userSvgFolder;
    $this->svgFileExt = $userSvgFileExt;
  }

  public function loadSvgs($filterArray = array())
  {
    $svgFiles = $this->getAllSvgs();
    $this->printSvgBlock($svgFiles);
  }

  /**
   * Private Methods
   */
  private function getAllSvgs($categoryFolder = '')
  {
    $searchDir = $this->svgFolder . DIRECTORY_SEPARATOR;
    if (!empty($categoryFolder))
    {
      $searchDir .= $categoryFolder . DIRECTORY_SEPARATOR;
    }
    return glob($searchDir  . "*." . trim($this->svgFileExt, '.'));
  }

  private function printSvgBlock($svgFiles)
  {
    $this->printInlineSvgStartTag();
    foreach ($svgFiles as $svgFile)
    {
      echo $this->generateInlineSvg($svgFile);
    }
    $this->printInlineSvgEndTag();
  }

  private function generateInlineSvg($svgFile)
  {
    $svgFileContent = $this->readFile($svgFile);
    if ($svgFileContent)
    {
      $inlineSvg = $this->prepareSvgSymbol($svgFileContent);
      return $inlineSvg;
    }
  }

  private function readFile($fileAddr)
  {
    if (file_exists($fileAddr))
    {
      return file_get_contents($fileAddr);
    }
    return false;
  }

  private function prepareSvgSymbol($svgFileContent)
  {
    $svgSymbol = trim($svgFileContent);
    $svgSymbol .= "\n";
    return $svgSymbol;
  }

  private function printInlineSvgStartTag()
  {
    echo '<!-- SVG-icons -->';
    echo "\n";
    echo '<svg xmlns="http://www.w3.org/2000/svg" ';
    echo 'style="display: block; width: 1px; height: 1px; visibility: hidden; opacity: 0;">';
    echo "\n";
  }

  private function printInlineSvgEndTag()
  {
    echo '</svg>';
    echo "\n";
  }
}

?>
