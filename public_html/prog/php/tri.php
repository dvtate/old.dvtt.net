<!DOCTYPE html />
<?php /*I fear security vonurabilities...*/ ?>
<html>
	<!--last-edited: 9-17-2014<<=+++=>>by DV Tate Testa-->
	<head>		
		<link rel="stylesheet" type="text/css" href="//dvtate.com/styles/tristyle.css" />
		<link rel="stylesheet" type="text/css" href="//dvtate.com/styles/mystyle.css" /><!--default style for pages-->
		
		<style type="text/css">body {background-image: url(//dvtate.com/styles/fractal1.jpg);}</style>
		<title>Triangle Area Calculator (coordinates)</title>
		<div id="header" ><!--header-->
			<a href="//dvtate.com"><h1>Tate's Website</h1></a>
			<ul id="pages" >
				<li class="page"><a class="page" href="//dvtate.com" >Home</a></li>
				<li class="page"><a class="page" href="//dvtate.com/prog" >Programming</a></li>
				<li class="page"><a class="page" href="//dvtate.com/forge" >Blacksmithing</a></li>
				<li class="page"><a class="page" href="//dvtate.com/lab" >The Lab</a></li>
				<li class="page"><a class="page" href="//dvtate.com/tanks" >My Aquariums</a></li>
			</ul>
		</div><br/>
		<div id="path" class="main"><!--directory  pathway-->
			<p><a href="//dvtate.com/prog" >>Programming </a>
			<a href="//dvtate.com/prog/php">>PHP </a></p>
		</div><br/>
	</head>
	<body>
		<div class="main" >
			<?php $goja = 0; ?>
			<h1 class="pagnavn" >Triangle Area from Coordinates</h1>
			<ul id="aboutpage">
				<li><span style="text-decoration: underline;">Developed By</span>: (Dustin Van) Tate Testa</li>
				<li><span style="text-decoration: underline;">Purpose</span>: To find the area between any 3 coordinates.</li>
			</ul><hr/>
			<form action="tri.php" method="get">
				<ol>	
					<li id="coord1" >-<span>1st Coordinate</span>:<br/>
						(<input type="text" name="ax" required="true" />	, <input type="text" name="ay" required="true" /> )
					</li>
					<li id="coord2">-<span>2nd Coordinate</span>:<br/>
						(<input type="text" name="bx" required="true" />, <input type="text" name="by" required="true" /> ) 
					</li>
					<li id="coord3" >-<span>3rd Coordinate</span>:<br/>
						(<input type="text" name="cx" required="true" />, <input type="text" name="cy" required="true" /> ) </p>
					</li>
				</ol>
				<input  type="submit" name="areafinder" value="Find Area" onClick="<?php $goja = 1; ?>" />
			</form>
			<?php  #server-side
				error_reporting(0); // hides errors
				function main(){
					function godtcalc( $equation ){ #regular expressions
							$equation = preg_replace('/\s+/', '', $equation);//remove whitespace
							$number = '((?:0|[1-9]\d*)(?:\.\d*)?(?:[eE][+\-]?\d+)?|pi|p)'; // What is a number  (definition)
							$functions = '(?:sinh?|cosh?|tanh?|acosh?|asinh?|atanh?|exp|log(10)?|deg2rad|rad2deg|sqrt|pow|abs|intval|ceil|floor|round|(mt_)?rand|gmp_fact)'; // Allowed PHP functions(math)
							$operators = '[\/*\^\+-,]'; // Allowed math operators
							$regexp = '/^([+-]?('.$number.'|'.$functions.'\s*\((?1)+\)|\((?1)+\))(?:'.$operators.'(?1))?)+$/'; // Final regexp, heavily using recursive patterns
							if (preg_match($regexp, $equation)){//if input  = safe then  (process as code)
								$equation = preg_replace('!pi|p!', 'pi()', $equation); // Replace pi with pi function
								eval('$result = '.$equation.';'); //process input as code
							}else{
								$result = "bad"; //stops hackers
							}
							return $result; 
					}
					$ax = $_GET['ax']; $ay = $_GET['ay'];//collect coord.s from form
					$bx = $_GET['bx']; $by = $_GET['by'];
					$cx = $_GET['cx']; $cy = $_GET['cy'];
					@$ax = godtcalc($ax); @$ay = godtcalc($ay);//safe-eval  point a
					@$bx = godtcalc($bx); @$by = godtcalc($by);#'@' = mute.Silent line
					@$cx = godtcalc($cx); @$cy = godtcalc($cy);
					if($ax === "bad" || $ay === "bad" || $bx === "bad" || $by === "bad" || $cx === "bad" || $cy === "bad"){ //on-error.human
						echo '<p class="bad">*You screwed up a coordinate. <br/> these are math operators </p>';
						?>
							<table id="helptable" cell-padding="5px">
									<tr><th>OPERATOR/FUNCTION</th><th>MEANING</th><th>EXAMPLE</th></tr>
									<tr id="multiplydivide"><td>* | / </td><td>multiply & divide</td></tr>
									<tr id="minusadd"><td>+ | -</td><td>plus & minus/negate</td><td>'-5+6-2' = -1</td></tr>
									<tr id="expo"><td>pow()</td><td>exponents</td><td>'pow(3,2)' = 3^2  (3 squared)</td></tr>
									<tr id="sqrt"><td>Sqrt()</td><td>square route</td><td>'Sqrt(16)' = 4</td></tr>
									<tr id="trig"><td>sinh() | cosh()| tanh() |acosh() | asinh() | atanh()</td><td>trigonometric ratios</td><td>'sinh(40)' = sin(40) = sine of 40deg.</td></tr>
									<tr id="pi"><td>pi</td><td>the value of pi</td></tr>
									<tr id="abs"><td>abs()</td><td>absolute value</td><td>'abs(-5)' = |-5| = 5</td></tr>
									<tr id="opporder"><td> ( | ) </td><td> order of operations</td></tr>
								</table><br/>
							</div>
							<center>
								<a class="hostbtn" href="http://www.000webhost.com/" target="_blank"><img src="http://www.000webhost.com/images/80x15_powered.gif" alt="Web Hosting" width="80" height="15" border="0" /></a>
							</center>
						<?php
						return 0;
					}
					elseif($ax == $bx && $bx == $cx && $cx == $ax && $ay == $by && $by == $cy && $cy == $ay){//on-coordinates.same
						echo '<p class="bad" >*The coordinates entered were all the same (no area).</p>';
						echo '</div><center><a class="hostbtn" href="http://www.000webhost.com/" target="_blank"><img src="http://www.000webhost.com/images/80x15_powered.gif" alt="Web Hosting" width="80" height="15" border="0" /></a></center>';
						return 0;
					}
					elseif($ax == $bx && $bx == $cx && $cx == $ax xor $ay == $by && $by == $cy && $cy == $ay){ //on coordinates.linear
						echo '<p class="bad" >*The coordinates entered formed a line (no area).</p>';
						echo '</div><center><a class="hostbtn" href="http://www.000webhost.com/" target="_blank"><img src="http://www.000webhost.com/images/80x15_powered.gif" alt="Web Hosting" width="80" height="15" border="0" /></a></center>';
						return 1;
					}
					elseif($ax/ $ay == $bx / $by && $bx / $by == $cx / $cy && $cx / $cy == $ax / $ay){
						echo '<p class="bad" >*The coordinates entered formed a line (no area).</p>';
						echo '</div><center><a class="hostbtn" href="http://www.000webhost.com/" target="_blank"><img src="http://www.000webhost.com/images/80x15_powered.gif" alt="Web Hosting" width="80" height="15" border="0" /></a></center>';
						return 1;
					}
					elseif($bx - $ax == 0){//error handling process
						//math process(var. realtionships)
						 //order changed(ABC=>CBA) to prevent-->|ERROR: {divide by zero} in case of infinite slope|
						@$base = Sqrt((pow(($cy - $by), 2)) + (pow(($cx - $bx), 2)));
						@$m1 = ($by - $cy) / ($bx - $cx);
						@$m2 = 0 - (1 / $m1);
						@$b1 = $by - ($m1 * $bx);
						@$b2 = $ay - ($m2 * $ax);
						@$x = ($b2 - $b1) / ($m1 - $m2);
						@$y = $m1 * $x  + $b1;
						@$height = Sqrt((pow(($y - $ay), 2)) + (pow(($x - $ax), 2)));
						@$area2 = 0.5 * $base * $height;
						echo '<h6 class"scr">';
						echo " please ignore this message: $base : $m1 : $m2 : $b1 : $b2 : $x : $y : $height +>> $area2</h6>";
						echo '<center></div><br/><a class="hostbtn" class="ad" href="http://www.000webhost.com/" target="_blank"><img src="http://www.000webhost.com/images/80x15_powered.gif" alt="Web Hosting" width="80" height="15" border="0" /></a></center>';
						return 2;
					}
					else{  //regular process (default)
						@$base = Sqrt((pow(($ay - $by), 2)) + (pow(($ax - $bx), 2)));
						@$m1 = ($by - $ay) / ($bx - $ax);
						@$m2 = 0 - (1 / $m1);
						@$b1 = $by - ($m1 * $bx);
						@$b2 = $cy - ($m2 * $cx);
						@$x = ($b2 - $b1) / ($m1 - $m2);
						@$y = $m1 * $x  + $b1;
						@$height = Sqrt((pow(($y - $cy), 2)) + (pow(($x - $cx), 2)));
						@$area2 = 0.5 * $base * $height;
						echo '<h6 class"scr">';
						echo "please ignore this message: $base : $m1 : $m2 : $b1 : $b2 : $x : $y : $height ->> $area2</h6>";
						echo "<br><h3>The area of the triangle is $area2 square units.</h3>";
						echo '</div><center><a class="hostbtn" class="ad" href="http://www.000webhost.com/" target="_blank"><img src="http://www.000webhost.com/images/80x15_powered.gif" alt="Web Hosting" width="80" height="15" border="0" /></a></center>';
						return 2;
					}
					$goja = 0;
				}
				while ($goja = 1) {
					main();
				} 
			?>
		</div><!-- note - ik' mere-->
		<center>
			<a class="hostbtn" class="ad" href="http://www.000webhost.com/" target="_blank">
				<img src="http://www.000webhost.com/images/80x15_powered.gif" alt="Web Hosting" width="80" height="15" border="0" />
			</a>
		</center>
	</body>
</html>
