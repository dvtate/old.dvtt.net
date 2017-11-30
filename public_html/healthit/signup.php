<?php

	$unerr = false;
	$imgerr = "";

	// creates a file in a directory on the server
	function createfilewithcontents($dir, $file, $txt){
		// absolute path to directory
		$absdir = dirname(__DIR__) . "/" . $dir;

		mkdir($absdir);

		// give permissions needed to make the file
		if(chmod($absdir, 0666)) {
			$fo = fopen($absdir . "/" . $file, "w") or die($php_errormsg);
			fwrite($fo, $txt);
			fclose($fo);
		} else {
			die("error: chmod failed, contact tate: toast27@gmail.com");
		}
	}

	// converts blocks & voids html
	function convertchars($msg){
		$msg = str_replace("<", "&lt;", $msg);//void html
		$msg = str_replace("\\\\n", "&#92;n",$msg);//html char voids '\n'
		$msg = str_replace("\n", "<br/>",$msg);
		$msg = str_replace("\\\\t", "&#92;t",$msg);//html char voids '\t'
		$msg = str_replace("\t", "&#09;",$msg);//tab-char
		$msg = str_replace("\'", "&#39;",$msg);// ' apostrophe
		$msg = str_replace('\"', "&#34;",$msg);// " double quote
		$msg = str_replace("\\\\", "&#92;",$msg);// \
		//blocks:
		$msg = processblocks("[underline]", "[/underline]", $msg);
		$msg = str_replace("[underline]","<u>",$msg);
		$msg = str_replace("[/underline]","</u>",$msg);
		$msg = processblocks("[bold]", "[/bold]", $msg);
		$msg = str_replace("[bold]","<b>",$msg);
		$msg = str_replace("[/bold]","</b>",$msg);
		return $msg;
	}

	// adds start and end tags to make balanced content
	function processblocks($startblock, $endblock, $msg){
		$diff = countmissingends($startblock, $endblock,$msg);
		if ($diff > 0) // if too many start blocks
			for ($i = 0; $i < $diff; $i++)
				$msg .= $endblock;
		elseif ($diff < 0) { // too many end tags
			$msgholder = $msg;
			$msg = "";
			for ($i = 0; $i > $diff; $i--)
				$msg .= $startblock;
			$msg .= $msgholder;
		}
		return $msg;
	}

	// returns difference between the number of starting tags and ending tags
	function countmissingends($startblock, $endblock, $msg){
		$testmsg = $msg;$startnum=substr_count($testmsg, $startblock);
		$testmsg = $msg;$endnum=substr_count($testmsg, $endblock);
		return $startnum - $endnum;
	}

	// remove spaces from string ( why is this here?)
	function removespaces($str){
		return str_replace(' ', '', $str);
	}


	// makes the new account and directory
	function gemkonto($pw, $un, $tag, $intro){
		// user's directory
		$dir = $_POST["cost"] . "/" . $un;

		//if(uploadprofileimage($un))return false; #rewrite function
		// make password file (lazy and insecure)
		createfilewithcontents($dir, "key.dontserve", $pw);
		// make tagline file
		createfilewithcontents($dir, "tag.txt", $tag);
		// make intro file
		createfilewithcontents($dir, "intro.txt", $intro);
		// make name file
		createfilewithcontents($dir, "name.txt", convertchars($_POST["navn"]));

		// make image URL file (until uploadprofileimage() gets fixed)
		makefotourlfile($un);
		// make contact file
		makecontactfile($dir);
		// make index.php from template
		makedefault($dir);
		// add the doctor to the drlist
		addilist($un);

		// log them in
		setcookie("healthitga-user", $username, time() + (86400 * 30), "/");
		setcookie("healthitga-url", "//dvtate.com/healthit/" . $_POST["cost"]
			. "/" . $un, time() + (86400 * 30), "/");

		// send user to their homepage
		header("Location: " . "//dvtate.com/healthit/" . $_POST["cost"] . "/" . $un);


                /*TODO:
                *copy & paste default.php <<DONE
                *add user to drlist.php <<DONE
                *make edit.php
                *       +make template <<
                *       +add file to server <<
                *       +make copy and paste code <<
                *Make user cookies <<DONE (alligned with login.php)
                *redirect to user homepage <<NOT WORKING (try replacing header request w/ javascript)
                */
	}
	function makedefault($dir){
		// copy the examle profile
		$examplepage = file_get_contents("example_profile.dontserve");
		createfilewithcontents($dir, "index.php", $examplepage);
	}

	// add the user to the list for their cost type
	function addilist($un){
		//the drentry code
		$drentry = "
				<a href=\"//dvtate.com/healthit/".$_POST["cost"]."/".$un."/\"><div class=\"pagebox\">
					<img class=\"profileimg\" alt=\"user-foto\" src=\"<?php echo file_get_contents(dirname(__DIR__).'/".$un."/imgurl.txt'); ?>\"/>
					<div class=\"om-dr\">
						<span class=\"omdr-navn\"><?php echo file_get_contents(dirname(__DIR__).'/".$un."/name.txt'); ?></span><hr class=\"navn-tag\"/>
						<span class=\"omdr-tag\"><?php echo file_get_contents(dirname(__DIR__).'/".$un."/tag.txt'); ?></span>
					</div>
				</div></a>
		";
		$filecontents = file_get_contents("/srv/http/healthit/" . $_POST["cost"] . "/inde.php");
		$filecontents = str_replace("<!--php - finde og erstatte med og ny konto-->",
			"<!--php - finde og erstatte med og ny konto-->\n				" . $drentry, $filecontents);
		file_put_contents("/srv/http/healthit/" . $_POST["cost"] . "/index.php", $filecontents);
	}

	//make contact file
	function makecontactfile($dir){
		$fon = trim($_POST["phone"]);
		$email = trim($_POST["email"]);
		$txt = "<ul>";
		if ($fon != "")
			$txt .= "<li><b><u>Phone</u>:</b>&nbsp; " . $fon . "</li>";
		if ($email!="")
			$txt .= "<li><b><u>Email</u>:</b>&nbsp;<a href=\"mailto:" . $email . "\" target=\"_top\">" . $email . "</li>";
		createfilewithcontents($dir, "contact.txt", $txt);
	}
	function uploadprofileimage($un){
		/*file upload code
			///code for file upload (not working)
			///called via "if(uploadprofileimage($un))return false;" in the gemkonto() function before the rest of the code
			$dir="healthit/".$_POST["cost"]."/".$un;//user's directory
			createfilewithcontents($dir,"imgurl.txt", "//dvtate.com/healthit/dr.png");
			if(!is_uploaded_file($_FILES["foto"]["tmp_name"])){
				if($_FILES["foto"]["size"]<1000000){//max upload size is 5M. Will only allow images < 1M.
					if(move_uploaded_file($_FILES["foto"]["tmp_name"],$dir.removespaces($_FILES["foto"]["tmp_name"])))
						createfilewithcontents($dir,"imgurl.txt","//dvtate.com/healthit/".$_POST["cost"]."/".$un."/".removespaces($_FILES[file_up][name]));
					else echo "<h1>Fuck!</h1>There was an error!";
				}else{$GLOBALS["imgerr"]=true;
					echo "<script>var phperrs=true;function failedinput(){alert('The profile photo you entered is too big (max 1Mb).');}</script>";
					return true;//failure
				}
			}else{//imgurl with default profile photo
				createfilewithcontents($dir,"imgurl.txt", "//dvtate.com/healthit/dr.png");
			}return false;//success
		*/return false;
	}

	// make profile img url file
	function makefotourlfile($un){
		$dir = $_POST["cost"] . "/" . $un;//user's directory
		if (trim($_POST["img-url"]) == "")//default behavior
			createfilewithcontents($dir, "imgurl.txt", "//dvtate.com/healthit/dr.png");
		else
			createfilewithcontents($dir, "imgurl.txt", trim($_POST["img-url"]));//custom url file
	}

	// main
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		$username = $_POST["konto"];
		$type = $_POST["cost"];
		if (file_exists(dirname(__DIR__) . "/" . $_POST["cost"] . "/" . $_POST["konto"])
			|| trim($username) === "")
			$unerr=true;
		elseif (!($unerr || $pwerr || $tagerr || $contacterr)) // create user account
			gemkonto($_POST["password"],
					 removespaces($_POST["konto"]),
					 convertchars($_POST["tagline"]),
					 convertchars($_POST["intro"]));
		else
			echo "<script>var phperrs=true;function failedinput(){alert(\"There are problems with the data you submitted please correct them\");}</script>";
	}
?><!DOCTYPE html><html>
	<head>
		<link rel="icon" type="image/png" href="//dvtate.com/healthit/dr.png" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<meta name="description" content="Doctors, Create your profile on HealthIT.ga. Find patients using the modern techniques of telemedicine."/>
		<title>Signup - HealthIT</title>

		<script src="https://apis.google.com/js/platform.js" async defer></script>
		<link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>

		<link rel="stylesheet" type="text/css" href="//dvtate.com/styles/m.nyental.css"/>
		<style type="text/css">
			div.pagebox {
				background-color: #fff;
				border: 1px solid #333;
				padding: 10px; margin: 3px 0;
				border-left: 0; border-right: 0;
			}
			div.page {
				position: absolute;
				top: 8%; bottom: 0; left: 0; right: 0;
				overflow: auto;
				background-color: #eee;/*modify to fix scrolling glitch on iPhone*/
			}
			div.page > a {
				color: #000;
				text-decoration: none;
			}
			div.showfakeback{
				color: #fff;
				margin: 0 auto; padding: 15px;

				background-color: #000;
				background-attachment: fixed;
				background-image: url(//dvtate.com/styles/baggrund.png);

				box-shadow: 0px 0px -0.5em #000;
			}
			div.page-top {
				position: absolute;
				top: 8%; left: 0; right: 0;
				overflow:auto;
			}
			span.tobtn > a { color: #000; text-decoration: none; }
			span.tobtn div.pagebtn {
				padding: 10px 25px;
				color: #000;
				width: 250px;
				background-color: lightblue;
				display: inline;
			}
			span.tobtn div.pagebtn:hover { background-color: blue; }
			div.big_choice-btn {
				color: #000;
				margin: 5px 2%; padding: 10px;
				cursor: pointer;
				background-color: lightgrey;
				border-left: 10px solid red;
			}
			input.mobile { padding: 10px 25px; display: inline-block; }
			div.inputfield {
				background-color: #fff;/*border:1px solid #333;*/
				box-shadow: 3px 5px 0.25em #333;
				padding: 10px;
				margin: 3px 0; margin-left:1%;
				border-right: 0;
				border-left: 10px solid green;
			}
			div.inputfield-optional{
				background-color: #fff;/*border:1px solid #333;*/
				box-shadow: 3px 5px 0.25em #333;
				padding: 10px;
				margin: 3px 0; margin-left: 1%;
				border-right: 0; border-left: 10px solid blue;
			}
			img#profilepreview {
				width: 25vw; height: 25vw; /*vw=%viewport-width*/
				border-radius: 5px;
				border: 1px solid #333;
				background-color: #fff;
			}
			input#tagline { width: 90%; }
			input#send-data {
				padding: 25px;
				width: 90%;
				border: 1px solid #000;
				box-shadow: 0px 0px 0.5em lightgreen;
			}
			input#send-data:hover { background-color: #eaeaea; }
			textarea#intro { width: 95%; }
			input#profileimgurlin:invalid { color: red; }

		</style><script type="text/text/javascript">
		var menuopen = false;
		// show/hide hamburger menu
		function shsidemenu(){
			var sidemenu = document.getElementById("sidemenu"),
			dim=document.getElementById("dimbag");
			if(menuopen==false){dim.style.display="block";
				dim.style.opacity="0.8";sidemenu.style.width="75%";
			}else{dim.style.display="none";dim.style.opacity="0";
				sidemenu.style.width="0%";
			}menuopen=!menuopen;
		}
		</script><script type="text/javascript">
			var drtype, godtimg = false;

			function loadFile(event){ // renders profile image
				document.getElementById("profilepreview").src =
					URL.createObjectURL(event.target.files[0]);
				imgup = true;
				chkin(); // show verification on image upload
			};

 			// send user to specified url
			function redirect(url){
				window.location.assign(url);
			}

			function clickradiobox(pris){//select dr.type from styled divs
				document.getElementById("pris").value = pris;
				drtype = pris;
				if (pris == "free") {
					document.getElementById("gratisbox").style.borderLeftColor = "blue";
					document.getElementById("dyrtbox").style.borderLeftColor = "darkgrey";
				} else {
					document.getElementById("dyrtbox").style.borderLeftColor = "blue";
					document.getElementById("gratisbox").style.borderLeftColor = "darkgrey";
				}

				// apply changes to form (could validate username)
				chkin();
			}

			// is user input valid? style page to provide feedback
			function chkin(){
				var errors = false;
				mkusernamesample();

				// has username
				if (document.getElementById("usrnavn").value == ""){
					errors = true;
					document.getElementById("navnfield").style.borderLeftColor = "red";
				} else
					document.getElementById("navnfield").style.borderLeftColor = "green";

				// has price-level
				if (document.getElementById("urlsuffix").value == ""
					|| document.getElementById("pris").value == "undefined")
				{
					errors = true;
					document.getElementById("usernamefield").style.borderLeftColor = "red";
				} else
					document.getElementById("usernamefield").style.borderLeftColor = "green";

				// has password and passwords match
				if  (document.getElementById("password").value == "" || document.getElementById("chkpassword").value == ""
					|| document.getElementById("password").value != document.getElementById("chkpassword").value
				) {
					errors = true;
					document.getElementById("passwordfield").style.borderLeftColor = "red";
				} else
					document.getElementById("passwordfield").style.borderLeftColor="green";

				// has tagline (optional)
				if (document.getElementById("tagline").value != "")
					document.getElementById("taglinefield").style.borderLeftColor = "green";
				else
					document.getElementById("taglinefield").style.borderLeftColor = "blue";

				// has bio/intro (optional)
				if (document.getElementById("intro").value != "")
					document.getElementById("introfield").style.borderLeftColor="green";
				else
					document.getElementById("introfield").style.borderLeftColor="blue";

				// provides one of (email, phone)
				if ((document.getElementById("phone").value == "") != (document.getElementById("email").value == ""))
					document.getElementById("contactfield").style.borderLeftColor="blue";

				// provides neither email nor phone
				else if (document.getElementById("phone").value==""&&document.getElementById("email").value==""){
					errors = true;
					document.getElementById("contactfield").style.borderLeftColor="red";

				// provides both phone and email
				} else
					document.getElementById("contactfield").style.borderLeftColor="green";


				// has valid profile url
				if (document.getElementById("profileimgurlin").value == "") { // url not entered
					document.getElementById("profilefoto").style.borderLeftColor = "blue";
					document.getElementById("profilepreview").src = "//dvtate.com/healthit/dr.png";
					document.getElementById("profileimgurlin").style.color = "#000";
				} else {
					document.getElementById("profilepreview").src =
						document.getElementById("profileimgurlin").value;

					// check img for errors
					errors = !!(checkimg() + errors);

				}
				document.getElementById("send-data").hidden = errors;//show submit button if input is good
			}


			function goodimg(){
				if (document.getElementById("profileimgurlin").value != "") {
					vargodt = godtimg;
					if (document.getElementById("profileimgurlin").value.match("//") != null)
						godtimg = true;
					else
						badimg();
					if (!vargodt)
						chkin();
					return true;
				} return false;
			}
			function badimg(){
				vargodt = godtimg;
				godtimg = false;
				if (vargodt)
					chkin();
			}
			function chkimg(){
				if (godtimg) { // user img is good
					document.getElementById("profilefoto").style.borderLeftColor = "green";
					document.getElementById("profilepreview").src = document.getElementById("profileimgurlin").value;
					document.getElementById("profileimgurlin").style.color = "#000";
				} else { // URL invalid
					document.getElementById("profilefoto").style.borderLeftColor = "red";
					document.getElementById("profileimgurlin").style.color = "red";
					return true;
				}
				return false;
			}

			function mkusernamesample(){ // shows url after modifications
				document.getElementById("getusername").innerHTML=
					document.getElementById("urlsuffix").value.replace(/\s+/g,'');
				document.getElementById("getdrtype").innerHTML = drtype;
			}
			function addblock(type){ // f\E6rre end p\E5 chatroomet
				if (type == 2)
					document.nydoctor.intro.value += "[underline]put text here[/underline]";
				else if (type == 1)
					document.nydoctor.intro.value += "[bold]put text here[/bold]";
				chkin();
			}//-->
		</script><script type="text/javascript"><!--//Google Analytics
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
			ga('create', 'UA-59746939-2', 'auto');ga('send', 'pageview');//-->
		</script>
	</head><body onLoad="chkin()">

		<!-- navbar -->
		<div class="topbar">
			<img src="//dvtate.com/styles/ham.png" id="hamburger" align="left" alt="||Menu" onclick="shsidemenu()"/>
			<a href="//dvtate.com/healthit/"><img src="//dvtate.com/styles/hus.png" id="hjem" align="right" alt="Home" onclick=""/></a>
		</div><div class="sidemenu" id="sidemenu">
			<a href="//dvtate.com/healthit/">Home</a><br/>
			<a href="//dvtate.com/healthit/aboutus/">About Us</a><br/>
			<a href="//dvtate.com/healthit/login.php">Login (Doctors)</a><br/>
			<a href="//dvtate.com/healthit/dr-type.php">Find a Doctor</a><br/>
		</div><div id="dimbag" onclick="shsidemenu()"></div>


		<div class="page">
			<form  action="signup.php" id="nydoctor" name="nydoctor" method="post">
				<input type="text" name="cost" required="true" id="pris" value="undefined" hidden="true" />
				<div class="showfakeback">
					<div class="big_choice-btn" id="gratisbox" onclick="clickradiobox('free')">
						<h2>I am willing to offer (donate) my service to those who are in need of it at no cost.</h2>
					</div><div class="big_choice-btn" id="dyrtbox" onclick="clickradiobox('paid')">
						<h2>My time costs money. My services are for paying customers only.</h2>
					</div>
				</div><br/>

				<div class="inputfield" id="navnfield"><h3><b>Full Name:</b></h3>
					<input type="text" name="navn" id="usrnavn" class="mobile"
					 onKeyUp="chkin()" required="true" placeHolder="Dr. John Smith"/>
				</div><br/>

				<div class="inputfield" id="usernamefield"><h3><b>Username:</b></h3><?php if($unerror)echo "<span color=\"red\">*Pick another username</span>"; ?>
					<h6>This will be your URL. Alpha-numeric characters only please, also no spaces.</h6>
					<input type="text" name="konto" class="mobile" onKeyUp="chkin()" required="true" id="urlsuffix" placeHolder="DRSmith"/>
					<div style="border:1px solid #333;border-radius:4px;font-size:14px;display:inline;"><b>Your URL:</b>&nbsp;&nbsp;
						<pre style="display:inline">dvtate.com/healthit/<span id="getdrtype">undefined</span>/<span id="getusername"></span></pre>
					</div>
				</div><br/>

				<div class="inputfield" id="passwordfield">
					<h3><b>Password:</b></h3>
					<h6>Please remember your password.</h6>
					<input type="password" name="password" class="mobile" onKeyUp="chkin()"
					 required="true" id="password" placeHolder="password"/>
					<input type="password" class="mobile" onKeyUp="chkin()"
					 required="true" id="chkpassword" placeHolder="re-enter password"/>
				</div><br/>

				<div class="inputfield" id="contactfield">
					<h3><b>Contact Info:</b></h3>
					<h6>How do you want potential patients to contact you?</h6>
					<b>Email:</b><input type="email" name="email" class="mobile"
					 onKeyUp="chkin()" id="email" placeHolder="example@gmail.com"/>
					<br/><b>Phone:</b><input type="tel" name="phone" class="mobile"
					 onKeyUp="chkin()" id="phone" placeHolder="+ 1 (555) 555-5555"/>
				</div><br/>

				<div class="inputfield-optional" id="profilefoto">
					<h3><b>Profile photo:</b></h3> <?php
						/*
						if ($imgerr)
							echo "<span color=\"red\">*Image must be less than 1Mb.</span>";
						*/
					?>
					<img src="//dvtate.com/healthit/dr.png" id="profilepreview" onLoad="goodimg()" onError="badimg()"/>
					<input type="file" accept="image/*" onChange="loadFile(event)"
					 name="foto" disabled/>*Sorry, image uploads haven't been implemented. Please upload your picture to <a href="http://postimg.org/" target="_blank" title="free image hosting">postimg.org</a>.<br/>
					Image URL: <input type="url" class="mobile" id="profileimgurlin"
					 name="img-url" onKeyUp="chkin()" placeHolder="//dvtate.com/healthit/dr.png" />
				</div><br/>

				<div class="inputfield-optional" id="taglinefield"><h3><b>Tagline:</b></h3>
					<h6>Your tagline is what draws in patients. Keep it under a sentence. It is best if it describes who they will be getting service from.</h6>
					<input type="text" class="mobile" name="tagline" onKeyUp="chkin()"
					 id="tagline" placeHolder="ie- Retired Neuroseurgon, Student in Medicine, etc."/>
				</div><br/>

				<div class="inputfield-optional" id="introfield"><h3><b>Introduction:</b></h3>
					<h6>Your introduction should tell people about you</h6>
					<div id="insertbtns">Styled content:
							<input type="button" id="block" value="Bold" onclick="addblock(1)"/>
							<input type="button" id="block" value="Underline" onclick="addblock(2)"/>
					</div>
					<textarea id="intro" onKeyUp="chkin()" rows="10" cols="auto" name="intro"
					 form="nydoctor" placeHolder="Tell us about yourself"></textarea>
				</div><br/>

				<center><input type="submit" id="send-data" value="Create Account" onClick="chkin()"></center>

			</form>
		</div>
	</body>
</html>
