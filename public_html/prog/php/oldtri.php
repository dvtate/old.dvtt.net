<!DOCTYPE html>
<html>
<head>
<style type="text/css">
	body { 
		color: black;
		background: white;
	}
	h3 {
		font-style: bold;
	}
	h5 {
		text-decoration: underline;
	}
	h6 {
		text-decoration: through-line;
	}
</style>
<title>Tate's Triangle Area Calculator (coordiates)</title>
<span style="text-decoration: underline; ">
	<h1>Triangle Area from Coordinates</h1>
</span>
<ul id="aboutwebpage">
	<li><span style="text-decoration: underline;">Developed By</span>: (Dustin Van) Tate Testa</li>
	<li><span style="text-decoration: underline;">Purpose</span>: To find the area between any 3 coordinates.</li>
</ul>
<h5>input the required data into the text fields</h5><hr>
</head>
<body>
<?php $goja = 0; ?>
<form action="oldtri.php" method="post">
	<p>
	-<span style="text-decoration: underline;">
		1st Coordinate
	</span>
	:   (<input type="text" name="ax" required="true" />
	, <input type="text" name="ay" required="true" /> ) </p>
	<p>
	-<span style="text-decoration: underline;">
		2nd Coordinate
	</span>
	:   (<input type="text" name="bx" required="true" />
	, <input type="text" name="by" required="true" /> ) </p>
	<p>
	-<span style="text-decoration: underline;">
		3rd Coordinate
	</span>
	:   (<input type="text" name="cx" required="true" />
	, <input type="text" name="cy" required="true" /> ) </p>
	<input type="submit" name="areafinder" value="Find Area" onClick="<?php $goja = 1; ?>" />
</form>
<?php
error_reporting(0);//hides errors
function main(){
	function godtcalc( $equation ){
	    // Remove whitespaces
	    $equation = preg_replace('/\s+/', '', $equation);
	    $number = '((?:0|[1-9]\d*)(?:\.\d*)?(?:[eE][+\-]?\d+)?|pi|p)'; // What is a number
	    $functions = '(?:sinh?|cosh?|tanh?|acosh?|asinh?|atanh?|exp|log(10)?|deg2rad|rad2deg|sqrt|pow|abs|intval|ceil|floor|round|(mt_)?rand|gmp_fact)'; // Allowed PHP functions
	    $operators = '[\/*\^\+-,]'; // Allowed math operators
	    $regexp = '/^([+-]?('.$number.'|'.$functions.'\s*\((?1)+\)|\((?1)+\))(?:'.$operators.'(?1))?)+$/'; // Final regexp, heavily using recursive patterns
	    if (preg_match($regexp, $equation))
	    {
	        $equation = preg_replace('!pi|p!', 'pi()', $equation); // Replace pi with pi function
	        eval('$result = '.$equation.';');
	    }else{
	        $result = FALSE;
	    }
	    return $result;
	}
	$ax = $_POST['ax'];
	$ay = $_POST['ay'];
	$bx = $_POST['bx'];
	$by = $_POST['by'];
	$cx = $_POST['cx'];
	$cy = $_POST['cy'];
	if($ax === FALSE || $ay === FALSE || $bx === FALSE || $by === FALSE || $cx === FALSE || $cy === FALSE){
		echo '<p>*You screwed up a coordinate.</p>';
		return 0;
	}
	elseif($ax == $bx && $bx == $cx && $cx == $ax && $ay == $by && $by == $cy && $cy == $ay){
		echo '<p>*The coordinates entered were all the same (no area).</p>';
		return 0;
	}
	elseif($ax == $bx && $bx == $cx && $cx == $ax xor $ay == $by && $by == $cy && $cy == $ay){
		echo '<p>*The coordinates entered formed a line (no area).</p>';
		return 1;
	}
	elseif($bx - $ax == 0){//error handling process
		#fyi: '@' is mute, alt. for 'on error resume next' i vbs
		//math process(var. realtionships)
		 //order changed(ABC=>CBA)
		@$base = Sqrt((pow(($cy - $by), 2)) + (pow(($cx - $bx), 2)));
		@$m1 = ($by - $cy) / ($bx - $cx);
		@$m2 = 0 - (1 / $m1);
		@$b1 = $by - ($m1 * $bx);
		@$b2 = $ay - ($m2 * $ax);
		@$x = ($b2 - $b1) / ($m1 - $m2);
		@$y = $m1 * $x  + $b1;
		@$height = Sqrt((pow(($y - $ay), 2)) + (pow(($x - $ax), 2)));
		$area2 = 0.5 * $base * $height;
		echo "<h6> please ignore this message: $base : $m1 : $m2 : $b1 : $b2 : $x : $y : $height => $area2</h6>";
		echo "<br><h3>The area of the triangle is $area2 square units.</h3>";
		return 2;
	}
	else{//regular process
		@$base = Sqrt((pow(($ay - $by), 2)) + (pow(($ax - $bx), 2)));
		@$m1 = ($by - $ay) / ($bx - $ax);
		@$m2 = 0 - (1 / $m1);
		@$b1 = $by - ($m1 * $bx);
		@$b2 = $cy - ($m2 * $cx);
		@$x = ($b2 - $b1) / ($m1 - $m2);
		@$y = $m1 * $x  + $b1;
		@$height = Sqrt((pow(($y - $cy), 2)) + (pow(($x - $cx), 2)));
		$area2 = 0.5 * $base * $height;
		echo "<h6> please ignore this message: $base : $m1 : $m2 : $b1 : $b2 : $x : $y : $height -=+> $area2</h6>";
		echo "<br><h3>The area of the triangle is $area2 square units.</h3>";
		return 2;
	}
	$goja = 0;
}
do {
main();
} while ($goja = 1);
?></body>
</html>
