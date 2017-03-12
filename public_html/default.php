<!DOCTYPE html><html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta name="description" content="DV Tate's personal website homepage. I have a chatroom, calculators, operating systems, and several other pages (mostly about me)."/>
		<meta name="author" content="Dustin Van Tate Testa"/><title>Home - Tate's Website</title>
		<meta name="keywords" content="tate testa dustin van freshman blacksmith fish forge programming linux  Dustin Van Tate Testa math calculators"/>
		<meta name="start-date" id="new-style" content="8-5-2015"/><meta name="edit-date" content="5-13-2015"/>
		<meta property="og:image" content="//dvtate.com/chat/guest.png" />
		<link href="//fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet" type="text/css">
		<link rel="stylesheet" type="text/css" href="//dvtate.com/styles/nyental.css"/>
		<script src="https://apis.google.com/js/platform.js" async defer></script><!--Google+1 btn-->
		<script type="text/javascript"><!--//Google Analytics
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
			ga('create', 'UA-59746939-2', 'auto');ga('send', 'pageview');//-->
		</script><style type="text/css">
			span#bubblealert{background-color:#f00;color:#fff;
				border-radius:5px;border:2px solid #fff;
			}sup>span#bubblealert{font-size:75%;}
			div.dit{background-color:#FFF;padding:2px 20px 5px 10px;margin:0% 7%;
				border-radius:30px;border-bottom-right-radius:0;border:2px solid #454545;
				font-family:'Ubuntu', 'Lucida Sans Unicode', 'Lucida Grande', Helvetica, sans-serif;
			}img#archlinuxlogo{max-height:150px;max-width:450px;}
		</style><script type="text/javascript"><!--//box control
			var growboxid,shrinkboxid1,shrinkboxid2,small,med,large,rownum=2;
			function focusbox(boxcol,boxrow){var infocus=
				!!(document.getElementById("col"+boxcol+"row"+boxrow+"lg").style.display!="none");
				resetboxes();if(boxcol==1){growboxid="col1row"+boxrow;
					shrinkboxid1="col2row"+boxrow;shrinkboxid2="col3row"+boxrow;
				}else if(boxcol==2){growboxid="col2row"+boxrow;
					shrinkboxid1="col1row"+boxrow;shrinkboxid2="col3row"+boxrow;
				}else if(boxcol==3){growboxid="col3row"+boxrow;
					shrinkboxid1="col2row"+boxrow;shrinkboxid2="col1row"+boxrow;
				}else{alert("There are only three columns!!!");}//if/when I screw up:P
				if(infocus){resetboxes();}else{
					growbox(growboxid);shrinkbox(shrinkboxid1);
					shrinkbox(shrinkboxid2);
				}
			}function shrinkbox(boxid){//expands box
				document.getElementById(boxid).style.width="20%";
				document.getElementById(boxid+"sm").style.display="block";
				document.getElementById(boxid+"md").style.display="none";
				document.getElementById(boxid+"lg").style.display="none";
			}function growbox(boxid){//compresses box
				document.getElementById(boxid).style.width="50%";
				document.getElementById(boxid+"lg").style.display="block";
				document.getElementById(boxid+"md").style.display="none";
				document.getElementById(boxid+"sm").style.display="none";
			}function resetboxes(){//reset boxes to default size
				for(var c=1;c<=3;c++){//cols
					for(var r=1;r<=rownum;r++){//rows
						document.getElementById("col"+c+"row"+r).style.width="30%";//box.style.height="250px";
						document.getElementById("col"+c+"row"+r+"sm").style.display="none";
						document.getElementById("col"+c+"row"+r+"lg").style.display="none";
						document.getElementById("col"+c+"row"+r+"md").style.display="inline";
					}
				}
			}//-->
		</script>
	</head><body onLoad="makeGplusGreen()">
		<?php #automates some content
			function getpostcount(){//returns the number of posts
				$threadtxt=file_get_contents('./chat/thread.txt');
				return substr_count($threadtxt,"<div id=\"post\">");
			}function getlatestpost(){//return latest post
				preg_match("'<div id=\"post\">(.*?)</div></div>'si",file_get_contents('./chat/thread.txt'),$match);#put all post contents into array $matches[]
				if($match) return "<div id=\"post\">".$match[1]."</div></div>";//return first post
				else return "There was a major error attempting to read the contents of the chatroom. (contact me: toast27@gmail.com)";#missing thread
			}function getlatestosvote(){
				preg_match("'<div class=\"dit\">(.*?)</div>'si",file_get_contents('./os/thread.txt'),$match);#put all votes into array $matches[]
				if($match) return "<div class=\"dit\">".$match[1]."</div>";//return first post
				else return "There was a major error attempting to read the votes. (contact me: toast27@gmail.com)";#missing thread
			}
		?><ul class="pages"><!--page-link menu-->
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
		</ul><table class="row"><tr>
			<td class="nybox" id="col1row1" onclick="focusbox(1,1)">
				<span id="col1row1sm" style="display: none" title="see how busy I've been and what has changed since last time">
					<h2>Updates</h2>
				</span><span id="col1row1md" title="see how busy I've been and what has changed since last time">
					<h2>Updates</h2><hr/><h3>See what I'm doing with my <span title="or lack thereof">time</span></h3>
				</span><span class="lgfull" id="col1row1lg" onclick="resetboxes()">
					<h2 title="see how busy I've been and what has changed since last time"><b>Updates</b></h2>
					<ul id="update-timeline">
						<li><b>2017.3.8</b>: started working on <a href="https://robobibb.github.io" target="_blank">robotics team's website</a> with my programming team.</li>
						<li><b>2016.10.2</b>: made a <a href="https://github.com/dvtate/dvtate.com" target="_blank">GitHub repo for this website</a> so you can see my source.</li>
						<li><b>2016.8.20</b>: got annoied by my website's obsoleteness. Spiced things up with some Serial Experiments lain themed content and some <span title="from when my parents made me get off my gfs vps">minor fixes</span>.</li>
						<li><b>2016.8.15</b>: realized that <a href="https://plus.google.com/+Tatetesta/posts/AYFf3A2wsbC" target="_blank">my school district was blocking my website</a>... those bastards.</li>
						<li><b>2016.8.1</b>: School starts. 5 AP Classes. This is gonna be difficult.</li>
						<li><b>2016.7.19</b>: GHP over (T.T) {sleep's for 3 days straight} {made some great friends}</li>
						<li><b>2016.6.19</b>: went to GHP for software and electrical engineering.</li>
						<li><b>2016.6.5</b>: began developing <a href="https://github.com/dvtate/rpn/" target="_blank">my own scripting language</a>.</li>
						<li><b>2016.4.4</b>: parents threw server out of window because they didn't like my GF... (qwq)</li>
						<li><b>2016.2.14</b>: parents decieded I should take a break from the computer.</li>
						<li><b>2016.2.13</b>: Went public with my relationship to my GF.</li>
						<li><b>2016.1.1</b>: Got addiceted to low-level languages (C/C++) and put the website on the back-burner.</li>
						<li><b>2015.12.4</b>: Moved website to my girlfriend's server.</li>
						<li><b>2015.11.20</b>: 16<sup>th</sup> birthday.</li>
						<li><b>2015.9.2</b>: Started work on a <a href="//dvtate.com/healthit/">project for HealthIT</a>.</li>
						<li><b>2015.8.5</b>: Rebuilt homepage with new style (<a href="//dvtate.com/trusty.html">view old</a>).</li>
						<li><b>2015.8.3</b>: Back to school.</li>
						<li><b>2015.7.27</b>: Built the <a href="//dvtate.com/os/">operating systems</a> page.</li>
						<li><b>2015.6.11</b>: Built <a href="//dvtate.com/3d/">3D modeling</a> page.</li>
						<li><b>2015.6.5</b>: Added a <a href="//dvtate.com/school/">college</a> page. But there's a trick :)</li>
						<li><b>2015.5.21</b>: converted all <a href="//dvtate.com/calc/">calculators</a> to JavaScript.</li>
						<li><b>2015.5.12</b>: Added mobile support for iOS.</li>
						<li><b>2015.5.9</b>: Built <a href="//dvtate.com/forge/">forge</a> page. Adjustments to <a href="//dvtate.com/chat/">chatroom</a></li>
						<li><b>2015.5.5</b>: rebuilt <a href="//dvtate.com/prog/">programming</a> page to fit new style</li>
						<li><b>2015.4.20</b>: registered new domain (<a href="//dvtate.com/">dvtate.com</a>) to replace <a class="broken-link" href="//dvtate.com/pageremoved.html" title="I no longer own this url (broken-link)">dvtate.hostoi.com</a></li>
						<li><b>2015.4.12</b>: Finished <a href="http://dvtate.com/chat/">chatroom</a>.</li>
						<li><b>2015.4.6</b>: Began Work on <a href="//dvtate.com/chat/">chatroom</a>, Favorite language changed to <a href="http://www.dvtate.com/prog/php/">PHP</a></li>
						<li><b>2015.2.16</b>: Installed <a href="https://www.archlinux.org/" target="_blank">Arch Linux</a> (the hard way) for the first time.</li>
						<li><b>2015.2.13</b>: Adjustments to page menu, fonts, style, drop-down menus, etc.(<a href="http://dvtate.com/draft.html">view old</a>)</li>
						<li><b>2015.2.2</b>: Rebuilt website homepage from scratch (<a href="//dvtate.com/olddefault.html">view old</a>).</li>
						<li><b>2015.1.20</b>: Made a summations calculator, and a resistor color code calculator.</li>
						<li><b>2015.1.15</b>: Started playing with <a href="http://www.erlang.org/" target="_blank">Erlang</a>.</li>
						<li><b>2014.11.20</b>: My 15<sup>th</sup> birthday.</li>
						<li><b>2014.9.19</b>: Built original programming page</li>
						<li><b>2014.9.5</b>: Rebuilt <a  href="//dvtate.com/prog/php/tri.php" >tri.php</a> to fit homepage style</li>
						<li><b>2014.8.27</b>: Built original homepage.</li>
						<li><b>2014.7.1</b>: Started playing with C# (within <a href="http://www.unity3d.com/" target="_blank">Unity</a>)</li>
						<li><b>2014.6.30</b>: converted tri.asp to <a href="//dvtate.com/prog/php/oldtri.php">oldtri.php</a></li>
					</ul>
				</span>
			</td><td class="nybox" id="col2row1" onclick="focusbox(2,1)" title="See what's happening in the ChatRoom">
				<span id="col2row1sm" style="display: none">
					<h1>Chat<sup><span id="bubblealert"><?php echo getpostcount(); ?></span></sup></h1>
				</span><span id="col2row1md">
					<h2>Chat Room</h2><hr/>
					<h4><span id="bubblealert"><?php echo getpostcount(); ?></span> messages</h4>
				</span><span class="lgfull" id="col2row1lg" onclick="resetboxes()">
					<h2><b>Latest chatroom post</b>:</h2>
					<?php echo getlatestpost(); ?><br/><hr/>
					<h3 style="display:inline"><a href="//dvtate.com/chat/">join the conversation</a></h3>
				</span>
			</td><td class="nybox" id="col3row1"  onclick="focusbox(3,1)" title="Recently added page">
				<span id="col3row1sm" style="display:none">
					<h2>It's New!</h2>
				</span><span id="col3row1md">
					<h2>Newest Page</h2><hr/>
					<h4><a href="//dvtate.com/os/">Operating Systems</a></h4><?php echo getlatestosvote(); ?>
				</span><span class="lgfull" id="col3row1lg" onclick="resetboxes()">
					<h2><b><a href="//dvtate.com/os/">Operating Systems</a></b></h2>
					<p class="ind">This is one of my better looking pages, mostly because it has pictures and more color than most of my other pages. I made an voting place, so make sure to pick your favorite operating systems. My plan for this page, or really this category of pages, is to provide a resource for anyone who plans to try the operating system. I plan to make the article similar in design and behavior to a wikipedia article. Because I'm not perfect, I plan to make a comments area below each article so that people can give me recommendations.</p>
					<h4><b>Recent recommendation:</b></h4><?php echo getlatestosvote()."\n"; ?>
				</span>
			</td>
		</tr></table>
		<!--row#2-->
		<table class="row"><tr>
			<td class="nybox" id="col1row2"  onclick="focusbox(1,2)" title="Ever wonder how or why I made my website?">
				<span id="col1row2sm" style="display:none">
					<h2>About This Site</h2>
				</span><span id="col1row2md">
					<h2>About This Website</h2><hr/>
					<h4>A short story about how this website came to be</h4>
				</span><span class="lgfull" id="col1row2lg" onclick="resetboxes()">
					<h2><b>About this Website</b></h2>
					<p class="ind">In the spring of 2014, I created a program in VBScript which finds the area between any 3 coordinates. Most of the kids in my math class wanted a copy of it. I attempted to send it via email, but Gmail wouldn't let me send it. So I converted it to ASP, ASP.NET, and finally PHP (I had never heard of JavaScript). This was my first addition to this website. You can still visit it <a  href="http://www.dvtate.com/prog/php/tri.php" >here</a> (or <a href="http://www.dvtate.com/prog/php/oldtri.php">here</a> for the original prototype). I continued to add more pages for all of my hobbies. I ended up geting a free domain for my website, and have continued adding pages.</p>
				</span>
			</td><td class="nybox" id="col2row2"  onclick="focusbox(2,2)" title="My primary operating system">
				<span id="col2row2sm" style="display:none">
					<h2>Linux</h2>
				</span><span id="col2row2md">
					<h2>Favorite Linux Distro</h2><hr/>
					<h4>Right now I'm into Arch Linux</h4>
				</span><span class="lgfull" id="col2row2lg" onclick="resetboxes()">
					<img src="//dvtate.com/os/logos/arch.png" width="75%" id="archlinuxlogo" alt="arch linux logo"/>
					<p class="ind">My first 3 attempts at Arch Linux were learning experiences, but I think I have gotten good enough to use it as an everyday operating system. What I love about Arch is you can make it into whatever you want. Also Arch is a rolling-release distro, so unlike Debian, I don't have to start over every 4 years. Also, Arch Linux has some of the newest software out there, and great tools for building and installing from it's massive selection of third party software in the <a href="https://aur.archlinux.org/" target="_blank" title="the arch user repository">AUR</a> (The Arch User Repository).</p>
				</span>
			</td><td class="nybox" id="col3row2"  onclick="focusbox(3,2)"> <!-- Replace this with favorite anime series instead for the glory of lain-chan :))) -->
				<span id="col3row2sm" style="display:none">
					<h2>PHP</h2>
				</span><span id="col3row2md">
					<h2>Favorite Language</h2><hr/>
					<h4><a href="//dvtate.com/prog/php/">PHP</a></h4>
				</span><span class="lgfull" id="col3row2lg" onclick="resetboxes()">
					<h2><b><a href="//dvtate.com/prog/php/">PHP</a></b></h2>
					<table id="sprog"><tr>
						<td><a href="http://www.php.net/"><img src="http://php.net/images/logo.php"/><br/><img src="http://php.net//images/logos/php5-power-micro.png"/></a></td>
						<td id="lang-om">
							<p class="ind"><a href="//dvtate.com/prog/php/">PHP</a> is a server-side scripting language. It is commonly mixed with HTML in many web pages which process information, (ie- login, shopping, blogs, etc.). My interest in PHP was re-sparked on my most recent project, my <a href="//dvtate.com/chat/">chatroom</a>. Where I got back into PHP.</p>
						</td></tr>
					</table>
				</span>
			</td>
		</tr></table>
		<style>
			span#social_footer{background-color:rgba(0,0,0,0.5);border-radius:3px;color:#00FF00 !important;}
			.gP{color:#00FF00!important;}
		</style>
		<center><span id="social_footer">
			<a rel="license" id="social_footer_lic" href="http://creativecommons.org/licenses/by-sa/4.0/" target="_blank" title="This work is licensed under a Creative Commons Attribution-ShareAlike 4.0 International License.">
				<img alt="Creative Commons License" style="border-width:0" src="https://licensebuttons.net/l/by-sa/4.0/80x15.png"/>
			</a><div class="g-follow" data-href="https://plus.google.com/+Tatetesta" data-height='15' data-rel="{relationshipType}"></div><!--g+ follow-->
			<div class="g-plusone" data-size="small" data-annotation="inline" data-width="300"></div><!--google+1--></span>
			<script>
				(function makeGplusGreen(){
					document.getElementById("social_footer").lastElementChild.id = "gplusonebutton";
					frames["gplusonebutton"].document.getElementByTagN.style.color = "#00ff00";
				})();
			</script>
		</center>
	</body>
</html>
