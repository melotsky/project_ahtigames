<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>redirect to casino.</title>
<style>
body, html {
	background-color: #343436;
	color:#fff;
	font-size: 18px;
	margin:0;
	height:100%;
}

#loading{
	background-color: #343436;
	height: 100%;
	width: 100%;
	position: fixed;
	z-index: 1;
	margin-top: 50px;
	top: 0px;
	text-align: center;
}
/* spinner*/
#floatingCirclesG{
	position:relative;
	width:125px;
	height:125px;
	margin:auto;
	transform:scale(0.6);-o-transform:scale(0.6);-ms-transform:scale(0.6);-webkit-transform:scale(0.6);-moz-transform:scale(0.6);
}

.f_circleG{
	position:absolute;
	background-color:rgb(255,255,255);
	height:22px;
	width:22px;
	border-radius:12px;-o-border-radius:12px;-ms-border-radius:12px;-webkit-border-radius:12px;-moz-border-radius:12px;
	animation-name:f_fadeG;-o-animation-name:f_fadeG;-ms-animation-name:f_fadeG;-webkit-animation-name:f_fadeG;-moz-animation-name:f_fadeG;
	animation-duration:1.2s;-o-animation-duration:1.2s;-ms-animation-duration:1.2s;-webkit-animation-duration:1.2s;-moz-animation-duration:1.2s;
	animation-iteration-count:infinite;-o-animation-iteration-count:infinite;-ms-animation-iteration-count:infinite;-webkit-animation-iteration-count:infinite;-moz-animation-iteration-count:infinite;
	animation-direction:normal;-o-animation-direction:normal;-ms-animation-direction:normal;-webkit-animation-direction:normal;-moz-animation-direction:normal;
}

#frotateG_01{
	left:0;
	top:51px;
	animation-delay:0.45s;-o-animation-delay:0.45s;-ms-animation-delay:0.45s;-webkit-animation-delay:0.45s;-moz-animation-delay:0.45s;
}

#frotateG_02{
	left:15px;
	top:15px;
	animation-delay:0.6s;-o-animation-delay:0.6s;-ms-animation-delay:0.6s;-webkit-animation-delay:0.6s;-moz-animation-delay:0.6s;
}

#frotateG_03{
	left:51px;
	top:0;
	animation-delay:0.75s;-o-animation-delay:0.75s;-ms-animation-delay:0.75s;-webkit-animation-delay:0.75s;-moz-animation-delay:0.75s;
}

#frotateG_04{
	right:15px;
	top:15px;
	animation-delay:0.9s;-o-animation-delay:0.9s;-ms-animation-delay:0.9s;-webkit-animation-delay:0.9s;-moz-animation-delay:0.9s;
}

#frotateG_05{
	right:0;
	top:51px;
	animation-delay:1.05s;-o-animation-delay:1.05s;-ms-animation-delay:1.05s;-webkit-animation-delay:1.05s;-moz-animation-delay:1.05s;
}

#frotateG_06{
	right:15px;
	bottom:15px;
	animation-delay:1.2s;-o-animation-delay:1.2s;-ms-animation-delay:1.2s;-webkit-animation-delay:1.2s;-moz-animation-delay:1.2s;
}

#frotateG_07{
	left:51px;
	bottom:0;
	animation-delay:1.35s;-o-animation-delay:1.35s;-ms-animation-delay:1.35s;-webkit-animation-delay:1.35s;-moz-animation-delay:1.35s;
}

#frotateG_08{
	left:15px;
	bottom:15px;
	animation-delay:1.5s;-o-animation-delay:1.5s;-ms-animation-delay:1.5s;-webkit-animation-delay:1.5s;-moz-animation-delay:1.5s;
}



@keyframes f_fadeG{
	0%{background-color:rgb(0,0,0);}
	100%{background-color:rgb(255,255,255);}
}

@-o-keyframes f_fadeG{
	0%{background-color:rgb(0,0,0);}
	100%{background-color:rgb(255,255,255);}
}

@-ms-keyframes f_fadeG{
	0%{background-color:rgb(0,0,0);}
	100%{background-color:rgb(255,255,255);}
}

@-webkit-keyframes f_fadeG{
	0%{background-color:rgb(0,0,0);}
	100%{background-color:rgb(255,255,255);}
}

@-moz-keyframes f_fadeG{
	0%{background-color:rgb(0,0,0);}
	100%{background-color:rgb(255,255,255);}
}
</style>
<script>setTimeout(function(){window.location='<?=$url?>';},2000);</script>
</head>
<body>
<div id="loading">
	<div id="floatingCirclesG">
		<div class="f_circleG" id="frotateG_01"></div>
		<div class="f_circleG" id="frotateG_02"></div>
		<div class="f_circleG" id="frotateG_03"></div>
		<div class="f_circleG" id="frotateG_04"></div>
		<div class="f_circleG" id="frotateG_05"></div>
		<div class="f_circleG" id="frotateG_06"></div>
		<div class="f_circleG" id="frotateG_07"></div>
		<div class="f_circleG" id="frotateG_08"></div>
	</div>
</div>
</body>
</html>
