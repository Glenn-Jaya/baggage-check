<?php

	require 'vendor/autoload.php';
	require_once('private/initialize.php');

	use PHPUnit\Framework\TestCase;


  class categorySearchTest extends TestCase {

		public function testQueryItemsInSingleCategory()
    {
      // id = 6 for Medical Category
      $categoryId = 6;
      $foundItemsSet = findItemsInCategory($categoryId);
      $foundItem1 = false;
      $foundItem2 = false;
      $expectedItem1Name = 'Hydrogen peroxide';
      $expectedItem2Name = 'Inhalers';

      while ($item = mysqli_fetch_assoc($foundItemsSet) )

      {
          $foundName = findItemNameById($item['item_id']);
          if($foundItem1==false)
          {
            if (strcmp($expectedItem1Name, $foundName)==0)
            // if (strcmp($expectedItem1Name, $item['name'])==0)
            // if ($item['item_id']==1)
            {
              $foundItem1 = true;
            }
          }

          if ($foundItem2 ==false)
          {
            if (strcmp($expectedItem2Name, $foundName)==0)
            // if (strcmp($expectedItem2Name, $item['name'])==0)
            // if ($item['item_id']==5)
            {
                $foundItem2 = true;
            }
          }
      }

			$this ->assertTrue($foundItem1, "{$expectedItem1Name} was not found in the findItemsInCategoryQuery");
			$this ->assertTrue($foundItem2, "{$expectedItem2Name} was not found in the findItemsInCategoryQuery");

    }


		public function testQueryItemsInMultipleCategories()
		{
			$category1 = 6;
			$category2 = 7;

			// hydrogen peroxide should be in both category 6 and 7

			$catArray = [$category1, $category2];

			$itemsSet = findItemsInMultCategories($catArray);
			// $itemsSet = find_all_items(); // used to make sure the test was working properly
			$peroxideFoundAndInhalersNotFound = false;
			$foundHydrogenPeroxide = false;
			$foundInhalers = false;

			while ($item = mysqli_fetch_assoc($itemsSet))
			{
        $foundName = findItemNameById($item['id']);
				if ($foundInhalers== false && $foundName === "Inhalers")
				{
					$peroxideFoundAndInhalersNotFound = false;
					$foundInhalers = true;
				}
				if ($foundHydrogenPeroxide == false && $foundName === "Hydrogen peroxide");
				{
					$foundHydrogenPeroxide = true;
				}
			}
			$this ->assertTrue($foundHydrogenPeroxide, "did not find hydrogen peroxide") ;
			$this ->assertFalse($foundInhalers, "found inhalers when shouldn't have");
		}

	public function testGetCategoryIDFromName()
	{
		$this -> assertEquals('1', findCategoryIdByName('electronics'));
		// $this -> assertEquals('2', findCategoryIdByName('firearms-ammunition'));
		$this -> assertEquals('3', findCategoryIdByName('food-drink'));
		$this -> assertEquals('4', findCategoryIdByName('household-tools'));
		$this -> assertEquals('5', findCategoryIdByName('lighters-flammables'));
		$this -> assertEquals('6', findCategoryIdByName('medical'));
		$this -> assertEquals('7', findCategoryIdByName('personal-items'));
		$this -> assertEquals('8', findCategoryIdByName('sports-camping'));
	}

  }


 ?>
