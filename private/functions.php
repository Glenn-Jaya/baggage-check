<?php

  function anyCategoriesSelected()
  {
    $categorySelected = false;
    foreach ($_SESSION['selected'] as $categoryValue)
    {
      if ($categoryValue === 'selected')
      {
        $categorySelected = true;
      }
    }
    return $categorySelected;
  }

  function checkSelected($categoryName)
  {
    if (isset($_SESSION['selected'][$categoryName]) && $_SESSION['selected'][$categoryName]==='selected')
    {
      return true;
    }
    else {
      return false;
    }
  }

  function createItemDisplay($item)
  {
    $carryOnText = find_allowed_name_by_id(h($item['carry_on']));
    $checkedText = find_allowed_name_by_id(h($item['checked']));

    $displayCode ="<section class = 'item-display'>";
    $displayCode .= "<h1>" . h($item['name']) . "</h1>";
		$displayCode .= "<div class = 'allowed-status'>";
		$displayCode .= "<div class = 'allowed-box'>";
		$displayCode .= "	<span>Carry On</span>";
    $displayCode .= getAllowedBoxText($carryOnText);
		$displayCode .= "</div>";
    $displayCode .= "<div class = 'allowed-box'>";
		$displayCode .= "<span>Checked</span>";
    $displayCode .= getAllowedBoxText("$checkedText");
		$displayCode .= "</div>";
		$displayCode .= "</div>";
		$displayCode .= "<div class='description-display'>";
    $displayCode .= h($item["description"]);
		$displayCode .= "</div>";
	  $displayCode .= "</section>";

    return $displayCode;
  }

  // TODO Concert this to look from the database directly instead of hardcoded assoc array
  $categoriesNameIdAssoc = ['electronics'=> '1', 'firearms-ammunition' => '2', 'food-drink' => '3',
                            'household-tools'=>'4', 'lighters-flammables'=>'5', 'medical'=>'6',
                            'personal-items'=>'7', 'sports-camping'=>'8'];

  function convertCategoryNameToId($categoryName)
  {
    global $categoriesNameIdAssoc;
    return $categoriesNameIdAssoc[$categoryName];
  }

  function convertSessionSelectedToArrayOfIDs()
  {
    $returnArray = [];
    foreach($_SESSION['selected'] as $name => $value)
    {
      if ($value === 'selected' )
      {
        $returnArray[] = convertCategoryNameToId($name);
      }
    }
    return $returnArray;
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

  function h($string="")
  {
    return htmlspecialchars($string);
  }


  function initializeSessions()
  {
    $_SESSION ['item_name'] = '';
    $_SESSION['selected'] = [
      'electronics'=>'',
      'firearms-ammunition' =>'',
      'food-drink' =>'',
      'household-tools' =>'',
      'lighters-flammables' =>'',
      'medical' =>'',
      'personal-items' =>'',
      'personal' =>'',
      'sports-camping' =>''
    ];
  }

  function is_post_request()
  {
    return $_SERVER['REQUEST_METHOD'] == 'POST';
  }

  function isCategorySelectedInSession($categoryName)
  {
    $categoryNameInSession = isset($_SESSION['selected'][$categoryName]);
    $categoryIsSelected = "selected" === $_SESSION['selected'][$categoryName];

    return $categoryNameInSession && $categoryIsSelected;
  }

  function raw_u($string="")
  {
    return rawurlencode($string);
  }

  function u($string="")
  {
    return urlencode($string);
  }

  function updateSelected($categoryName)
  {
    if(isset($_POST[$categoryName]))
    {
      if ($_POST[$categoryName] === "selected")
      {
            $_SESSION['selected'][$categoryName] = "selected";
      }
      elseif ($_POST[$categoryName] === "not_selected")
      {
        if(isCategorySelectedInSession($categoryName))
        {
          $_SESSION['selected'][$categoryName] = "";
        }
      }
    }
  }

function url_for($script_path)
{
  if ($script_path[0] != '/')
  {
    $script_path = "/" . $script_path;
  }
  return WWW_ROOT . $script_path;
}

function setCategoriesValue($newCategory, $existingCategories)
{
  $categoriesArray = explode('+', $existingCategories);
  $exists = false;
  $counter=0;
  foreach($categoriesArray as $category)
  {
    if(strcmp($newCategory, $category)===0)
    {
      $exists = true;
      unset($categoriesArray[$counter]);
      $existingCategories = implode('+',$categoriesArray);
    }
    $counter++;
  }
  if($exists===false)
  {
    if(strcmp($existingCategories,'')!==0)
    {
      $existingCategories .="+";
    }
    $existingCategories.= $newCategory;
  }
  return $existingCategories;
}

function isCategorySelected($newCategory, $categoriesValue)
{
  $categoriesArray = explode('+', $categoriesValue);
  if (in_array($newCategory, $categoriesArray))
  {
    return 'selected-btn';
  }
  else {
    return 'not-selected-btn';
  }
}
?>
