<?php
require_once('../private/initialize.php');

$items = [
	['id' => '1', 'name' =>'Hydrogen peroxide', 'carry_on' => '1', 'checked' => '1', 'description' => '3% hydrogen peroxide found in drugstores and used to clean cuts is considered
essential non-prescription medication. These liquids must be declared to the Screening Officer separately. Carry on: You can carry volumes greater than 100 ml (3.4 oz.) in your carry-on baggage. Checked: You can carry volumes greater than 100 ml (3.4 oz.) in your checked baggage.'],
	['id' => '2', 'name' =>'Lithium ion batteries in a device (between 100-160 Wh)', 'carry_on' => '1', 'checked' => '5', 'description' => 'Lithium ion batteries exceeding a watt-hour (Wh) rating of 100 Wh but not exceeding 160 Wh may be carried in a device in either carry-on or checked baggage with air carrier approval. Spare batteries: No more than 2 individually protected spare lithium ion batteries of 100-160 Wh are allowed per person in carry-on, with the approval of the air carrier. Spare lithium batteries of 100-160 Wh are permitted only with air carrier approval in checked baggage.'],
	['id' => '3', 'name' =>'Incendiary projectiles', 'carry_on' => '2', 'checked' => '2', 'description' => "NULL"],
	['id' => '5', 'name' =>'Inhalers', 'carry_on' => '3', 'checked' => '1', 'description' => 'Inhalers under the 100ml do not need to meet any requirements for medication but need to be packed in the 1L bag for containers of liquids, aerosols and gels. Inhalers that are over the 100ml volumetric limit must meet the prescribed medication requirements. Documentation to support your medical needs or condition is not required; however, if you feel that it would help ease your screening, it should be presented to the screening officer
along with your medically necessary items.'],
	['id' => '6', 'name' =>'Baking power or baking soda', 'carry_on' => '4', 'checked' => '1', 'description' => "Baking powder or baking soda: Certain powders and granular materials in your carry-on are limited to a total quantity of 350 ml or less (roughly the size of a soda can)."]
];


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Baggage</title>

    <link rel="stylesheet" media="all" href=" <?php echo url_for('stylesheets/baggage.css'); ?>" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    <h1>Coming Soon!</h1>

      <form action = "<?php echo url_for("/displayTemp.php"); ?>" method = "POST">
        <input type="text" name="item_name" placeholder= "Enter item to search"
        ><button type="submit"><i class="fa fa-search"></i></button>
      </form>

	<?php
		$item = $items[0];
	 ?>

	<section class = "item_display">
		<h1> <?php echo $item['name']; ?></h1>
		<div class = "allowedStatus">
			<div class = "allowedBox">
				<span>Carried</span>
				<?php echo getAllowedBoxText("Yes"); ?>
			</div>
			<div class = "allowedBox">
				<span>Checked</span>
				<?php echo getAllowedBoxText("No"); ?>
			</div>
		</div>
		<div class="discriptionDisplay">
				3% hydrogen peroxide found in drugstores and used to clean cuts is considered essential non-prescription medication. These liquids must be declared to the Screening Officer separately. Carry on: You can carry volumes greater than 100 ml (3.4 oz.) in your carry-on baggage. Checked: You can carry volumes greater than 100 ml (3.4 oz.) in your checked baggage.
		</div>
	</section>

<section class = "item_display">
		<h1> <?php echo $item['name']; ?></h1>
		<div class = "allowedStatus">
			<div class = "allowedBox">
				<span>Carried</span>
				<?php echo getAllowedBoxText("Yes (<100ml)"); ?>
			</div>

			<div class = "allowedBox">
				<span>Checked</span>
				<?php echo getAllowedBoxText("Yes (<350ml)"); ?>
			</div>
		</div>
		<div class="discriptionDisplay">
				3% hydrogen peroxide found in drugstores and used to clean cuts is considered essential non-prescription medication. These liquids must be declared to the Screening Officer separately. Carry on: You can carry volumes greater than 100 ml (3.4 oz.) in your carry-on baggage. Checked: You can carry volumes greater than 100 ml (3.4 oz.) in your checked baggage.
		</div>
	</section>

<section class = "item_display">
		<h1> <?php echo $item['name']; ?></h1>
		<div class = "allowedStatus">
			<div class = "allowedBox">
				<span>Carried</span>
				<?php echo getAllowedBoxText("Check with carrier"); ?>
			</div>

			<div class = "allowedBox">
				<span>Checked</span>
				<?php echo getAllowedBoxText("Check with carrier"); ?>
			</div>
		</div>
		<div class="discriptionDisplay">
				3% hydrogen peroxide found in drugstores and used to clean cuts is considered essential non-prescription medication. These liquids must be declared to the Screening Officer separately. Carry on: You can carry volumes greater than 100 ml (3.4 oz.) in your carry-on baggage. Checked: You can carry volumes greater than 100 ml (3.4 oz.) in your checked baggage.
		</div>
	</section>

  </body>
</html>
