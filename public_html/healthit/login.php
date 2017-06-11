<?php $err=false;$konto=$_POST['konto'];
	if(isset($_COOKIE["healthitga-user"])){//user logged in (user cookie found)
		$username= $_COOKIE["healthitga-user"];
		if(file_exists("Location: //dvtate.com/healthit/paid/".$username."/key.txt")){
			$url="//dvtate.com/healthit/paid/".$username;
			setcookie("healthitga-url", $url, time()+(86400*30),"/");
			header("Location: //dvtate.com/healthit/paid/".$username);
		}elseif(file_exists("Location: //dvtate.com/healthit/free/".$username."/key.txt")){
			$url="//dvtate.com/healthit/free/".$username;
			setcookie("healthitga-url", $url, time()+(86400*30),"/");
			header("Location: //dvtate.com/healthit/free/".$username);
		}else{//Sever Error! (holde det stille)
			//delete username cookie and start over
			unset($_COOKIE['healthitga-user']);
			setcookie('healthitga-user', null, -1, '/');
			echo "<script type='text/javascript'>alert('There was a server error\nPlease Try Again.');</script>";
		}
	}elseif(isset($_COOKIE["healthitga-url"])){//user logged in (url cookie found)
		if(file_exists($_COOKIE["healthitga-url"])){
			header("Location: ".$_COOKIE["healthitga-url"]);
		}else{//Sever Error! (holde det stille)
			//delete url cookie and start over
			unset($_COOKIE['healthitga-url']);
			setcookie('healthitga-url', null, -1, '/');
			echo "<script type='text/javascript'>alert('There was a server error\nPlease Try Again.');</script>";
		}
	}else{//user not logged in
		$username=$_POST['konto'];
		if(file_exists("Location: //dvtate.com/healthit/paid/".$username."/key.txt")){
			loginuser("paid",$username);
			$url="//dvtate.com/healthit/paid/".$username;
			setcookie("healthitga-url", $url, time()+(86400*30),"/"); // 86400 = 1 day
			header("Location: //dvtate.com/healthit/paid/".$username);
		}elseif(file_exists("Location: //dvtate.com/healthit/free/".$username."/key.txt")){
			loginuser("paid",$username);
			$url="//dvtate.com/healthit/free/".$username;
			setcookie("healthitga-url", $url, time()+(86400*30),"/"); // 86400 = 1 day
			header("Location: //dvtate.com/healthit/free/".$username);
		}else{$err=true;}
	}if($_POST['konto']===""||$_POST['konto']===null)$err="";
	function loginuser($type,$navn){
		if(file_get_contents('./'.$type.'/'.$navn.'/key.txt')===$_POST['key']){//correct password
			setcookie("healthitga-user", $navn, time()+(86400*30),"/");
			$url="//dvtate.com/healthit/".$type."/".$navn;
			setcookie("healthitga-url", $url, time()+(86400*30),"/");
			header("Location: //dvtate.com/healthit/".$type."/".$navn);#send user to their homepage
		}else{$err=true;}
	}
?><!DOCTYPE html><html>
	<head>
		<link rel="icon" type="image/png" href="//dvtate.com/healthit/dr.png" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<meta name="description" content="A website devoted to the growing field of telemedicine. This page is currently under development. This site is built specifically for mobile devices."/>
		<meta name="author" content="Dustin Van Tate Testa"/><title>HealthIT - Telemedicine</title>
		<script src="https://apis.google.com/js/platform.js" async defer></script>
		<link href='//fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="//dvtate.com/styles/m.nyental.css"/>
		<style>div.pagebox{background-color:#fff;border:1px solid #333;
				padding:10px;margin:3px 0;border-left:0;border-right:0;
			}div.page{position:absolute;top:8%;bottom:0;left:0;right:0;overflow:auto;background-color:#efefef;}
			div.page>a{color:#000;text-decoration:none;}
			div.showfakeback{color:#fff;margin:0 auto;padding:15px;
				background-color:#000;background-attachment:fixed;
				background-image:url(//dvtate.com/styles/baggrund.png);
				box-shadow:0px 0px -0.5em #000;
			}
			input.mobile{padding:10px 25px;width:150px;display:inline-block;}
			span.alert{padding:5px;border-radius:10px;margin-top:1pc;background-color:#ff0;}
		</style><script type="text/javascript"><!--//Google Analytics
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
			ga('create', 'UA-59746939-2', 'auto');ga('send', 'pageview');//-->
		</script><script type="text/javascript" id="mobile_stuff">
			var menuopen=false;//attempted to make work without using a variable but failed
			function shsidemenu(){var sidemenu=
				document.getElementById("sidemenu"),
				dim=document.getElementById("dimbag");
				if(menuopen==false){dim.style.display="block";dim.style.opacity="0.8";
					sidemenu.style.width="75%";
				}else{dim.style.display="none";dim.style.opacity="0";
					sidemenu.style.width="0%";
				}menuopen=!menuopen;
			}
		</script>
	</head><body>
		<div class="topbar">
			<img src="//dvtate.com/styles/ham.png" id="hamburger" align="left" alt="||Menu" onclick="shsidemenu()"/>
			<a href="//dvtate.com/healthit/"><img src="//dvtate.com/styles/hus.png" id="hjem" align="right" alt="Home" onclick=""/></a>
		</div><div class="sidemenu" id="sidemenu">
			<a href="//dvtate.com/healthit/">Home</a><br/>
			<a href="//dvtate.com/healthit/telemed/">About Telemedicine</a><br/>
			<a href="//dvtate.com/healthit/aboutus/">About Us</a><br/>
			<a href="//dvtate.com/healthit/login.php">Login (Doctors)</a><br/>
			<a href="//dvtate.com/healthit/dr-type.php">Find a Doctor</a><br/>
		</div><div id="dimbag" onclick="shsidemenu()"></div>
		<div class="page">
			<div class="showfakeback">
				<h1>Login:</h1>
				<form  action="login.php" id="login" name="login" method="post">
					<input type="text" name="konto" class="mobile" required="true" placeholder="username"/><input type="password" name="key" class="mobile" required="true" placeholder="password"/>
					<input align="right" type="submit" id="login" class="mobile" value="Login"/>
				</form><?php if($err)echo "<span><h4 style='color:red;'>*Wrong username or password</h4></span>"; ?>
			</div><br/><a href="//dvtate.com/healthit/signup.php"><div class="pagebox">Don't have an account?<hr/><h6>Get started for free!</h6></div></a>
		</div>
	</body>
</html>
