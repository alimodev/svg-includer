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
  public function __construct(
    $userSvgFolder = 'svgs',
    $userSvgFileExt = '.svginline'
    )
  {
    $this->svgFolder = $userSvgFolder;
    $this->svgFileExt = $userSvgFileExt;
  }

  public function loadSvgs($filterArray = array())
  {
    $filterArray = $this->convertFilterStringToArray($filterArray);

    $svgFiles = array();
    // if we don't have filter array, load all files
    if (!empty($filterArray))
    {
      foreach ($filterArray as $filter)
      {
        $svgFiles = array_merge($svgFiles, $this->getAllSvgs($filter));
      }
    } else {
      $svgFiles = $this->getAllSvgs();
    }
    $svgFiles = array_unique($svgFiles);
    $this->printSvgBlock($svgFiles);
  }

  public function getInlineSvg($svgId, $optionalClasses = '')
  {
    $tag = '';
    $tag .= '<svg';
    $tag .= (!empty($optionalClasses)) ? ' class="' . $optionalClasses . '"' : '';
    $tag .= '><use xlink:href="#' . $svgId . '"></use></svg>';
    return $tag;
  }

  public function insertInlineSvg($svgId, $optionalClasses = '')
  {
    echo $this->getInlineSvg($svgId, $optionalClasses);
  }

  /**
   * Private Methods
   */
  private function getAllSvgs($filter = '')
  {
    $searchDir = $this->svgFolder . DIRECTORY_SEPARATOR;
    $filter = trim($filter, '*');
    $filter = trim($filter, '/');
    $filter = trim($filter, '\\');
    if (!empty($filter))
    {
      $searchDir .= $filter;
      if (is_dir($searchDir))
      {
        $searchDir .= DIRECTORY_SEPARATOR;
      }
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

  private function convertFilterStringToArray($filterStatement)
  {
    // if we have a string instead of an array, convert it to a single element array
    if (
      !is_array($filterStatement) &&
      !empty($filterStatement) &&
      is_string($filterStatement)
      )
    {
      $filterArray = array(0 => $filterStatement);
      return $filterArray;
    }
    return $filterStatement;
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
