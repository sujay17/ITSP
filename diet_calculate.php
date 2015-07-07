<?php
session_start();
$BMR=$_SESSION['BMR'];
$BMI=$_SESSION['BMI'];
$value=$_POST['exercise'];

require_once "config.php";

$user=$_SESSION['logged_in_user'];
$sql="SELECT gender FROM patient WHERE username='$user' ";
$rows=$conn->query($sql);

foreach($rows as $single){
  $gender=$single['gender'];
}

$calories=$BMR*$value;
$carbohydrates_calories=55/100*$calories ;
if($gender='Male') $fibres=31;
else $fibres=25; 
$sugar_calories=260 ; 
$proteins_calories=23/100*$calories ;
$fat_calories=0.22*$calories;





?>
<html>
<body bgcolor=#7FFFD4>
<style>
	#center
	{
		text-align: center ;
		line-height: 200% ;

	}
    .underline
    {
    	text-decoration: underline;
    }
    table, th, td {
    border: 1px solid black;
}
</style>
<h1 id="center" class="underline"> Your Daily Diet Recommendation </h1> 
<h3 id="center"> 
Carbohydrates :  <?php echo $carbohydrates_calories ?> calories  <br>
Roughage : <?php echo $fibres ?>  grams <br>
Proteins : <?php echo $proteins_calories ?> calories  <br> 
Fats : <?php echo $fat_calories ?> calories <br>
Water :Atleast 8-10 Glasses everyday <br>


</h3>
<h2 id="<?php echo $carbohydrates_calories ?> calories"> SOME COMMON FOODS AND THEIR CALORIES </h2> 
<table style="width:100%" >
  <tr>
    <td>Apple, medium: 72</td>
  <td>Banana, medium: 105</td>		
    <td>Beer (regular, 12 ounces): 153</td>
    <td>Bread (one slice, wheat or white): 66</td>
    <td>Bagel: 289</td>
  </tr>
  <tr>
    <td>Butter (salted, 1 tablespoon): 102</td>


    <td>Carrots (raw, 1 cup): 52</td>		
    <td>Cheddar cheese (1 slice): 113</td>
    <td>Chicken breast (boneless, skinless, roasted, 3 ounces): 142</td>
    <td>Chili with beans (canned, 1 cup): 287</td>
  </tr>

  <tr>
    <td>Chocolate chip cookie (from packaged dough): 59</td>
    <td>Coffee (regular, brewed from grounds, black): 2</td>		
    <td>Yellow cake with chocolate frosting (one piece): 243</td>
    <td>Cola (12 ounces): 136</td>
    <td>Graham cracker (plain, honey, or cinnamon): 59</td>
  </tr>
  <tr>
    <td>Tuna (light, canned in water, drained, 3 ounces): 100</td>
    <td>Spaghetti sauce (marinara, ready to serve, 4 ounces): 92</td>		
    <td>White wine (sauvignon blanc, 5 ounces): 121</td>
    <td>Salsa (4 ounces): 35</td>
    <td>Rice (white, long grain, cooked, 1 cup): 205</td>
  </tr>
  <tr>
    <td>Red wine (cabernet sauvignon, 5 ounces): 123</td>
    <td>Ranch salad dressing (2 tablespoons): 146</td>		
    <td>Spaghetti (cooked, enriched, without added salt, 1 cup): 221</td>
    <td>Shrimp (cooked under moist heat, 3 ounces): 84
 </td>
    <td>Pretzels (hard, plain, salted, 1 ounce): 108</td>
  </tr>
  <tr>
    <td>Raisins (1.5 ounces): 130
</td>
    <td>Milk (2 percent milk fat, 8 ounces): 122</td>		
    <td>Potato, medium (baked, including skin): 161</td>
    <td>Hot dog (beef and pork): 137</td>
    <td>Green beans (canned, drained, 1 cup): 40</td>
  </tr>
  <tr>
    <td>Ice cream (vanilla, 4 ounces): 145</td>
    <td>Ground beef patty 193 (15 percent fat, 4 ounces, pan-broiled):</td>		
    <td>Oatmeal (plain, cooked in water without salt, 1 cup): 147</td>
    <td>Eggs : 150 </td>
    <td>Granola bar (chewy, with raisins, 1.5-ounce bar): 193</td>
  </tr>
  <tr>
    <td> Pizza (pepperoni, regular crust, one slice): 298</td>
    <td>Peanuts roasted : 570</td>		
    <td>Pork chop (center rib, boneless, broiled, 3 ounces): 221</td>
    <td>Apples : 45</td>
    <td>Mustard, yellow (2 teaspoons): 6</td>
  </tr><tr>
    <td>Potato chips (plain, salted, 1 ounce): 155</td>
    <td>Jelly doughnut: 289</td>		
    <td>Mixed nuts (dry roasted, with peanuts, salted, 1 ounce): 168</td>
    <td> Peanut butter (creamy, 2 tablespoons): 180</td>
    <td>Orange juice (frozen concentrate, made with water, 8 ounces): 112</td>
  </tr>
</table>

</body>
</html>




