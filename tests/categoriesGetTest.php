<?php
require 'vendor/autoload.php';
require_once('private/initialize.php');

use PHPUnit\Framework\TestCase;


class categoriesGetTest extends TestCase
{
  public function testSetFirstCategory()
  {
    $resultString = setCategoriesValue('food-drink', '');
		$this -> assertEquals('food-drink', $resultString);
  }
  public function testSetSecondCategory()
  {
    $resultString = setCategoriesValue('food-drink', '');
    $resultString = setCategoriesValue('electronics', $resultString);
		$this -> assertEquals('food-drink+electronics', $resultString);
  }
  public function testSetThirdCategory()
  {
    $resultString = setCategoriesValue('food-drink', '');
    $resultString = setCategoriesValue('electronics', $resultString);
    $resultString = setCategoriesValue('personal-items', $resultString);
		$this -> assertEquals('food-drink+electronics+personal-items', $resultString);
  }
  public function testDeleteFirstCategory()
  {
    $resultString = setCategoriesValue('food-drink', '');
    $resultString = setCategoriesValue('food-drink', $resultString);
		$this -> assertEquals('', $resultString);
  }
  public function testDeleteSecondCategory()
  {
    $resultString = setCategoriesValue('food-drink', '');
    $resultString = setCategoriesValue('electronics', $resultString);
    $resultString = setCategoriesValue('electronics', $resultString);
		$this -> assertEquals('food-drink', $resultString);
    $resultString = setCategoriesValue('electronics', $resultString);
		$this -> assertEquals('food-drink+electronics', $resultString);
    $resultString = setCategoriesValue('food-drink', $resultString);
		$this -> assertEquals('electronics', $resultString);
    $resultString = setCategoriesValue('electronics', $resultString);
		$this -> assertEquals('', $resultString);

  }

  public function testIsCategorySelected()
  {
    $this ->assertEquals('not-selected-btn', isCategorySelected('electronics', ""));
    $this ->assertEquals('selected-btn', isCategorySelected('electronics', "electronics"));
    $this ->assertEquals('selected-btn', isCategorySelected('electronics', "electronics+food-drink"));
    $this ->assertEquals('selected-btn', isCategorySelected('electronics', "food-drink+electronics"));
    $this ->assertEquals('not-selected-btn', isCategorySelected('electronics', "food-drink"));
  }

}

 ?>
