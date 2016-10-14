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
		<style type="text/css" id="talksyle">#block{border:1px solid #000;}input#postit{display:block;border:1px solid #000;background-color:#EAEAEA;}a#lyse{color: #090;font-family:'Ubuntu', sans-serif; height: 15px;}</style>
		<script language="javascript" type="text/javascript"><!--//tab button adds tab to post
			function enabletabbing(){
				var textareas=document.getElementsByTagName('textarea');
				var count=textareas.length;
				for(var i=0;i<count;i++){
					textareas[i].onkeydown=function(e){
						if(e.keyCode==9||e.which==9){
							e.preventDefault();
							var s=this.selectionStart;
							this.value=this.value.substring(0,this.selectionStart)+"\t"+
							this.value.substring(this.selectionEnd);
							this.selectionEnd=s+1;
			}}}chkin()}//-->
		</script><script language="javascript" type="text/javascript"><!--adds blocks
			function addblock(type){
				if(type==3)document.postdat.msg.value+="\n[code]\nenter code here\n[/code]";
				else if(type==2)document.postdat.msg.value+="[underline]put text here[/underline]";
				else if(type==1)document.postdat.msg.value+="[bold]put text here[/bold]";
			}
			function chkin(){//pronounced chicken
				if(document.getElementById("brugersNavn").value!=""&&document.getElementById("msgin").value!="")
					document.getElementById("newpost").style.borderLeft="20px solid green";
				else document.getElementById("newpost").style.borderLeft="20px solid red";
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
		<ul class="pages"><!--page-link menu-->
			<li class="page" id="home"><a class="here" href="//dvtate.com/">Home</a></li>
			<li class="page" id="icategory" onclick=""><a class="page">Hobbies</a>
				<ul class="dpages" id="hob">
					<li class="dpage"><a class="page" href="//dvtate.com/prog/" >Programming</a></li>
					<li class="dpage"><a class="page" href="//dvtate.com/3d/" >3d modelling</a></li>
					<li class="dpage"><a class="page" href="//dvtate.com/forge/" >Blacksmithing</a></li>
					<li class="dpage"><a class="page" href="//dvtate.com/lab/" >The Lab</a></li>
					<li class="dpage"><a class="page" href="//dvtate.com/tanks/" >My Aquariums</a></li>
					<li class="dpage"><a class="page" href="//dvtate.com/os/" >Operating Systems</a></li>
				</ul>
			</li>&nbsp;<li class="page" id="category"><a class="page" href="//dvtate.com/chat/">Chat</a></li>
			<li class="page" id="category"><a class="page" href="//dvtate.com/calc/">Calculators</a></li>
			<li class="page" id="category"><a class="page" href="//dvtate.com/school/">College</a></li>
		</ul><?php
			$nameErr=$msgErr=" ";#bad name/no content
			if($_SERVER["REQUEST_METHOD"]=="POST"){verify();}
			function verify(){//checks if data entered is valid
				//in future checks account/login data
				$name=$_POST['navn'];$msg=$_POST['msg'];#get data fra form
				$name=trim($name);$err = false;
				if($name===""|| $name==="tate"||$name==="Tate"||$name==="Admin"||$name==="Mod")
					{$err = true;$GLOBALS['nameErr']="<span id=\"badinp\">*Chose another name</span>";}
				if($name===""){$err = true;$GLOBALS['nameErr']="<span id=\"badinp\">*Name Required</span>";}
				if($msg===""){$GLOBALS['msgErr']="<span id=\"badinp\">*Content Required</span>";}
				if($err){return;}//prevent post on error
				$msg=convertchars($msg);//convert approved tags
				$name=fixname($name);
				addpost($name, $msg);//Add/process post
				return;
			}
			function convertchars($msg){//converts MY code, underline and bold tags to HTML, stops HTML injection,formats code
				$msg=str_replace("<", "&lt;", $msg);//void html
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
				//backslashes
				$msg=str_replace("\\\\", "&#92;",$msg);
				//blocks:
				$msg=processblocks("[code]", "[/code]",$msg);
				$msg=str_replace("[code]","<pre id='code'>",$msg);
				$msg=str_replace("[/code]","</pre>",$msg);
				$msg=processblocks("[underline]", "[/underline]", $msg);
				$msg=str_replace("[underline]","<u>",$msg);
				$msg=str_replace("[/underline]","</u>",$msg);
				$msg=processblocks("[bold]", "[/bold]", $msg);
				$msg=str_replace("[bold]","<b>",$msg);
				$msg=str_replace("[/bold]","</b>",$msg);
				return $msg;
			}function processblocks($startblock, $endblock, $msg){
				$diff=countmissingends($startblock, $endblock,$msg);
				if($diff>0){//if too many start blocks
					for($i=0;$i<$diff; $i++){
						$msg .= $endblock;
					}
				}elseif($diff<0){//too many end tags
					$msgholder=$msg;
					$msg="";
					for($i=0;$i>$diff; $i--){
						$msg.= $startblock;
					}$msg.=$msgholder;
				}return $msg;
			}function countmissingends($startblock, $endblock,$msg){//returns difference between the number of starting tags and ending tags
				$testmsg=$msg;//prevents destruction of $msg
				$startnum=substr_count($testmsg, $startblock);
				$testmsg=$msg;
				$endnum=substr_count($testmsg, $endblock);
				return $startnum-$endnum;
			}
			function fixname($name){//prevents html in name
				$name=str_replace("<", "&lt;", $name);//void html
				$name=str_replace("\\\\n", "&#92;n",$name);//html char voids '\n'
				$name=str_replace("\\\\t", "&#92;t",$name);//html char voids '\t'
				return $name;
			}
			function addpost($name, $msg){//writes post to thread file
				$post=makepost($name, $msg);
				$post.=file_get_contents('thread.txt');
				file_put_contents('thread.txt', $post);
				return;
			}function addposttobottom($name, $msg){//writes post to thread file
				$file = fopen("thread.txt","a");
				fwrite($file, makepost($name, $msg));
				fclose($file);
				return;
			}function makepost($name, $msg){//creates the html for the post from the information given
				$mydate=getdate(date("U"));//check date
				$date="$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]";//convert date into a string
				if($name==="Like I\'d actually give you the admin password XDD"){//password as name means admin post
					$post="\n<div id=\"post\"><table id=\"iconname\"><tr><td><img id=\"ico\" src=\"//dvtate.com/chat/guest.png\" height=\"80px\" alt=\"profile picture\" title=\"Guest\" /></td><td id=\"info\"><b>Name</b>: Tate";
				}else{
					$post="\n<div id=\"post\"><table id=\"iconname\"><tr><td><img id=\"ico\" src=\"//dvtate.com/chat/guest.png\" height=\"80px\" alt=\"profile picture\" title=\"Guest\" /></td><td id=\"info\"><b>Name</b>: ";
					$post.=$name;
				}$post.= " <br/> <b>Date</b>: ";
				$post.=$date;
				$post.="</td></tr></table><div class=\"msg\"><object>";
				$post.=$msg;
				$post.="</object></div></div><br/>\n";
				return $post;
			}
			function getthread(){//returns the current blog as text/html from file
				$filename="thread.txt";
				$file=fopen($filename, "r");
				if($file==false){//failed to open file(not good)
				   return "<div class=\"main\"><h2><u>This is embarrassing</u>:</h2><hr/>There was an error, please try again later</div>";
				}$filesize=filesize($filename);//length of file
				$filetext=fread($file, $filesize);//set $filetext to the value of the file
				fclose($file);
				return $filetext;
			}
		?>
		<div class="main" id="newpost"><h2><strong>Post Something:</strong></h2>
			<form action="default.php" id="postdat" name="postdat" method="post">
				<h4 style="display: inline">Name:</h4><input type="text" name="navn" id="brugersNavn" placeholder="ie- John Smith" onKeyUp="chkin()" required="true" title="What is your name? What do you go by?"/><?php echo $nameErr; ?><table width="100%"><tr>
					<td><div id="msgwrap">
						<textarea ng-model="mytext" onKeyUp="chkin()" ng-allow-tab required="true" id="msgin" rows="10" cols="100" name="msg" form="postdat" placeholder="What's up?" title="What do you want to say?"></textarea>
					</div></td><td id="insertbtns">
						<div id="insertbtns"><!--insert blocks-->
							<input type="button" id="block" value="Bold" onclick="addblock(1)"/>
							<!--<input type="button" id="block" form="postdat" value="Image"/>-->
							<input type="button" id="block" value="Underline" onclick="addblock(2)"/>
							<input type="button" id="block" value="Code" title="Add a code box" onclick="addblock(3)"/>
						</div>
					</td>
				</tr></table><input type="submit" id="postit" value="Post" title="Send your message" /><?php echo $msgErr; ?>
			</form>
		</div><br/><?php echo getthread();//print the blog?>
		<center><a href="//dvtate.com/chat/source.html" target="_blank" id="lyse">View Source</a>
			<a rel="license" href="http://creativecommons.org/licenses/by-sa/4.0/" target="_blank" title="This work is licensed under a Creative Commons Attribution-ShareAlike 4.0 International License.">
				<img alt="Creative Commons License" style="border-width:0" src="https://licensebuttons.net/l/by-sa/4.0/80x15.png"/>
			</a><div class="g-follow" data-href="https://plus.google.com/+Tatetesta" data-height="15" data-rel="{relationshipType}"></div><!--g+ follow-->
			<div class="g-plusone" data-size="small" data-annotation="inline" data-width="300"></div><!--g+1-->
		</center><script type="text/javascript">var downloadLink = document.getElementById('button');addListener(downloadLink,'click',function(){ga('send','event','button','click','postedsomething');});
			function addListener(element,type,callback){if(element.addEventListener)element.addEventListener(type, callback);
			else if(element.attachEvent)element.attachEvent('on' + type, callback);}
		</script>
	</body>
</html>

	
