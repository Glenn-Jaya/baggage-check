<?php
	require 'vendor/autoload.php';
	// require_once('../private/functions.php');
	require_once('private/initialize.php');

	use PHPUnit\Framework\TestCase;

  class phpUnitTest extends TestCase {
    public function testTwoPlusTwo()

    {
      $sum = 2+2;
      // had expected = 5 below to see if it would fail and it does!
      $this ->assertEquals(4, $sum);
    }


		public function testAllowedDB()
		{
			$expectedAllowedNames = [
				["id"  => "1", "name" => "Yes"],
				["id" => "2", "name" => "No"],
				["id" => "3", "name" => "Yes (<100ml)"],
				["id" => "4", "name" => "Yes (<350ml)"],
				["id" => "5", "name" => "Check with carrier"]
			];

			$allowedSet = find_all_allowed_codes();
			$actualAllowedNames = [];
			while($allowedRow = mysqli_fetch_assoc($allowedSet))
			{
				// $actualAllowedNames.push($allowedRow);
				array_push($actualAllowedNames, $allowedRow);
			}

			// below gets an error b/c can't use diff assoc for multidementional arrays, u get a Array to String error
			// $differenceInArrays = array_diff_assoc($expectedAllowedNames, $actualAllowedNames);

			// $this ->assertEmpty

			$this ->assertEquals($expectedAllowedNames, $actualAllowedNames);
		}

		

  }
