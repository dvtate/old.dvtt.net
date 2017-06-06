/// DVTate.com's JS toolkit
/// this allows me to change parts of the entire site by editing only one file
/// this will also become a js library for useful functions and things I might need for the site


// inserts a nav bar to the site
function genNavBar(id) {
	var nav = document.getElementById(id);
	nav.className += " pages";
	nav.innerHTML = "<!--page-link menu-->\
			<li class=\"page\" id=\"home\"><a class=\"here\" href=\"//dvtate.com/\">Home</a></li>\
			<li class=\"page\" id=\"icategory\" onclick=\"\"><a class=\"page\">Hobbies</a>\
				<ul class=\"dpages\" id=\"hob\">\
					<li class=\"dpage\"><a class=\"page\" href=\"//dvtate.com/prog/\">Programming</a></li>\
					<li class=\"dpage\"><a class=\"page\" href=\"//dvtate.com/3d/\">3d modelling</a></li>\
					<li class=\"dpage\"><a class=\"page\" href=\"//dvtate.com/forge/\">Blacksmithing</a></li>\
					<li class=\"dpage\"><a class=\"page\" href=\"//dvtate.com/lab/\">The Lab</a></li>\
					<li class=\"dpage\"><a class=\"page\" href=\"//dvtate.com/tanks/\">My Aquariums</a></li>\
					<li class=\"dpage\"><a class=\"page\" href=\"//dvtate.com/os/\">Operating Systems</a></li>\
				</ul>\
			</li>&nbsp;<li class=\"page\" id=\"category\"><a class=\"page\" href=\"//dvtate.com/chat/\">Chat</a></li>\
			<li class=\"page\" id=\"category\"><a class=\"page\" href=\"//dvtate.com/calc/\">Calculators</a></li>\
			<li class=\"page\" id=\"category\"><a class=\"page\" href=\"//dvtate.com/school/\">College</a></li>";

}


// inserts a social footer to the site
function genFooter(id) {
	var foot = document.getElementById(id);
	foot.innerHTML = "<a rel=\"license\" id=\"social_footer_lic\" href=\"http://creativecommons.org/licenses/by-sa/4.0/\"\
			  target=\"_blank\" title=\"This work is licensed under a Creative Commons Attribution-ShareAlike 4.0 International License.\">\
				<img alt=\"Creative Commons License\" style=\"border-width:0\" src=\"https://licensebuttons.net/l/by-sa/4.0/80x15.png\"/>\
			  </a><div class=\"g-follow\" data-href=\"https://plus.google.com/+Tatetesta\" data-height=\'15\' data-rel=\"{relationshipType}\">\
			  </div><!--g+ follow--> <div class=\"g-plusone\" data-size=\"small\" data-annotation=\"inline\" data-width=\"300\"></div><!--google+1-->";

}

// remove annoying ad my free hosting provider added
function removeHostAd() {
	var bodyElems = document.body.children;
	// delete second to last elem - the ad
	document.body.removeChild(bodyElems[bodyElems.length - 2]);
}

// google analytics code
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
ga('create', 'UA-59746939-2', 'auto');ga('send', 'pageview');
