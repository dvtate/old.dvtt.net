<!DOCTYPE html><html>
	<head>
		<link rel="icon" type="image/png" href="//dvtate.com/healthit/dr.png" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<meta name="description" content="Find a your new online doctor."/>
		<meta name="author" content="original copy by DV Tate Testa - This is auomatically edited with user content"/>
		<title>Paid Doctors - HealthIT</title>
		<script src="https://apis.google.com/js/platform.js" async defer></script>
		<link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="//dvtate.com/styles/m.nyental.css"/>
		<style>div.pagebox{background-color:#fff;border:1px solid #333;
				padding:10px;margin:3px 0;border-left:0;border-right:0;
			}div.page{position:absolute;top:8%;bottom:0;left:0;right:0;overflow:auto;
				background-color:#efefef;color:#fff;margin:0 auto;padding:15px;padding-right:0;
				background-color:#000;background-attachment:fixed;
				background-image:url(//dvtate.com/styles/baggrund.png);
				box-shadow:0px 0px -0.5em #000;
			}div.page>a{color:#000;text-decoration:none;}
			div.showfakeback{color:#fff;margin:0 auto;padding:15px;padding-right:0;
				background-color:#000;background-attachment:fixed;
				background-image:url(//dvtate.com/styles/baggrund.png);
				box-shadow:0px 0px -0.5em #000;
			}input.mobile{padding:10px 25px;width:150px;display:inline-block;}
			div.drentry{height:10vw;width:100%;background-color:#FFF;color:#000;
				margin:0px,5px;padding:0;margin-bottom:4px;border:1px solid #333;border-right:0;
				border-top-left-radius:200px;border-bottom-left-radius:200px;
				white-space:nowrap;overflow:hidden;text-overflow:ellipsis;text-decoration:none;
			}img.profileimg{width:10vw;height:10vw;border:1px solid #333;
				border-radius:150px;background-color:rgba(192,192,192,0);margin:0;
				background-color:#000;background-attachment:fixed;display:inline;
				background-image:url(//dvtate.com/styles/baggrund.png);
			}div.om-dr{width:85vw;display:inline-block;vertical-align:top;}
			span.omdr-navn{font-size:4vw;}span.omdr-tag{font-size:1vw;margin:0;padding:0;}
			hr.navn-intro{margin:0;padding:0;}
		</style><script type="text/javascript"><!--//Google Analytics
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
			ga('create', 'UA-59746939-2', 'auto');ga('send', 'pageview');//-->
		</script><script type="text/javascript" id="mobile_stuff">
			var menuopen=false;function shsidemenu(){var sidemenu=//attempt without var failed
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
			<div class="showfakeback"><h1>Paid <?php echo "dfbdbsfbsknjnflkbkdjs"; ?> Doctors:</h1>
				<!--php - finde og erstatte med og ny konto-->
				<a href="//dvtate.com/healthit/paid/dvtt/"><div class="pagebox">
					<img class="profileimg" alt="user-foto" src="<?php echo file_get_contents(dirname(__DIR__).'/dvtt/imgurl.txt'); ?>"/>
					<div class="om-dr">
						<span class="omdr-navn"><?php echo file_get_contents(dirname(__DIR__).'/dvtt/name.txt'); ?></span><hr class="navn-tag"/>
						<span class="omdr-tag"><?php echo file_get_contents(dirname(__DIR__).'/dvtt/tag.txt'); ?></span>
					</div>
				</div></a>

			</div>
		</div>
	</body>
</html><style>/*fjerne reklamer
