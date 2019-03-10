
<?php
	require 'vendor/autoload.php';
	// require_once('../private/functions.php');
	require_once('private/initialize.php');

	use PHPUnit\Framework\TestCase;


  class allowedTest extends TestCase {

    // better way would be to get directly from DB so if db ever changes it won't break test

public function testAllowedBoxTextYes()
		{
			$result = getAllowedBoxText("Yes");
			$this ->assertEquals("<img src = " . url_for('/images/Allowed.svg') . ">", $result);
		}

		public function testAllowedBoxTextNo()
		{
			$result = getAllowedBoxText("No");
			$this ->assertEquals("<img src = " . url_for('/images/NotAllowed.svg') . ">", $result);
		}

		public function testAllowedBoxTextYes100()
		{
      $allowed_name = "Yes (<100ml)";
			$actual = getAllowedBoxText("Yes (<100ml)");
      $expected= "<img src = " . url_for('/images/Allowed.svg') . ">";
      $expected .= "<span>". $allowed_name ."</span>";

			$this ->assertEquals($expected, $actual);
		}

    public function testAllowedBoxTextYes350()
		{
      $allowed_name = "Yes (<350ml)";
			$actual = getAllowedBoxText("Yes (<350ml)");
      $expected= "<img src = " . url_for('/images/Allowed.svg') . ">";
      $expected .= "<span>". $allowed_name ."</span>";

			$this ->assertEquals($expected, $actual);
		}

    public function testAllowedBoxTextCheckCarrier()
    {
			$actual = getAllowedBoxText("Check with carrier");
      $expected = "<img src = " . url_for('/images/Allowed.svg') . ">";
      $expected .= "<span>Check with carrier</span>";
			$this ->assertEquals($expected, $actual);
    }

		public function testGetNameByIdExists()
		{
				$actual = find_allowed_name_by_id("3");
				$this -> assertEquals("Yes (<100ml)", $actual);
		}

		public function testGetNameByIdNotExists()
		{
				$actual = find_allowed_name_by_id("-1");
				$this -> assertEquals("", $actual);
		}
  }
