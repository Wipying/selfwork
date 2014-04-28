
<!DOCTYPE HTML>
<html lang="en">
<head>
    <link rel="canonical" href="/en/tools/baby-costs-calculator"/>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Baby Cost Calculator</title> 
	<meta name="viewport" content="width=device-width, initial-scale=1" /> 

	<link rel="stylesheet" href="https://www.moneyadviceservice.org.uk/static/tools/baby/css/jquery.mobile-1.0.min.css" />
	<link rel="stylesheet" href="https://www.moneyadviceservice.org.uk/static/tools/baby/css/theme.css" />
	
	<!-- <script type="text/javascript" src="http://fbug.googlecode.com/svn/lite/branches/firebug1.4/content/firebug-lite-dev.js"></script> -->
	
	<!--[if lte IE 7]>
		<script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE7.js"></script>
		<link rel="stylesheet" href="css/ie7.css" />
	<![endif]-->	

	<!-- All JavaScript at the bottom, except for Modernizr / Respond.
	Modernizr enables HTML5 elements & feature detects; Respond is a polyfill for min/max-width CSS3 Media Queries
	For optimal performance, use a custom Modernizr build: www.modernizr.com/download/ -->
	<script type="text/javascript" src="https://www.moneyadviceservice.org.uk/static/tools/baby/js/modernizr-2.0.6.min.js"></script>	
	<script type="text/javascript" src="https://www.moneyadviceservice.org.uk/static/tools/baby/js/jquery-1.6.4.min.js"></script>
	<script type="text/javascript" src="https://www.moneyadviceservice.org.uk/static/tools/baby/js/jquery.easing.1.3.js"></script>
	<script type="text/javascript" src="https://www.moneyadviceservice.org.uk/static/tools/baby/js/jquery.mobile-1.0.min.js"></script>
	<script type="text/javascript" src="https://www.moneyadviceservice.org.uk/static/tools/baby/js/loopedslider.min.js"></script>
	 <script type="text/javascript" src="https://www.moneyadviceservice.org.uk/static/tools/baby/js/ga-script.js"></script>
	  <script type="text/javascript" src="https://www.moneyadviceservice.org.uk/static/tools/baby/js/campaigntracking.js"></script>
	<script type="text/javascript" src="https://www.moneyadviceservice.org.uk/static/tools/baby/js/mustache.js"></script>
	<script type="text/javascript" src="https://www.moneyadviceservice.org.uk/static/tools/baby/js/pure.js"></script>
	<script type="text/javascript" src="https://www.moneyadviceservice.org.uk/static/tools/baby/js/json2.js"></script>
	<script type="text/javascript" src="https://www.moneyadviceservice.org.uk/static/tools/baby/js/plugin.js"></script>
	<script type="text/javascript" src="https://www.moneyadviceservice.org.uk/static/tools/baby/js/babytool.js"></script>
	

	</head> 
<body class="page-1"> 

<div id="baby-cost-calc-page" data-role="page" class="page-1" >

<div id="container">
<div class="canvas-area">
		<div id="language-selector">
			<a class="lang-link eng" id="langLinken">English</a>
			<a class="lang-link last" id="langLinkcy">Cymraeg</a>
		</div>
	</div>	
    <div id="header" >
		<div class="site-info-wrapper">
			<div class="site-info-block">
				<div class="block-inner clearfix">
					<h1 class="page-title">Baby cost calculator</h1>
					<img class="tool-image" src="https://www.moneyadviceservice.org.uk/static/tools/baby/img/images/header_image.png" height="74" width="102" alt="baby tool calculator logo" />
				</div>
			</div>		
		</div>
    </div>
	
    <div id="main" role="main" class="clearfix">
		
		<div id="intro-wrapper">
		
			<div id="intro-box" class="clearfix">
				<div class="inner clearfix">
					<h2 class="intro-title">Find out how much some of the essential things may cost you from birth through to baby&rsquo;s first year.</h2> 
					<hr />
					<p>Did you know that an average family spends nearly &pound;9,500 on their baby in the first year, including childcare.  What you spend may be more or less, depending on your childcare choices.</p>
					<p>But even without childcare having a baby doesn&rsquo;t come cheap. We all want the best for our baby, and we can show you how you can manage it without breaking your budget.</p>  
					<p>We&rsquo;ve listed some of the essential things you&rsquo;ll need for baby with their average costs, so use the calculator to pick and choose what you need and see what they&rsquo;ll cost you.</p>
					<p>And if it seems you can&rsquo;t afford what you thought you wanted, you can change your choices to find something within your budget.</p>
					<p>Firstly, you&rsquo;ll need to know what you need to buy and whether you&rsquo;re going to borrow things from family or friends.</p>
					<strong>Don&rsquo;t forget!</strong>
					<p>The costs are only a guide based on our own research. You may be able to find things cheaper or dearer, or you may want things not in our calculator.</p>
					<strong>Your choices are confidential</strong>
					<p>We won&rsquo;t see them, store them or pass them on to anyone else.</p>
					<p>Are you ready?  Well, lets <strong>Get started</strong></p>
				</div>
			</div>
			
			<div id="framing-questions" class="control-block clearfix">
				<div class="main-control-box clearfix">

					<fieldset data-role="controlgroup" >
                    		<legend><p class="instructions">Select an estimated spend level.</p></legend>
							<input type="radio" name="radio-choice-1" id="radio-choice-1" value="low" data-corners="false" />
							<label class="radio-1" for="radio-choice-1">
								<span class="main-question">
									Low spend
								</span>
								<span class="sub-question">
									(typically for a second child)
								</span>
							</label>

							<input type="radio" name="radio-choice-1" id="radio-choice-2" value="medium" data-corners="false" />
							<label class="radio-2" for="radio-choice-2">
								<span class="main-question">
									Average Spend
								</span>
								<span class="sub-question">
									(based on national averages)
								</span>						
							</label>

							<input type="radio" name="radio-choice-1" id="radio-choice-3" value="high" data-corners="false" />
							<label class="radio-3" for="radio-choice-3">
								<span class="main-question">
									High Spend 
								</span>
								<span class="sub-question">
									(based on national averages)
								</span>						
							</label>					
							<input id="start-tool-btn" type="button" value="get started" data-inline="true" data-corners="false" data-shadow="false" />

					</fieldset>

				</div>
				
			</div>

		
				
		</div>
		

		<!-- Results Block -->
		<div class="results-block">
			<div class="clearfix resultsbar">
				<input type="hidden" id="babymaxcost" value="0" />
				<input type="hidden" id="totaltxt" value="0" />
				<div id="totalamt-text">We've estimated how much your baby could cost you through to their first birthday based on the options you've chosen. Look to see what we've included in the estimated costs � you can remove anything you don't want. Use the sliders to choose how much you want to spend in each area.</div>
				<div class="totalamt-wrapper">
					<div class="box">
						<div class="inner">
							<span class="totaltext totaltext1">
								Your choices cost
							</span>
							<div id="totalamt">0</div>
							<span class="totaltext totaltext2">
								in baby's first year
							</span>
						</div>					
					</div>
				</div>
			</div>
			
		</div>
		
		<table id="baby-cost-tool" class="tool">			
			<thead class="header">
				<tr>
					<th class="expense-col">
						<div class="inner">							
						</div>
					</th>
					<th class="more-col">
						<div class="inner">							
						</div>
					</th>					
					<th class="na-col">
						<div class="inner">
						</div>
					</th>
					<th class="cost-col">
						<div class="inner">
						</div>
						<a href="#" class="printlink">Print</a>
					</th>					
				</tr>
			</thead>
			<tbody></tbody>
		</table>
        
		<div id="review-expense-box" style="display: none;">
			<div class="inner">
			</div>
			<div class="tool-btn">
				<input type="button" value="Save and Close" id="close-sub-items" data-shadow="false" />
			</div>
		</div>

    </div>
	
    <div id="footer">
		<div class="regionInner clearfix">
		
			<!--@start: tips/action links -->
			<div class="tips-box clearfix">
				<div class="inner">
					<h3 class="box-title">3 Easy Ways to make the most of your money.</h3>
					<ul id="actionLinkList" class="clearfix">
						<li class="actionLink">
							<a><span class="uiText"></span></a>
						</li>
					</ul>
				</div>
			</div>
		<!--@end: tips/action links -->
		
		</div>
    </div>

	<!--
  <script type="text/javascript" charset="utf-8">  
     $(function(){  
        $('#loopedSlider').loopedSlider({  
             autoStart: 5000  
         });  
     });  
 </script> 
 
-->
	<div id="endorsement"> 
		<hr class="hr"/>  
		<div id="loopedSlider"> 
			<div class="container">  
				<ul class="slides testiList">  

					<li class="slide testiItem">
						<img alt="Netmums Logo" src="https://www.moneyadviceservice.org.uk/static/tools/baby/img/images/image1.jpg" class="featuredImage" />
						<h3 class="title">Netmums Logo</h3>
						<div class="testiTextWrapper clearfix">
							<span class="bbqLeft">&ldquo;</span>
							<p class="testiText"></p>
						</div>
					</li>

				</ul> 
			  <a href="#" title="Testimonials" class="contenttrig" style="display:none;">testimonials</a>
			  <a id="leftControl" href="#" class="con previous">next</a>
			  <a id="rightControl" href="#" class="con next">previous</a>
			</div> 
		</div> 
	</div>    
	
	<div id="bottom-region">
		<div class="region-inner">
			<input class="printlink" type="button" value="Print" data-role="none" />
		</div>
	</div>
	
	<!-- if javascript is disabled -->
	<noscript>
		<style type="text/css">
			#intro-wrapper, 
			.results-block,
			#main,
			#footer,
			#tool-diag	{
				display:none;
			}
		</style>
		<div class="compatibilitymsg">
			<p>
			This tool requires a Javascript-enabled browser. If your browser does not support scripting, please consider upgrading to the latest version of <a href="http://windows.microsoft.com/en-us/internet-explorer/products/ie/home">Internet Explorer</a>,  <a href="http://www.firefox.com">Mozilla Firefox</a> or <a href="https://www.google.com/chrome/">Google Chrome</a>.
			</p> 
		</div>
	</noscript>
	
	<!--[if lte IE 6]>
		<style type="text/css">
			#intro-wrapper, 
			.results-block,
			#main,
			#footer,
			#tool-diag	{
				display:none;
			}
		</style>	
		<div class="compatibilitymsg">
			<p>
			Unfortunately this tool does not work in Internet Explorer version 6 and below. Please consider upgrading to a more recent version of <a target="_blank" href="http://windows.microsoft.com/en-us/internet-explorer/products/ie/home">Internet Explorer</a> or switching to another browser such as <a target="_blank" href="http://www.firefox.com">Mozilla Firefox</a> or <a target="_blank" href="https://www.google.com/chrome/">Google Chrome</a>.
			</p>
		</div>
	<![endif]-->
	
  </div> <!--! end of #container -->
  
</div><!--! end of #baby-cost-calc-page -->
	
    
	<!-- our custom overlay plus tool tip box -->
	<div class="tool-tip-box-mod clearfix">
		<div class="top-deco"></div>
		<div class="header clearfix">
			<div class="inner"><h2>help</h2></div>
		</div>
		<div class="inner-body">
		</div>
		<a class="close-btn up">Close</a>
		<a class="close-btn down">Close</a>
		<div class="bottom-deco"></div>
	</div>
	<div id="overlay-mod"> </div>
	<div id="tool-diag" class="actionPageDiag easyWayDialog">
		<div class="inner clearfix">
			<div class="main clearfix">To use this tool, you need to use javascript.</div>
		</div>
		<input id="close-tool-diag" type="button" value="Close" data-corners="false" data-shadow="false" />
	</div>
	
</body>
</html>
