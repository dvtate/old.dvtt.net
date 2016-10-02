<!DOCTYPE html><html>
	<head>
		<link rel="icon" type="image/x-icon" href="//dvtate.com/healthit/dr.ico" />
		<link rel="icon" type="image/png" href="//dvtate.com/healthit/dr.png" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<meta name="description" content="<?php echo file_get_contents('intro.txt'); ?>"/>
		<meta name="author" content="template by DV Tate Testa - This is auomatically generated"/>
		<title><?php echo file_get_contents('name.txt')." - HealthIT"; ?></title>
		<script src="https://apis.google.com/js/platform.js" async defer></script>
		<script src="https://apis.google.com/js/plusone.js"></script><!--G+ comments-->
		<link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="//dvtate.com/styles/m.nyental.css"/>
		<style>div.pagebox{background-color:#fff;border:1px solid #333;
				padding:10px;margin:3px 0;border-left:0;border-right:0;
			}div.page{position:absolute;top:8%;bottom:0;left:0;right:0;overflow:auto;background-color:#efefef;}
			div.page>a{color:#000;text-decoration:none;}
			div.showfakeback{color:#fff;margin:0 auto;padding:15px;
				background-color:#000;background-attachment:fixed;
				background-image:url(//dvtate.com/styles/baggrund.png);
				box-shadow:0px 0px -0.5em #000;
			}input.mobile{padding:10px 25px;width:150px;display:inline-block;}
			img#profilepreview{width:25vw;height:25vw;/*vw=%viewport-width*/
				border-radius:5px;border:1px solid #333;background-color:#fff;
			}div#profileimg-wrap{display:inline-block;}div#drid{display:inline-block;width:75vw;vertical-align:center;}
			img#profileimg{width:20vw;height:20vw;border:1px solid #333;border-radius:150px;background-color:rgba(192,192,192,0.2);}
			div.g-comments{width:90vw;}
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
	</head><body><div id="fb-root"></div>
		<script type="text/javascript">(function(d,s,id){//facebook (the bane of my existence):P
			var js,fjs=d.getElementsByTagName(s)[0];if(d.getElementById(id))return;
			js=d.createElement(s);js.id=id;js.src="//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4";
			fjs.parentNode.insertBefore(js,fjs);}(document,'script','facebook-jssdk'));
		</script><div class="topbar">
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
				<div id="profiletitle">
					<div id="profileimg-wrap"><img id="profileimg" src="<?php echo file_get_contents('imgurl.txt'); ?>">
					</div><div id="drid"><h1><b><?php echo file_get_contents('name.txt'); ?></b></h1><hr/><h4><?php echo file_get_contents('tag.txt'); ?></h4></div>
				</div>
			</div><div class="fb-like" data-href="<?php echo "//dvtate.com/healthit".$_SERVER['REQUEST_URI']; ?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div> <!--FB like--> <div class="g-plusone" data-size="small" data-annotation="inline" data-width="300" data-href="<?php echo "//dvtate.com/healthit".$_SERVER['REQUEST_URI']; ?>"></div><!--google+1-->
			<div class="pagebox"><b>Intro</b><br/><h6><?php echo file_get_contents('intro.txt'); ?></h6>
			</div><div class="pagebox"><b>Contact<b><br/><h6><?php echo file_get_contents('contact.txt'); ?></div>
			<div id="commentsarea"><div class="g-comments" id="gcomments" data-href="<?php echo "//dvtate.com/healthit".$_SERVER['REQUEST_URI']; ?>" data-width="" data-first_party_property="BLOGGER" data-view_type="FILTERED_POSTMOD"></div></div>
		</div><script type="text/javascript">window.onresize=function(event){//auto-resize comments section (still glitchy but don't want to refresh the entire page every time it resizes)
				document.getElementById("gcomments").setAttribute("data-width",((window.innerWidth||document.documentElement.clientWidth||document.body.clientWidth)-15));
				document.getElementById("commentsarea").style.display='none';document.getElementById("commentsarea").offsetHeight;document.getElementById("commentsarea").style.display='block';
        	};document.getElementById("gcomments").setAttribute("data-width",((window.innerWidth||document.documentElement.clientWidth||document.body.clientWidth)-15));
		</script>
	</body>
</html>
