<!DOCTYPE html><html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta name="description" content="DV Tate Testa's chat room"/>
		<meta name="author" content="Dustin Van Tate Testa"/>
		<meta name="keywords" content="tate testa dustin van freshman blacksmith fish forge programming Dustin Van Tate Testa math calculators blog forum talk"/>
		<meta name="start-date" content="4-6-2015"/><meta name="edit-date" content="4-11-2015"/>
		<title>Chat Room - Tate's Website</title>

		<link href='//fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'/>
		<link rel="stylesheet" type="text/css" href="//dvtate.com/styles/nyental.css"/>

		<script src="https://apis.google.com/js/platform.js" async defer></script><!--Google+1-->
		<script src="https://dvtate.com/scripts/main.js"></script>
		<style type="text/css" id="talksyle">
			#block { border: 1px solid #000; }
			input#postit {
				display: block;
				border: 1px solid #000;
				background-color: #EAEAEA;
			}
			a#lyse {
				color: #090;
				font-family: 'Ubuntu', sans-serif;
				height: 15px;
			}
		</style>
		<script language="javascript" type="text/javascript"><!--//tab button adds tab to post
			function enabletabbing(){
				var textareas = document.getElementsByTagName('textarea');
				var count = textareas.length;
				for (var i = 0; i < count; i++) {
					textareas[i].onkeydown = function(e){
						if (e.keyCode == 9 || e.which == 9) {
							e.preventDefault();
							var s = this.selectionStart;
							this.value = this.value.substring(0,this.selectionStart)
								+ "\t" + this.value.substring(this.selectionEnd);
							this.selectionEnd = s + 1;
						}
					}
				}
				chkin();
			}//-->
		</script><script language="javascript" type="text/javascript"><!--adds blocks
			function addblock(type){
				if (type == 3)
					document.postdat.msg.value += "\n[code]\nenter code here\n[/code]";
				else if (type == 2)
					document.postdat.msg.value += "[underline]put text here[/underline]";
				else if (type == 1)
					document.postdat.msg.value += "[bold]put text here[/bold]";
			}
			function chkin(){//pronounced chicken
				if (document.getElementById("brugersNavn").value != ""
				 && document.getElementById("msgin").value != "")
					document.getElementById("newpost").style.borderLeft = "20px solid green";
				else
					document.getElementById("newpost").style.borderLeft = "20px solid red";
			}//-->
		</script><script type="text/javascript"><!--//Google Analytics
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
			ga('create', 'UA-59746939-2', 'auto');ga('send', 'pageview');//-->
		</script>
	</head>
	<body onload="enabletabbing()">
		<ul id="navbar"></ul>
		<script>genNavBar("navbar");</script>


		<?php
			$nameErr = $msgErr = " "; # bad name/no content
			if ($_SERVER["REQUEST_METHOD"] == "POST")
				verify();

			function verify(){ // checks if data entered is valid
				// in future checks account/login data

				#get data fra form
				$name = trim($_POST['navn']);
				$msg = $_POST['msg'];

				// error checking
				$err = false;
				if ($name === "" || $name === "tate" || $name === "Tate" ||
				 	$name === "Admin" || $name === "Mod"
				) {
					$err = true;
					$GLOBALS['nameErr'] = "<span id=\"badinp\">*Chose another name</span>";
				}
				if ($name === "") {
					$err = true;
					$GLOBALS['nameErr'] = "<span id=\"badinp\">*Name Required</span>";
				}
				if ($msg === ""){
					$err = true;
					$GLOBALS['msgErr'] = "<span id=\"badinp\">*Content Required</span>";
				}

				// prevent post on error
				if ($err)
					return;

				$msg = convertchars($msg); // convert approved tags
				$name = fixname($name);
				addpost($name, $msg); // Add/process post
			}

			// converts [] code, underline and bold tags to HTML, stops HTML injection,formats code
			function convertchars($msg){
				$msg = str_replace("<", "&lt;", $msg);//void html
				//newlines:
				$msg = str_replace("\\\\n", "&#92;n",$msg);//html char voids '\n'
				#$msg=str_replace("\n", "<br/>",$msg);//bad for code boxes
				//horizontal tabs:
				$msg = str_replace("\\\\t", "&#92;t",$msg);//html char voids '\t'
				$msg = str_replace("\t", "&#09;",$msg);
				//single quotes:
				$msg = str_replace("\\\\'", "&#39;",$msg);
				$msg = str_replace("\'", "&#39;",$msg);
				//double quotes:
				$msg = str_replace('\\\\"', "&#34;",$msg);
				$msg = str_replace('\"', "&#34;",$msg);
				//backslashes
				$msg = str_replace("\\\\", "&#92;",$msg);
				//blocks:
				$msg = processblocks("[code]", "[/code]",$msg);
				$msg = str_replace("[code]","<pre id='code'>",$msg);
				$msg = str_replace("[/code]","</pre>",$msg);
				$msg = processblocks("[underline]", "[/underline]", $msg);
				$msg = str_replace("[underline]","<u>",$msg);
				$msg = str_replace("[/underline]","</u>",$msg);
				$msg = processblocks("[bold]", "[/bold]", $msg);
				$msg = str_replace("[bold]","<b>",$msg);
				$msg = str_replace("[/bold]","</b>",$msg);
				return $msg;
			}

			// add blocks to satisfy extra start and end blocks
			function processblocks($startblock, $endblock, $msg){
				$diff = countmissingends($startblock, $endblock, $msg);
				if ($diff > 0) // if too many start blocks
					for($i = 0; $i < $diff; $i++)
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
				$testmsg = $msg;//prevents destruction of $msg
				$startnum = substr_count($testmsg, $startblock);
				$testmsg = $msg;
				$endnum = substr_count($testmsg, $endblock);
				return $startnum - $endnum;
			}

			// prevents html in name
			function fixname($name){
				$name = str_replace("<", "&lt;", $name);//void html
				$name = str_replace("\\\\n", "&#92;n",$name);//html char voids '\n'
				$name = str_replace("\\\\t", "&#92;t",$name);//html char voids '\t'
				return $name;
			}

			// writes post to thread file
			function addpost($name, $msg){
				$post = makepost($name, $msg);
				$post .= file_get_contents("thread.txt");
				file_put_contents("thread.txt", $post);
				return;
			}

			// writes post to thread file
			function addposttobottom($name, $msg){
				$file = fopen("thread.txt","a");
				fwrite($file, makepost($name, $msg));
				fclose($file);
				return;
			}

			// generates post html via template using info given
			function makepost($name, $msg){
				// password as name means admin post (extremely insecure but idc)
				if ($name === "PASSWORD_GOES_HERE")
					$post = "\n<div id=\"post\"><table id=\"iconname\"><tr><td><img id=\"ico\" src=\"//dvtate.com/chat/admin.jpg\"  height=\"80px\" alt=\"profile picture\" title=\"SysAdmin: Can edit and/or delete your posts.\"/></td><td id=\"info\"><b>Name</b>: Tate";
				else {
					$post = "\n<div id=\"post\"><table id=\"iconname\"><tr><td><img id=\"ico\" src=\"//dvtate.com/chat/guest.png\" height=\"80px\" alt=\"profile picture\" title=\"Guest\" /></td><td id=\"info\"><b>Name</b>: ";
					$post .= $name;
				}

				$post .= " <br/> <b>Date</b>: ";
				$date = getdate(date("U")); // check date
				$post .= "$date[weekday], $date[month] $date[mday], $date[year]";//convert date into a string
				$post .= "</td></tr></table><div class=\"msg\"><object>";
				$post .= $msg;
				$post .= "</object></div></div><br/>\n";
				return $post;
			}

			function getthread(){//returns the current blog as text/html from file
				$filename = "thread.txt";
				$file = fopen($filename, "r");
				if ($file == false) // failed to open file(not good)
				   return "<div class=\"main\"><h2><u>This is embarrassing</u>:</h2><hr/>There was an error, please try again later</div>";

				$filesize = filesize($filename); // length of file
				$filetext = fread($file, $filesize); // set $filetext to the contents of the file
				fclose($file);
				return $filetext;
			}
		?>
		<div class="main" id="newpost">
			<h2><strong>Post Something:</strong></h2>
			<form action="index.php" id="postdat" name="postdat" method="post">
				<h4 style="display: inline">Name: </h4><input type="text" name="navn"
				 	id="brugersNavn" placeholder="ie- John Smith" onKeyUp="chkin()" required="true"
					title="What is your name? What do you go by?"
				/><?php echo $nameErr; ?>

				<table width="100%"><tr>
					<td>
						<div id="msgwrap">
							<textarea ng-model="mytext" onKeyUp="chkin()" ng-allow-tab required="true"
							 id="msgin" rows="10" cols="100" name="msg" form="postdat" placeholder="What's up?"
							 title="What do you want to say?"></textarea>
						</div>
					</td><td id="insertbtns">
						<div id="insertbtns"><!--insert blocks-->
							<input type="button" id="block" value="Bold" onclick="addblock(1)"/>
							<!--<input type="button" id="block" form="postdat" value="Image"/>--><!--TODO: Implement-->
							<input type="button" id="block" value="Underline" onclick="addblock(2)"/>
							<input type="button" id="block" value="Code" title="Add a code box" onclick="addblock(3)"/>
						</div>
					</td>
				</tr></table>

				<input type="submit" id="postit" value="Post" title="Send your message" />
				<?php echo $msgErr; ?>
			</form>
		</div><br/>

		<?php
			echo getthread(); // print the chat log
		?>

		<br/>

		<center><span id="social_footer"></span></center>
		<script>genFooter("social_footer");</script>

		
	</body>
</html>
