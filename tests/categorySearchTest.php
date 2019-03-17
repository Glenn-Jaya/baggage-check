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

  }


 ?>
