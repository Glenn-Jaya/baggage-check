<?php

  function url_for($script_path)
  {
    if ($script_path[0] != '/')
    {
      $script_path = "/" . $script_path;
    }
    return WWW_ROOT . $script_path;
  }
  function u($string="") {
    return urlencode($string);
  }

  function raw_u($string="") {
    return rawurlencode($string);
  }

  function h($string="") {
    return htmlspecialchars($string);
  }

  function is_post_request() {
    return $_SERVER['REQUEST_METHOD'] == 'POST';
  }

  function getAllowedBoxText($allowed_name)
  {
    $result = "";
    switch ($allowed_name)
    {
      case 'Yes':
        $result = "<img src = " . url_for('/images/Allowed.svg') . ">";
        break;

      case 'No':
        $result = "<img src = " . url_for('/images/NotAllowed.svg') . ">";
        break;

      case 'Yes (<100ml)':
      case 'Yes (<350ml)':
        $result = "<img src = " . url_for('/images/Allowed.svg') . ">";
        $result .= "<span>". $allowed_name ."</span>";
        break;

      case "Check with carrier":
        $result = "<img src = " . url_for('/images/Allowed.svg') . ">";
        $result .= "<span>Check with carrier</span>";
        break;
    }
    return $result;
  }

  function createItemDisplay($item)
  {
    $carryOnText = find_allowed_name_by_id(h($item['carry_on']));
    $checkedText = find_allowed_name_by_id(h($item['checked']));

    $displayCode ="<section class = 'item_display'>";
    $displayCode .= "<h1>" . h($item['name']) . "</h1>";
		$displayCode .= "<div class = 'allowedStatus'>";
		$displayCode .= "<div class = 'allowedBox'>";
		$displayCode .= "	<span>Carry On</span>";
    $displayCode .= getAllowedBoxText($carryOnText);
		$displayCode .= "</div>";
    $displayCode .= "<div class = 'allowedBox'>";
		$displayCode .= "<span>Checked</span>";
    $displayCode .= getAllowedBoxText("$checkedText");
		$displayCode .= "</div>";
		$displayCode .= "</div>";
		$displayCode .= "<div class='discriptionDisplay'>";
    $displayCode .= h($item["description"]);
		$displayCode .= "</div>";
	  $displayCode .= "</section>";

    return $displayCode;
  }
 ?>
