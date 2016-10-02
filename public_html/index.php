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
	</head><body>
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
			<td class="nybox" id="col1row1" onclick="focusbox(1,1)" title="see how busy I've been and what has changed since last time">
				<span id="col1row1sm" style="display: none">
					<h2>Updates</h2>
				</span><span id="col1row1md">
					<h2>Updates</h2><hr/><h3>See what I've changed</h3>
				</span><span class="lgfull" id="col1row1lg" onclick="resetboxes()">
					<h2><b>Updates</b></h2>
					<ul id="update-timeline">
						<li><b><u>12-4-2015</u></b>: Moved website to my friend's server.</li>
						<li><b><u>11-20-2015</u></b>: 16<sup>th</sup> birthday.</li>
						<li><b><u>9-2-2015</u></b>: Started work on a <a href="//dvtate.com/healthit/">project for HealthIT</a>.</li>
						<li><b><u>8-5-2015</u></b>: Rebuilt homepage with new style (<a href="//dvtate.com/trusty.html">view old</a>).</li>
						<li><b><u>8-3-2015</u></b>: Back to school.</li>
						<li><b><u>7-27-2015</u></b>: Built the <a href="//dvtate.com/os/">operating systems</a> page.</li>
						<li><b><u>6-11-2015</u></b>: Built <a href="//dvtate.com/3d/">3D modeling</a> page.</li>
						<li><b><u>6-5-2015</u></b>: Added a <a href="//dvtate.com/school/">college</a> page. But there's a trick :)</li>
						<li><b><u>5-21-2015</u></b>: converted all <a href="//dvtate.com/calc/">calculators</a> to JavaScript.</li>
						<li><b><u>5-12-2015</u></b>: Added mobile support for iOS.</li>
						<li><b><u>5-9-2015</u></b>: Built <a href="//dvtate.com/forge/">forge</a> page. Adjustments to <a href="//dvtate.com/chat/">chatroom</a></li>
						<li><b><u>5-5-2015</u></b>: rebuilt <a href="//dvtate.com/prog/">programming</a> page to fit new style</li>
						<li><b><u>4-20-2015</u></b>: registered new domain (<a href="//dvtate.com/">dvtate.com</a>) to replace <a class="broken-link" href="//dvtate.com/pageremoved.html" title="I no longer own this url (broken-link)">dvtate.hostoi.com</a></li>
						<li><b><u>4-12-2015</u></b>: Finished <a href="http://dvtate.com/chat/">chatroom</a>.</li>
						<li><b><u>4-6-2015</u></b>: Began Work on <a href="//dvtate.com/chat/">chatroom</a>, Favorite language changed to <a href="http://www.dvtate.com/prog/php/">PHP</a></li>
						<li><b><u>2-13-2015</u></b>: Adjustments to page menu, fonts, style, drop-down menus, etc.(<a href="http://dvtate.com/draft.html">view old</a>)</li>
						<li><b><u>2-2-2015</u></b>: Rebuilt website homepage from scratch (<a href="//dvtate.com/olddefault.html">view old</a>).</li>
						<li><b><u>1-20-2015</u></b>: Made a summations calculator, and a resistor color code calculator.</li>
						<li><b><u>1-15-2015</u></b>: Started playing with <a href="http://www.erlang.org/" target="_blank">Erlang</a>.</li>
						<li><b><u>11-20-2014</u></b>: My 15<sup>th</sup> birthday.</li>
						<li><b><u>9-19-2014</u></b>: Built original programming page</li>
						<li><b><u>9-5-2014</u></b>: Rebuilt <a  href="//dvtate.com/prog/php/tri.php" >tri.php</a> to fit homepage style</li>
						<li><b><u>8-27-2014</u></b>: Built original homepage.</li>
						<li><b><u>7-1-2014</u></b>: Started playing with C# (within <a href="http://www.unity3d.com/" target="_blank">Unity</a>)</li>
						<li><b><u>6-30-2014</u></b>: converted tri.asp to <a href="//dvtate.com/prog/php/oldtri.php">oldtri.php</a></li>
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
			</td><td class="nybox" id="col3row2"  onclick="focusbox(3,2)">
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
		<center>
			<a rel="license" href="http://creativecommons.org/licenses/by-sa/4.0/" target="_blank" title="This work is licensed under a Creative Commons Attribution-ShareAlike 4.0 International License.">
				<img alt="Creative Commons License" style="border-width:0" src="https://licensebuttons.net/l/by-sa/4.0/80x15.png"/>
			</a><div class="g-follow" data-href="https://plus.google.com/+Tatetesta" data-height='15' data-rel="{relationshipType}"></div><!--g+ follow-->
			<div class="g-plusone" data-size="small" data-annotation="inline" data-width="300"></div><!--google+1-->
		</center>
	</body>
</html>
