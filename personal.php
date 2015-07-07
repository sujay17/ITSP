<?php session_start(); ?>
<html>
<body>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<style type="text/css">
h1  
{
	text-align: center; 
	text-decoration: underline; 
	color:black;
    
}
 
#photo
{
	position: absolute; 
	left: 20px ;
	top: 100px ; 
}

#file_upload
{
	position: absolute;
	left: 120px;
	top: 340px;
}

.pos_right
{
	position: relative; 
	left: 350px;
	bottom: 0px;
	line-height: 150%;
	color: black;
	font-weight:900;
}
#name
{
	position: relative;
	left: 25px ;
	top:320px;
	color: black ;
	font-weight:bold;
} 
#table1
{
	position: relative; 
	top: 120px ;
	margin-left: 10px ; 
	border-color: black ;
	
	
}
body
{
	background-color: #ADD8E6;
	background-image: url("pic7.jpg");
	background-size: 100%;
    background-repeat: no-repeat;
}
	



.zoom
{
	zoom:150%;
}



#table2
{
	position: relative;
	bottom: 275px ;
	left: 700px ;
	border-style: solid ; 
	border-color: red ;
}



.color{
	color:black;
	text-decoration: underline;
}

.menu-wrap {
    width:100%;
    
    position:relative;
    top:-465px;
    left:100px;
}
 
.menu {
    width:1000px;
    margin:0px auto;
}
 
.menu li {
    margin:0px;
    list-style:none;
  
}
 
.menu a {
    transition:all linear 0.15s;
    color:#919191;
}
 
.menu li:hover > a, .menu .current-item > a {
    text-decoration:none;
    color:#be5b70;
}
 
.menu .arrow {
    font-size:11px;
    line-height:0%;
}
 
/*----- Top Level -----*/
.menu > ul > li {
    float:left;
    display:inline-block;
    position:relative;
    font-size:19px;
}
 
.menu > ul > li > a {
    padding:10px 40px;
    display:inline-block;
    text-shadow:0px 1px 0px rgba(0,0,0,0.4);
}
 
.menu > ul > li:hover > a, .menu > ul > .current-item > a {
    background:#2e2728;
}
 
/*----- Bottom Level -----*/
.menu li:hover .sub-menu {
    z-index:1;
    opacity:1;
}
 
.sub-menu {
    width:160%;
    padding:5px 0px;
    position:absolute;
    top:100%;
    left:0px;
    z-index:-1;
    opacity:0;
    transition:opacity linear 0.15s;
    box-shadow:0px 2px 3px rgba(0,0,0,0.2);
    background:#2e2728;
}
 
.sub-menu li {
    display:block;
    font-size:16px;
}
 
.sub-menu li a {
    padding:10px 30px;
    display:block;
}
 
.sub-menu li a:hover, .sub-menu .current-item a {
    background:#3e3436;
}


</style>
</head>

<h1> Fast_medix </h1> 
<?php

require_once "config.php";

$user=$_SESSION['logged_in_patient'];

$sql= "SELECT * FROM patient WHERE username='$user'";
$row=$conn->query($sql);
foreach($row as $single){

?>

<?php echo '<img id="photo" src="data:image/jpeg;base64,'.base64_encode( $single['photo'] ).'" style="width:304px;height:228px" />'; ?>

<form id="file_upload" action="file_upload.php" method="post" enctype="multipart/form-data">
<input type="file" name="file_upload" />
<input type="submit" value="upload"/>
</form>
<font type="bold">

<p id="name"> Vaccination Details : </p> 
<p class="pos_right"> Name : <?php echo $single['name']?></p>
<p class="pos_right"> Date of birth: <?php echo $single['birthday']?></p>
<p class="pos_right"> Height : <?php echo $single['height']?> cm</p>
<p class="pos_right"> Weight : <?php echo $single['weight']?> kg</p>
<p class="pos_right"> Previous Operative History: <?php echo $single['history']?></p>
<p class="pos_right"> Allergy : <?php echo $single['allergy']?></p>

<div>
<td>
<table border ="3" style="width:50%" id="table1" cellpadding="0" cellspacing="0">
 
<tr height="50px">
<td align="center" id="left" class="color"><b>No.</b></td>
<td align="center" id="left_1" class="color"><b>Vaccination</b></td>
<td align="center" id="left_1" class="color"><b>Y OR N </b></td>
<td align="center" id="left_2" class="color"><b>Date Taken  </b></td>
<td align="center" id="left_2" class="color"><b>Booster Dose </b></td>
</tr>
 

<tr height="30px">
<td>1</td>
<td>Polio</td>
<td>
<p><?php  echo $single['polio_taken'] ?></p>
</td>
</select>

<td><?php  echo $single['polio_date'] ?></td>
<td>
<p> <?php  echo $single['polio_booster'] ?> </p>
</td>
</tr>

<tr height="30px">
<td>2</td>
<td>Measles </td>
<td>
<p> <?php  echo $single['measles_taken'] ?></p>
</td>
</select>
<td><?php  echo $single['measles_date'] ?></td>
<td>
<p> <?php  echo $single['measles_booster'] ?> </p>
</td>
</select>
</tr>
 

 <tr height="30px">
<td>3</td>
<td>SmallPox</td>
<td>
<p><?php  echo $single['smallpox_taken'] ?></p>
</td>
</select>
<td><?php  echo $single['smallpox_date'] ?></td>
<td>
<p> <?php  echo $single['smallpox_booster'] ?> </p>
</td>
</tr>
 

 <tr height="30px">
<td>4</td>
<td>Rabies</td>
<td>
<p> <?php  echo $single['rabies_taken'] ?> </p>
</td>
</select>
<td><?php  echo $single['rabies_date'] ?></td>
<td>
<p> <?php  echo $single['rabies_booster'] ?> </p>
</td>
</tr>

<tr height="30px">
<td>5</td>
<td>BCG</td>
<td>
<p> <?php  echo $single['bcg_taken'] ?> </p>
</td>
</select>
<td><?php  echo $single['bcg_date'] ?></td>
<td>
<p> <?php  echo $single['bcg_booster'] ?> </p>
</td>
</tr>

<tr height="30px">
<td>6</td>
<td>Tetanus</td>
<td>
<p> <?php  echo $single['tetanus_taken'] ?> </p>
</td>
</select>
<td><?php  echo $single['tetanus_date'] ?></td>
<td>
<p> <?php  echo $single['tetanus_booster'] ?>  </p>
</td>
</tr>

<?php }?>
</font>

</table>

</div>

<div class="menu-wrap" >
    <nav class="menu">
        <ul class="clearfix">
            <li><a href="diet.php">Diet</a></li>
            <li><a href="index_doctor.html">Prescription</a>
            	
            	<ul class="sub-menu">
            	<li><a href="pre_1.php">Prescription-1</a></li>
            	<li><a href="pre_2.php">Prescription-2</a></li>
            	<li><a href="pre_3.php">Prescription-3</a></li>
            	<li><a href="pre_4.php">Prescription-4</a></li>
            	<li><a href="pre_5.php">Prescription-5</a></li>
            	<li><a href="index_doctor.html">New prescription </a></li>
            	</ul>

            </li>
            <li><a href="quickstart.html">Upload Reports</a></li>

            <li><a href="Signupform_update.php">Settings</a></li>
            <li><a href="logout.php">Log Out </a></li>

        </ul>
    </nav>
</div>




</body>

</html>
