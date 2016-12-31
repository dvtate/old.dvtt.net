<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/><meta name="start-date" content="7-26-2015"/>
		<meta name="description" content="DV Tate Testa's Operating Systems Page: please recommend operating systems for my to try and maybe write about."/>
		<meta name="author" content="Dustin Van Tate Testa"/><title>Operating Systems - Tate's Website</title>
		<meta name="keywords" content="Tate testa Dustin Arch linux terminal debian ubuntu elementary open-source software"/>
		<link href='//fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="//dvtate.com/styles/nyental.css"/>
		<style type="text/css">body{min-width: 675px !important;}
			ul.opages{list-style-type:none;margin:0;padding:0;overflow:hidden;position:absolute;}
			li.opage{float:right;list-style-type:none;}
			a.opage{-webkit-transition:text-shadow 2s;transition:text-shadow 0.5s;
				font-family:'Ubuntu', 'Lucida Sans Unicode', 'Lucida Grande', Helvetica, sans-serif;
			}a.opage:link, a.opage:visited{display:block;width:150px;
				text-align:center;padding:4px;text-decoration:none;text-transform:none;
			}a#ubpl{color:#fff;background-color:#dd4814;}
			a#debpl{color:#fff;background-color:#eb003b;}
			a#archpl{color:#fff;background-color:#1793d1;}
			a#elempl{color:#fff;background-color:#000;}
			a#ubpl:hover, a#ubpl:active{background-color:#df4f1f;box-shadow:none !important;text-shadow:0px 0px 18px #fff;}
			a#debpl:hover, a#debpl:active{background-color:#d60750;box-shadow:none !important;text-shadow:0px 0px 18px #fff;}
			a#archpl:hover, a#archpl:active{background-color:#17aad1;box-shadow:none !important;text-shadow:0px 0px 18px #fff;}
			a#elempl:hover, a#elempl:active{background-color:#333;box-shadow:none !important;text-shadow:0px 0px 18px #fff;}
			input#postit, input#anotherosbtn{border:1px solid #000;background-color:#eaeaea;}
			input[name="os_2"],input[name="os_3"],input[name="os_4"]{display:none;}
			div.mine{background-color:#FFF;padding:2px 20px 5px 10px;margin:0% 7%;
				border-radius:4em;border-top-left-radius:0;border:3px solid blue;
				font-family:'Ubuntu', 'Lucida Sans Unicode', 'Lucida Grande', Helvetica, sans-serif;
			}div.dit{background-color:#FFF;padding:2px 20px 5px 10px;margin:0% 7%;
				border-radius:50px;border-bottom-right-radius:0;border:3px solid #454545;
				font-family:'Ubuntu', 'Lucida Sans Unicode', 'Lucida Grande', Helvetica, sans-serif;
			}div#nyos{border-left:20px solid red;margin-left:6%;margin-right:6%;}
			span#badinp{display:inline;}
		</style>
		<script type="text/javascript"><!--//
			var osnumber=1, os2open=false,os3open=false,os4open=false;
			function shownext(){osnumber++;//unhides and enables the input boxes
				if(osnumber==2){os2open=true;
					document.getElementById("os2").style.display="inline";
					document.getElementById("anotherosbtn").value="Suggest Another (2/4)";
				}else if(osnumber==3){os3open=true;
					document.getElementById("os3").style.display="inline";
					document.getElementById("anotherosbtn").value="Suggest Another (3/4)";
				}else{os4open=true;
					document.getElementById("os4").style.display="inline";
					document.getElementById("anotherosbtn").value="No Suggestions Left";
				}chkin();return;
			}function chkin(){//make left border red if there is missing content(if content is missing && inputbox is active)
				if(document.getElementById("os1").value.trim()==""||(document.getElementById("os2").value.trim()==""&&os2open==true)||(document.getElementById("os3").value.trim()==""&&os3open==true)||(document.getElementById("os4").value.trim()==""&&os4open==true)||document.getElementById("navn").value.trim()==""||document.getElementById("email").value.trim()==""){
					document.getElementById("nyos").style.borderLeft="20px solid red";
				}else{document.getElementById("nyos").style.borderLeft="20px solid green";}
			}
			function cdstory(){alert("When taking apart an old computer, I found an unlabled CD in the bay, I put it into my laptop"+
			"to see what was on it, after a minute or so of going through the files(looked strange), My [lousy] antivirus flared up with "+
			"two detections, I figured out later that there were some that got through.\n*Note: this was before I entered the world of linux :)))");}
			//-->
		</script>
		<script src="https://apis.google.com/js/platform.js" async defer></script><!--Google+1 btn-->
		<script type="text/javascript"><!--//Google Analytics
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
			ga('create', 'UA-59746939-2', 'auto');ga('send', 'pageview');//-->
		</script>
	</head><body onload="chkin()">
		<ul class="pages"><!--page-link menu-->
			<li class="page" id="home"><a class="here" href="//dvtate.com/">Home</a></li>
			<li class="page" id="icategory" onclick=""><a class="page">Hobbies</a>
				<ul class="dpages" id="hob">
					<li class="dpage"><a class="page" href="//dvtate.com/prog/">Programming</a></li>
					<li class="dpage"><a class="page" href="//dvtate.com/3d/">3d modelling</a></li>
					<li class="dpage"><a class="page" href="//dvtate.com/forge/">Blacksmithing</a></li>
					<li class="dpage"><a class="page" href="//dvtate.com/lab/">The Lab</a></li>
					<li class="dpage"><a class="page" href="//dvtate.com/tanks/">My Aquariums</a></li>
					<li class="dpage"><a class="page" href="//dvtate.com/os/">Operating Systems</a></li>
				</ul>
			</li>&nbsp;<li class="page" id="category"><a class="page" href="//dvtate.com/chat/">Chat</a></li>
			<li class="page" id="category"><a class="page" href="//dvtate.com/calc/">Calculators</a></li>
			<li class="page" id="category"><a class="page" href="//dvtate.com/school/">College</a></li>
		</ul><div class="main">
			<ul id="opages">
				<li class="opage"><a class="opage" id="archpl" href="//dvtate.com/os/arch/">Arch Linux</a></li>
				<li class="opage"><a class="opage" id="debpl" href="//dvtate.com/os/debian">Debian</a></li>
				<li class="opage"><a class="opage" id="ubpl" href="//dvtate.com/os/ubuntu">Ubuntu</a></li>
				<li class="opage"><a class="opage" id="elempl" href="//dvtate.com/os/elementary">Elementary OS</a></li>
			</ul><h2><strong>How  I got Started</strong></h2><ul>
				<p class="ind">My first desktop operating system other than Windows was Ubuntu 12.04, my friend Sebastian installed it onto a netbook which I had accidentally wiped the hard drive on. I was really surprised by Linux, I had seen some support for it on a few rare websites, (ie- <a href="http://www.monodevelop.com/" target="_blank" title="of all the websites I remembered, its the C# one that I remember the best... strange, eh?">MonoDevelop</a>), but I had figured, that it was just for computer nerds and it wouldn't have a [proper] desktop environment or would be almost impossible to use because everything is in the terminal, but my assumptions were completely wrong. I found Ubuntu very easy to work with, and when I couldn't figure something out, I could just Google it, and I learned how  to copy and paste into the terminal. Eventually, my main laptop (at the time) got a number of nasty viruses (<a onclick="cdstory()" style="color:blue;">some were my fault </a>) including the Sendori virus. So I tried Debian wheezy with KDE, but eventually settled on Debian Gnome. Eventually I got good enough to multi-boot, so by joining in the windows insider program, I got a temporary copy of windows 10, and then installed Arch Linux and Ubuntu, onto a laptop that I had to replace the hard drive on. I <span title="2016.12">now</span> have Arch Linux installed on all of my computers, and my desktop dual-boots (separate HDD) with windoze 10. I only dual-boot as I want to have a native windows installation to test software on (most of <a href="https://github.com/dvtate/">my software</a> is cross-platform). Given <a href="https://www.gnu.org/proprietary/malware-microsoft.en.html">the darker features of Windows 10</a>, I would not reccomend it to anyone.</p>
			</ul><center><img src="//dvtate.com/os/logos/deb.jpg" height="200px" alt="debian logo"/><img height="200px" src="//dvtate.com/os/logos/arch.png" alt="arch linux logo"/><img src="//dvtate.com/os/logos/ubuntu.png" height="200px" alt="ununtu logo" /><img src="//dvtate.com/os/logos/elem.png" height="200px" alt="elementary os logo" />
		</div><br/><?php
			$nameErr=$osErr=$emailErr=" ";#no content/bad format
			if($_SERVER["REQUEST_METHOD"]=="POST"){verify();}
			function verify(){//checks if data entered is valid
				echo "<script>alert(\"verify() was run...\");<script>";
				//in future checks account/login data
				$name=$_POST['navn'];$email=$_POST['email'];$os1=$_POST['os_1'];$os2=$_POST['os_2'];$os3=$_POST['os_3'];$os4=$_POST['os_4'];
				$name=trim($name);$os1=trim($os1);$os2=trim($os2);$os3=trim($os3);$os4=trim($os4);//$email=trim($email);
				$recommendations=array();
				if(!empty($_POST['os_1'])){$recommendations[]=$os1;}
				if(!empty($_POST['os_2'])){$recommendations[]=$os2;}
				if(!empty($_POST['os_3'])){$recommendations[]=$os3;}
				if(!empty($_POST['os_4'])){$recommendations[]=$os4;}
				$err = false;
				if(sizeof($recommendations)==0){$err=true;
					$GLOBALS['osErr']="<span id=\"badinp\">*No OS given</span>";
				}if($name===""){$err = true;
					$GLOBALS['nameErr']="<span id=\"badinp\">*Name Required</span>";
				}if($email===""){$err=true;
					$GLOBALS['emailErr']="<span id=\"badinp\">*Email Required</span>";
				}if(checkemail($email)){$err=true;}
				if($err){return;}//prevent post on error
				for($i=0;$i<sizeof($recommendations);$i++){
					$recommendations[$i]=convertchars($recommendations[$i]);
				}$name=convertchars($name);
				addpost($name, $recommendations);//Add/process post
			}
			function checkemail($email){
				$file = fopen("emails.dontserve","a");
				$filesize=filesize("emails.dontserve");
				$thelist=getthread("emails.dontserve");//code from get thread function didn't work here (generated empty string) so I call the function.
				if(!strpos($thelist, $email)===false){
					$GLOBALS['emailErr']="<span id=\"badinp\">*The given email has already been used.</span>";
					return true;
				}if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
					$GLOBALS['emailErr']="<span id=\"badinp\">*Invalid email</span>";
					return true;
				}fwrite($file, " $email ");//add the email to the list
				fclose($file);
				return false;
			}
			function convertchars($msg){//converts MY code, underline and bold tags to HTML, stops HTML injection,formats code
				$msg=str_replace("<","&lt;",$msg);//void html
				//newlines:
				$msg=str_replace("\\\\n", "&#92;n",$msg);//html char voids '\n'
				#$msg=str_replace("\n", "<br/>",$msg);//bad for code boxes
				//horizontal tabs:
				$msg=str_replace("\\\\t", "&#92;t",$msg);//html char voids '\t'
				$msg=str_replace("\t", "&#09;",$msg);
				//single quotes:
				$msg=str_replace("\\\\'", "&#39;",$msg);
				$msg=str_replace("\'", "&#39;",$msg);
				//double quotes:
				$msg=str_replace('\\\\"', "&#34;",$msg);
				$msg=str_replace('\"', "&#34;",$msg);
				//backslashes:
				$msg=str_replace("\\\\", "&#92;",$msg);
				return $msg;
			}
			function addpost($name, $msg){//writes post to thread file
				$post=makepost($name, $msg);
				$post.=file_get_contents('thread.txt');
				file_put_contents('thread.txt', $post);
				return;
			}function makepost($name, $recommendations){//creates the html for the post from the information given
				$post="<div class=\"dit\">";
				$post.=$name;#in future add link to user's website if given
				$post.=" suggests ";
				if(sizeof($recommendations)==1){//1 OS
					$post.="$recommendations[0].";
				}elseif(sizeof($recommendations)==2){//2 OS
					$post.="$recommendations[0] and $recommendations[1].";
				}elseif(sizeof($recommendations)==3){//3 OS
					$post.="$recommendations[0], $recommendations[1] and $recommendations[2].";
				}elseif(sizeof($recommendations)==4){//4 OS
					$post.="$recommendations[0], $recommendations[1], $recommendations[2] and $recommendations[3].";
				}else{//nul OS
					$GLOBALS['osErr']="<span id=\"badinp\">*No OS given</span>";
				}$post.="</div><br/>\n";
				return $post;
			}
			function getthread($filename){//returns the current blog as text/html from file
				$file = fopen($filename, "r");
				if($file==false){//failed to open file(not good)
				   return "<div class=\"main\"><h2><u>This is embarrassing</u>:</h2><hr/>There was an error, please try again later</div>";
				}$filesize=filesize( $filename );//length of file
				$filetext=fread($file, $filesize);//set $filetext to the value of the file
				fclose($file);
				return $filetext;
			}
		?><div class="main" id="nyos">
			<h2><strong>Suggest an OS:</strong></h2><ul>
				<form action="default.php" id="osform" name="postdat" method="post">
					<h4 style="display:inline">Name:</h4> <input type="text" name="navn" id="navn" onkeyup="chkin()" placeholder="ie-Joe" required="true" title="What do you want your name to show up as?"/><?php echo $nameErr; ?><br/>
					<h4 style="display:inline">Email:</h4> <input type="text" name="email" id="email" onkeyup="chkin()" placeholder="example@gmail.com" required="true" title="Your email is used to prevent spam on my website. As a token of respect, I won't send you spam."/><?php echo $emailErr; ?><br/>
					<!--<h4 style="display:inline">Website:</h4> http://<input type="text" name="email" id="email" onkeyup="chkin()" placeholder="google.com (blank for none)" required="true" title="If you have a website, your name will become a link to it."/><br/><!--determined to be too much code work and no one will use this-->
					<h4 style="display:inline">Suggested Operating Systems:</h4> <input type="text" name="os_1" id="os1" onkeyup="chkin()" required="true" placeholder="ie-MS-DOS" title="Pick an Operating System that you recommend I try, and write about"/><input type="text" onkeyup="chkin()" name="os_2" id="os2" placeholder="ie-MS-DOS" title="Pick an Operating System that you recommend I try, and write about on this webpage"/><input type="text" name="os_3" id="os3" onkeyup="chkin()" placeholder="ie-MS-DOS" title="Pick an Operating System that you recommend I try, and write about on this webpage"/><input type="text" name="os_4" id="os4" placeholder="ie-MS-DOS" onkeyup="chkin()" title="Pick an Operating System that you recommend I try, and write about on this webpage"/><input type="button" id="anotherosbtn" onclick="shownext()" value="Suggest Another (1/4)"/><?php echo $osErr; ?>
					<ul><input type="submit" id="postit" value="Submit" title="Send your message" title=""/></ul>
				</form>
			</ul>
		</div><br/>
		<?php echo getthread("thread.txt"); ?>
		<style type="text/css">span#social_footer{background-color:rgba(0,0,0,0.5);border-radius:3px;color:#00FF00 !important;}</style>
		<center><span id="social_footer">
			<a rel="license" id="social_footer_lic" href="http://creativecommons.org/licenses/by-sa/4.0/" target="_blank" title="This work is licensed under a Creative Commons Attribution-ShareAlike 4.0 International License.">
				<img alt="Creative Commons License" style="border-width:0" src="https://licensebuttons.net/l/by-sa/4.0/80x15.png"/>
			</a><div class="g-follow" data-href="https://plus.google.com/+Tatetesta" data-height='15' data-rel="{relationshipType}"></div><!--g+ follow-->
			<div class="g-plusone" data-size="small" data-annotation="inline" data-width="300"></div><!--google+1--></span>
		</center>
	</body>
</html>

