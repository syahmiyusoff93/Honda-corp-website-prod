<?php
	include_once "config.php";
	include_once "include/affectedlist.php";

	$anticache = '&_v='.microtime();
?><html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="theme-color" content="#000" />
		<!-- SAI 2021 update 2 -->

		<title><?php echo $meta_title?></title>
		<meta name="description" content="<?php echo $meta_desc; ?>" />
		<meta name="keywords" content="<?php echo $meta_keywords; ?>" />
		<meta name="author" content="<?php echo $meta_author ?>">

		<!-- <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" /> -->
		<link rel="shortcut icon" type="image/x-icon" href="https://honda.com.my/img/icon/honda-favicon-v2.ico?ser=6fe653f0f209babad09154b247454f720614b57d" />
		<!-- <link rel="shortcut icon" type="image/x-icon" href="https://www.honda.com.my/img/icon/honda-favicon.ico?ser=dc55d9be651f1be8f49aaaffde61808957a3fbdb" /> -->
						
		<meta property="og:url" content="<?php echo $meta_url; ?>" />		
		<meta property="og:image" content="<?php echo $meta_image; ?>" />
		<meta property="og:description" content="<?php echo $meta_desc; ?>"/>
		<meta property="og:title" content="<?php echo $meta_title; ?>"/>

		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<link rel="stylesheet" href="vendor/bootstrap-3.3.7/dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/bootstrap-3.3.7/dist/css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
		<link rel="stylesheet" href="css/jquery.mCustomScrollbar.css" />
		<link rel="stylesheet" href="css/style.css?v=2.1.4<?=@$anticache?>">
		<style>

			#hondatouch_norep, #hondatouch_rep {
				cursor: pointer;
			}

			.not-content {
				position: relative;
			}


			.pudNotice052021 {
			    float: left;
			    position: relative;
			    left: 50%;
			    transform: translate(-50%);
			}

			@media (max-width: 1600px) and (min-width: 1366px) {
				#hondatouch_rep > img {
					/* width: 16.5vw !important;*/
				}
			}

			@media (min-width: 720px) {
				#hondatouch_rep {
					position: relative;
				    float: right;
				    /*top: 63px;*/
				    text-align: right;
				    padding-right: 22px;
				   

				}
			}

			@media (max-width: 1365px) {
				#hondatouch_rep {
					position: relative;
				    width: 100%;
				    max-width: 297px;
				    margin: auto;
				    padding-bottom: 10px;
				}

				#hondatouch_rep > img {
					/* max-width: 260px !important;*/
				    width: 100% !important;
				    margin: auto;
				}

			}

			@media (min-width: 768px) {
				#hondatouch_norep {
				    position: absolute;
				    right: 27px;
				    bottom: 12px;

				}

				.mCSB_container {
				   /* overflow: visible;*/
				    width: auto;
				    height: auto;
				    /* height: calc(100% + 110px ); */
				}

				.info-wrapper .mCSB_container {
				    /* overflow: visible; */
				    
				    height: auto;
				    
				}

			}	

			@media (max-width: 767px) {
				.mCSB_container {
				    overflow-y: scroll;
				    width: auto;
				    height: auto;
				}

				#hondatouch_norep {
				    position: relative;
				    width: 100%;
				    margin-top: 10px;
				    margin-bottom: 0px;
				    text-align: center;
				    
				}

				.hideonmobile {
					display: none;
				}


			}


			/*Tooltip*/

			.tooltips {
			  position: relative;
			  /*display: inline;*/
			}

			.tooltips span {
				 font: 300 11px 'Open Sans', sans-serif;
			    position: absolute;
			    color: #000000;
			    background: #fffb94;
			    padding: 12px 20px;
			    width: 225px;
			    text-align: center;
			    visibility: hidden;
			    opacity: 0;
			    filter: alpha(opacity=0);
			    transition: transform .3s, opacity .6s, margin-left .2s, margin-top .2s;
			    text-align: left;
			    transform: translate(-30px, -20px) !important;
			    height: 60px;
			    border-radius: 10px;
			}

			.tooltips > span img{max-width:140px;}

			.tooltips[tooltip-position="top"] span{
			  margin-left:10px;
			  -ms-transform: rotate(30deg);
			  -webkit-transform: rotate(30deg);
			  transform: rotate(30deg);
			 
			}

			.tooltips[tooltip-position="top2"] span{
			  margin-left:10px;
			  -ms-transform: rotate(30deg);
			  -webkit-transform: rotate(30deg);
			  transform: rotate(30deg);
			 
			}

			.tooltips[tooltip-position="bottom"] span{
			  -ms-transform: rotate(-30deg);
			  -webkit-transform: rotate(-30deg);
			  transform: rotate(-30deg);
			}

			.tooltips span:after {
			  content: '';
			  position: absolute;
			  width: 0; height: 0;
			}

			.tooltips[tooltip-position="top"] span:after{
			  top: 100%;
			  left: 50%;
			  margin-left: -60px;
			  border-top: 8px solid #fffb94;
			  border-right: 8px solid transparent;
			  border-left: 8px solid transparent;
			}

			.tooltips[tooltip-position="top2"] span:after{
			  top: 100%;
			  left: 50%;
			  margin-left: -60px;
			  border-top: 8px solid #fffb94;
			  border-right: 8px solid transparent;
			  border-left: 8px solid transparent;
			}

			.tooltips[tooltip-position="bottom"] span:after{
				  bottom: 100%;
				  left: 30%;
				  margin-left: -8px;
				  border-bottom: 8px solid #fffb94;
				  border-right: 8px solid transparent;
				  border-left: 8px solid transparent;
				}

			.tooltips:hover span {
			  visibility: visible;
			  opacity: 1;
			  z-index: 999;
			  -ms-transform: rotate(0deg);
			  -webkit-transform: rotate(0deg);
			  transform: rotate(0deg);
			  filter: alpha(opacity=100);
			}

			.tooltips[tooltip-position="top"]:hover span{
			  bottom: 38px;
			  left: 50%;
			  margin-left: -76px;
			}


			.tooltips[tooltip-position="top2"]:hover span{
			  bottom: 40px;
			  left: 43%;
			  margin-left: -76px;
			}

			.tooltips[tooltip-position="bottom"]:hover span{
				 top: 76px;
				    left: 30%;
				    margin-left: -36px;
				}



		</style>



		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-81112918-3', 'auto');
		  ga('send', 'pageview');

		</script>
	</head>
	<body>
		<div class="orientation-warning">
			<img src="img/hondalogo.svg"/>
			<div class="orientation-content">
				<img src="img/orientation-warning.svg"/>
				<p style="margin-top: 20px;">Please rotate your phone to portrait orientation.</p>
			</div>
		</div>
		<div class="body-wrapper">
	        
	        <div class="guide-overlay"></div>
	        <!-- <h3 class="close-guide-mobile">CLOSE X</h3> -->
			<div class="header">
				<div class="productupdateoverlay"></div>
				<div class="loading_overlay"></div>
				<a href="" class="logo-link"><div class="logo"></div></a>
				<a href="javascript:;" class="useful-guides"><img src="img/guide-icon-sm.svg"/><span class="mobile-hide">USEFUL GUIDES</span><span class="glyph-guide glyphicon glyphicon-triangle-bottom" aria-hidden="true" style="margin-left: 10px;top: 2px;"></a>
				<div class="guide-expanded">
					<img class="bubble-top" src="img/bubble-top.png"/>
					<ul class="dark-gray">
						<li class="close-guide-mobile"><a href="javascript:;">CLOSE X</a></li>
						<li style="border-bottom: solid 1px #bfc4cf;padding: 0px 0 5px 0;"><a href="faq/FAQ.pdf" target="_blank" class="guide-link">Frequently Asked Questions<span class="glyphicon glyphicon-arrow-right hidden" aria-hidden="true" style="margin-left: 10px;top: 2px;"></span></a></li>
						<li style="padding: 5px 0 0px 0;"><a href="img/Scenario-merged.jpg" target="_blank" class="guide-link">Process Flow Scenarios<span class="glyphicon glyphicon-arrow-right hidden" aria-hidden="true" style="margin-left: 10px;top: 2px;"></span></a></li>
					</ul>
					<ul class="white">
						<li style="border-bottom: solid 1px #bfc4cf;padding-bottom: 5px;">
							<p style="margin: 5px 0;line-height: 0px;font-weight: 800;"><span class="glyphicon glyphicon-earphone" aria-hidden="true" style="margin-right: 10px;top: 2px;"></span>CALL US</p>
							<p style="color: #cc0000;font-size: 16px;font-weight: 800;margin: 0;"><a href="tel:1800882020">1800 88 2020</a> <span style="color: black;font-size: 14px;font-weight: 200;">or</span> <a href="tel:0379532000">03 7953 2000</a></p>
						</li>
					</ul>
					<ul class="light-gray">
						<p style="margin: 0px 0 5px 0;line-height: 0px;font-weight: 800;"><span class="glyphicon glyphicon-time" aria-hidden="true" style="margin-right: 10px;top: 2px;"></span>OPERATING HOURS</p>
						<!-- <p style="font-weight: 800;">Mon - Fri&nbsp;&nbsp;|&nbsp;&nbsp;<span style="font-size: 16px;color: #cc0000;">9:00am - 5:00pm</span></p>
						<p style="font-weight: 800;line-height: 20px;margin: 0;">Closed for lunch</p>
						<p style="line-height: 20px;">Mon - Thu&nbsp;&nbsp;|&nbsp;&nbsp;12:40pm - 2:30pm<br>Fri&nbsp;&nbsp;|&nbsp;&nbsp;12:40pm - 2:30pm</p> -->
						<p style="font-weight: 800;line-height: 20px;margin: 0;">Monday - Friday</p>
						<p style="line-height: 20px;margin: 0 0 5px 0;">9:00am - 5:00pm</p>
						<!--<p style="font-weight: 800;line-height: 20px;margin: 0;">Friday</p>
						<p style="line-height: 20px;margin: 0 0 5px 0;">9:00am - 12:40pm&nbsp;&nbsp;|&nbsp;&nbsp;2:30pm - 5:00pm</p>-->
						<p style="font-size: 12px;font-style: italic;">Closed during weekends and public holidays</p>
						<!-- <p style="font-size: 12px;font-style: italic;">*Honda Call Centre will resume operations from</p>
						<p style="font-size: 12px;font-style: italic;margin-top: -23px;">13th May 2020 onwards (9am - 5pm) during the</p>
						<p style="font-size: 12px;font-style: italic;margin-top: -23px;">Conditional Movement Control order (CMCO).</p> -->
						<!-- <p style="font-size: 12px;font-style: italic;">Honda Call Centre is closed for periodic system maintenance</p>
						<p style="font-size: 12px;font-style: italic;margin-top: -23px;">and will resume tentatively on Monday, 22nd June 2020.</p>
						<p style="font-size: 12px;font-style: italic;margin-top: -23px;">All website enquiries will be attended to once operations resume.</p>
						<p style="font-size: 12px;font-style: italic;">We apologise for any inconvenience caused.</p> -->
					</ul>
					 
					<!-- <ul class="honda-red">
						<li><a href="http://www.honda.com.my" target="_blank" class="guide-link" style="color: white;">Go to www.honda.com.my<span class="glyphicon glyphicon-arrow-right" aria-hidden="true" style="margin-left: 10px;top: 2px;"></span></a></li>
					</ul> -->
					<img class="bubble-bottom" src="img/bubble-bottom.png"/>
				</div>
			</div>
			<section class="landing">
				<?php /* Whatsapp Biz section */ ?>

				<style>
					.wapopup {display: none; position: fixed; z-index: 13; padding-top: 60px; left: 0;top: 0;width: 100%; height: 100%; overflow: auto; background-color: rgb(0,0,0); background-color: rgba(0,0,0,0.4); }
					.wapopup-content {background-color: #e9e9e9;width: 50%;float: right;margin-right: 65px; display: inline-flex;margin-top: 60px;}
					.close {color: #eb1d1d;float: right;font-size: 28px;font-weight: bold;padding: 10px 15px;opacity: 1;}
					.close:hover, .close:focus {color: #000;text-decoration: none;cursor: pointer;}

					.wa-btn {width: 50px; height: 50px; right: 15px; cursor: pointer;z-index: 4;position: absolute;}
					.wa-btn img {width: 100%;}
					.left-content {float: left; width: 35%; background: #128c7f;padding: 30px 15px;}
					.left-content img {width: 100%;top: 15px;position: relative;}
					.left-content p {text-align: center;position: relative;top: 0px;color: #fff;}
					.right-content {float: left;width: 65%;}
					.content-box {padding: 45px 40px;background: #fefefe;}
					.wa-title {font-weight: bold;line-height: 2;font-size: 18px;}
					.wa-desc {font-size: 14px;}
					.wa-step {font-weight: bold;}
					/*.note-box{white-space: break-spaces;}*/
					.note-box{}
					.note-box div {padding: 30px 40px; font-size: 10px;}
					.note-box div span {line-height: 2;font-weight: bold;}

					.clearfix {clear: both;}
					.mobile {display: none;}
					.desktop {display: block;}

					@media (max-width: 768px) {
					      .wa-btn {right: 0px;top: 71px;}
					      .wa-btn img {width: 80%;}
					      .wapopup {top: 0;}
					      .wapopup-content {margin: auto;display: block;float: unset;width: 95%;margin-top: 45px;}
					      .right-content {float: unset;width: unset;}
					      .content-box {text-align: center;}
					      .wa-title {line-height: 1;}
					      .startchat-btn {background: #25d366;padding: 10px 30px;}
					      .startchat-btn img {width: 20%;padding-right: 10px;}
					      .startchat-btn span {position: relative;top: 0px;color: #fff;}

					      .content-box a {text-decoration-line: none;}
					      .mobile-note {font-size: 9px;font-style: italic;}

					      .mobile {display: block;}
					      .desktop {display: none;}
					}

				</style>
				<?php /* hide 20210423
				<div id="clickwa" class="wa-btn"><img src="img/whatsapp/whatsApp.png"></div>
				<div id="wapopupcontent" class="wapopup">
				  <div class="wapopup-content">
				    <div class="left-content desktop"><img src="img/whatsapp/QR.png"><p>Honda Malaysia</p></div>
				    <div class="right-content desktop">
				      <span class="close">&times;</span>
				      <div class="content-box">
				        <div class="wa-title">SUBSCRIBE TO US ON WHATSAPP</div>
				        <div class="wa-desc">Get direct notifications and updates from Honda Malaysia.</div>
				        <br>
				        <div class="wa-step">Step 1:</div>
				        <div class="wa-desc">Click or scan QR code to start WhatsApp chat.</div>
				        <br>
				        <div class="wa-step">Step 2:</div>
				        <div class="wa-desc">Click on Send to subscribe.</div>
				      </div>
				      <div class="note-box">
				          <div><span>Note:</span><br>This <strong>WhatsApp</strong> number is not reachable via call or SMS. Kindly contact our call-centre at <span style="white-space: nowrap;">1800 88 2020</span> or <span style="white-space: nowrap;">603-7948 9000</span> (Within <strong>Malaysia</strong>), Monday to Friday: 9am - 5pm (Closed during weekends and public holidays).</div>
				      </div>
				    </div>
				    <div class="clearfix"></div>

				    <!-- mobile -->
				    <div class="right-content mobile">
				      <span class="close">&times;</span>
				      	<div class="content-box">
					        <div class="wa-title">SUBSCRIBE TO US ON WHATSAPP</div><br>
					        <div class="wa-desc">Get direct notifications and updates from Honda Malaysia. Click on ‘Start Chat’, then hit Send to subscribe.</div>
					        <br>
					        <a href="http://o.etracker.cc/YO83GCI3"><div class="startchat-btn"><img src="img/whatsapp/ForCTA_WhatsApp.png"><span>Start Chat</span></div></a> <br>
					        <div class="wa-desc mobile-note">This <strong>WhatsApp</strong> number is not reachable via call or SMS. Kindly contact our call-centre at <span style="white-space: nowrap;">1800 88 2020</span> or <span style="white-space: nowrap;">603-7948 9000</span> (Within <strong>Malaysia</strong>), Monday to Friday: 9am - 5pm (Closed during weekends and public holidays).</div>
				    	</div>
				  	</div>

				  </div>
				</div>

				 Whatsapp Biz end */ ?>
				<div class="title-wrapper">
					<div class="title title-landing">
						<h1 style="margin-top: 0;"><?=@$landing_title?></h1>
						
							<p><?=@$landing_copy?></p>
						
						<h2>Does your vehicle require a Product Update?</h2>
						<a href="javascript:;" class="start-btn">Check your vehicle</a><span class="glyphicon glyphicon-menu-right" aria-hidden="true" style="top: 3px;color: white;"></span>
						<p style="font-weight: 500;">If you are an owner of a <span style="font-weight: 800;">reconditioned model</span>,<br>kindly visit any of our Honda Authorised Dealers for further assistance.</p>
					</div>
				</div>
				<div class="affected">
					<div class="affected-title">
						<h2>List of affected vehicles</h2>
						<a href="javascript:;" class="affected-close"><span class="mobile-hide">CLOSE </span>X</a>
					</div>
					<div class="affected-nav desktop-hide">
						<p><span class="affected-nav-model">MODEL</span><span class="affected-nav-yearmodel">&nbsp;&nbsp;>&nbsp;&nbsp;YEAR MODEL</span><span class="affected-nav-parts">&nbsp;&nbsp;>&nbsp;&nbsp;AFFECTED PARTS</span></p>
					</div>
					<!-- <div class="affected-disclaimer">
						<p>NOTE: Only the models with the years listed are affected.</p>
					</div> -->
					<div id="list-model" class="list-column">
						<ul>
							<li class="list-title">SELECT MODEL:</li>
							
							<?php
	
								foreach($model_list as $key => $val){
									echo '<li data-model="'.$val['textcode'].'">'.$val['name'].'<img class="right-arrow" src="img/right-arrow.png"/></li>';
								}
								
							?>
							
		                    
						</ul>
						<div class="scroll-note">
							<p>Scroll for more</p>
							<img src="img/down-arrow.png"/>
						</div>
					</div>
					
					<div id="list-year" class="list-column">
						<ul>
							<li class="list-title yearmodel">SELECT YEAR MODEL:</li>
							<?php
								/*
								foreach($yearmodels as $yearmodel){
									echo '<li class="yearmodel '.$yearmodel['model'].' '.$yearmodel['class'].'" data-code="'.$yearmodel['code'].'">';
									echo $yearmodel['year'].'<img class="right-arrow" src="img/right-arrow.png"/>';
									echo '</li>';
								}
								*/
							
								// 2018
								foreach($affected_list as  $model => $val){
									foreach($val as  $year => $partidarr){
										echo '<li class="yearmodel '.$model.'" data-code="'.implode(',', $partidarr).'">';
										echo $year.'<img class="right-arrow" src="img/right-arrow.png"/>';
										echo '</li>';
									}
									
								}
							?>
						</ul>
					</div>
					<div id="list-parts" class="list-column">
						<ul>
							<li class="affected-parts part-title">AFFECTED PARTS:</li>
						</ul>
						<table>
							<?php
								
								foreach($affected_parts as $key => $val){
									echo '
										<tr class="affected-parts '.$val['textcode'].' dbpartid'.$val['id'].'">
											<td><img src="img/'.$val['icon'].'"/></td>
											<td>'.$val['name'].'</td>
										</tr>
									';
								}
							
							?>
							
							
						</table>
						
						<div class="affected-parts part-cta">
							<p>Please confirm the status of your vehicle using the Vehicle Identification Number (VIN / CHASSIS Number).</p>
							<a href="javascript:;" class="start-btn">Check your vehicle</a>
							<span class="glyphicon glyphicon-menu-right" aria-hidden="true" style="top: 3px;color: white;"></span>
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="gradient"></div>
				</div>
				<div class="bottom-nav">
					<div class="row">
						<div class="equalcol col-sm-4 nav-btn" id="nav-affected" style="border-right: 1px solid rgba(255, 255, 255, 0.41);">
							<img src="img/affected-icon.svg">
							<h3>LIST OF AFFECTED VEHICLES</h3>
						</div>
						<?php
							$files = scandir('faq/flyer', SCANDIR_SORT_DESCENDING);
							$newest_file = $files[0];
						?>

						<div class="equalcol col-sm-4 nav-btn" id="nav-guide">
							<img src="img/guide-icon.svg">
							<h3>USEFUL GUIDES</h3>
						</div>
					</div>
					<div class="social-footer">
						<ul class="social-left">
							<!-- <li><a href="javascript:;" class="fb-btn"></a></li> -->
							<li><p class="fb-btn" style="height: 30px;padding: 5px 15px 5px 10px;color: white;cursor: pointer;"><img src="img/share-icon.svg" style="width: 20px;margin-top: -4px;margin-right: 10px;"/>SHARE ON FACEBOOK</p></li>
						</ul>
						<ul class="social-right">
							<!-- <li><a href="http://twitter.com/share?text=Check%20now%20if%20your%20vehicle%20requires%20a%20product%20update%20from%20Honda%20Malaysia%20https://productrecall.honda.com.my/" class="twitter-btn"></a></li> -->
							<li><a href="https://www.facebook.com/hondamalaysia/" class="fb-icon" target="_blank"><img src="img/icon_facebook.svg" style="height: 25px;margin-top: 2px;"/></a></li>
							<li><a href="https://www.instagram.com/hondamalaysia" class="insta-icon" target="_blank"><img src="img/icon_instagram.svg" style="height: 25px;margin-top: 2px;"/></a></li>
							<li><a href="https://www.youtube.com/user/MyHondaTV" class="youtube-icon" target="_blank"><img src="img/icon_youtube.svg" style="height: 25px;width: 25px;margin-top: 2px;"/></a></li>
							<li><a href="https://www.honda.com.my" class="corporate-link" target="_blank">www.honda.com.my</a></li>
						</ul>
						<div class="social-rights">
							<p>&copy; <?=date('Y')?> Honda Malaysia Sdn. Bhd.<br>(200001029513) (532120-D) All Rights Reserved</p>
						</div>
					</div>
				</div>
				<style type="text/css">
					.equalcol {width: 50%;}

					@media (max-width: 768px) {
						.equalcol {width: 100%;}
					}
				</style>
			</section>
			<section class="vin">
				<div class="title-wrapper check-vin">
					<div class="step-margin" id="step-1">
						<div class="not-required-bg"></div>
						<div class="not-required">
							<div class="not-title">
								<h3>Status</h3>
							</div>
							<div class="not-content">
								<p>Your vehicle with Vehicle Identification Number : <span class="not-vin">PMHFD26306D402170</span> does not require any replacement.<br><br>If you need further clarification, please call Honda’s Toll Free number at 1-800-88-2020 or visit any,<br class="hideonmobile" /> Honda Authorised Dealer.</p>
								<a href="javascript:;" class="not-main">Back to main</a>
								<a href="javascript:;" class="not-restart">Try another VIN</a>
								<div id="hondatouch_norep" onclick="hondatouchurl()" class="tooltips" tooltip="Learn more & get the latest updates about HondaTouch App" tooltip-position="bottom"><img src="img/download-hondatouch_xl.png">  </div>

							</div>
						</div>
						<div class="howto" id="trypage">
							<div class="howto-title">
								<h3>Locate VIN / CHASSIS Number</h3>
								<a href="javascript:;" id="close-howto">CLOSE X</a>
							</div>
							<div class="howto-content">
								<p>VIN or chassis number is available on the JPJ Registration Card, Service Booklet or Body of Vehicle.</p>
								<!-- <img src="img/vin_instruct.png"/> -->
								<div class="vin-instruct"></div>
							</div>
						</div>
						<div class="step_wrapper">
							<h1>What is your Vehicle Identification Number<br>(VIN / CHASSIS Number) ?</h1>
							<p class="element-label">VIN / CHASSIS NUMBER <span id="vin-error"></span></p>
							<form class="productupdateform" onsubmit="return false">
		                        <div class="vin_wrapper">
		                        	<input type="text" name="vin" class="vininput" placeholder="example: PMHGD86503D100001 or ES1-900012">
		                        </div>
		                        <input type="submit" name="vinsubmit" class="vinsubmit" value="Submit" style="display: none;">
		                    </form>
							<a href="javascript:;" class="dont-know-vin">I don’t know my VIN / CHASSIS number</a>
						</div>
					</div>
					<div class="step-margin" id="step-2">
						<div class="step_wrapper">
							<!-- <div class="car-image">
								<img src="img/car.png"/>
							</div> -->
							<div class="car-model">
								<p style="color: #9b9da0;">CAR MODEL</p>
								<h2>Honda Accord</h2>
								<h3 style="font-family: 'Conv_ProximaNova-Regular';font-size: 16px;">..car year make..</h3>
							</div>
							<div class="car-vin">
								<p style="color: #9b9da0;">VIN NUMBER</p>
								<h2 style="text-transform: uppercase;">XXX</h2>
							</div>
							<div class="row">
								<div class="diagnosis-wrapper">
									<div class="content">
										<h3 class="req">Your vehicle requires <span id="rowNum">3</span> Product Update(s).</h3>
										<table class="diagnosis">
											<!--auto populate-->
										</table>

										<div id="hondatouch_rep" onclick="hondatouchurl()" class="tooltips" tooltip="Learn more & get the latest updates about HondaTouch App" tooltip-position="top"><img src="img/download-hondatouch_xl.png" style="width: 100%;"></div>

									</div>
								</div>
								<div class="info-wrapper">
									<div class="content">
										<img class="info-icon" src="img/info-icon.svg"/>
										<h3 style="text-align: center;width: 100%;margin: auto;line-height: 26px;">Always committed to efficiently assist you</h3>
										<p style="text-align: center;">Our database is updated every week so that we’re always on top&nbsp;of things.<br><br>If you need further clarification, please call Honda’s Toll Free number at 1-800-88-2020, or visit any Honda Authorised dealer.</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="step-margin" id="step-3">
						<div class="step_wrapper">
							<h1>Which dealer do you prefer for<br>your vehicle’s Product Update?</h1>
							<p class="element-label">SELECT DEALER</p>
							<select id="select_dealer" onchange="checkstock();">
		                        <option value="0">Select Dealer</option>

								<?php 
									
									$sql = "select a.id, a.region, a.dealer_name from productupdatedealers a where a.showDealer = 'yes' order by a.position, a.region, a.dealer_name";
								    $stmt = $conn->prepare($sql);
								    $stmt->execute();    
								    $prevregion = "";
								    while ($row = $stmt->fetch()) 
								    {
										if ($prevregion != $row['region'])
								        {
											if ($prevregion != "")
								            {
												echo '</optgroup>';
											}
											echo '<optgroup label="'.$row['region'].'">';
											$prevregion = $row['region'];
										}
										echo '<option value="'.$row['id'].'">'.$row['dealer_name'].'</option>';
									}
								?>
								
		                        </optgroup>
							</select>
							<a href="javascript:;" class="check-stock" id="show-stock" target="_blank">View all dealers and stock list</a>
							<div class="stock-availability">
								<table class="part_stock">
									<!--auto populate-->
								</table>
							</div>
						</div>
					</div>
					<div class="step-margin" id="step-4">
						<div class="step_wrapper">
							<h1 style="margin-bottom: 0;">We’ll contact you soon<br>to schedule your appointment</h1>
							<p class="form-desc">Kindly provide us your contact details and we’ll reach you within 3 working days to schedule an appointment for your vehicle’s Product Update at your selected dealer.</p>
							<h3>Selected dealer: <span class="preferred-dealer" style="color: #cc0000"></span></h3>
							<form class="updateemailform" onsubmit="return false">		
								<p class="element-label">FULL NAME AS PER IC <span id="name-error"></span></p>	          
				              	<input type="text" name="updatename" class="updatename user_form_field">
				              	<p class="element-label">CONTACT NUMBER <span id="mobile-error"></span></p>
				              	<input type="text" name="updatehpno" class="updatehpno user_form_field">
				              	<p class="element-label">EMAIL <span id="email-error"></span></p>
				              	<input type="text" name="email" class="updateemail user_form_field">
					            <div class="clr"></div>
				               	<input type="submit" name="vinsubmit" class="updateemailsubmit validcontainerlinkstyle" value="Submit" style="display: none;">
				          	</form>
			          	</div>
					</div>
					<div class="step-margin" id="step-5">
						<div class="step_wrapper">
							<img src="img/success-icon.png" style="margin: 20px auto;"/>
							<h1 style="margin-top: 0;">Thank you.</h1>
							<p>Your request <span id="ticketID">..enter ticket number..</span> has been submitted successfully. We’ll contact you within 3 working days.</p>
							<div class="line"></div>
							<p>If you need further clarification,<br>please call Honda’s Toll Free number at 1-800-88-2020, or visit any Honda Authorised dealer.</p>
							<!-- <p style="font-style: italic;">Honda Call Centre is closed for periodic system maintenance and will resume tentatively on Monday, 22nd June 2020.<br>All website enquiries will be attended to once operations resume. We apologise for any inconvenience caused.</p> -->
							<div class="social-sharing hidden">
								<p class="social-desc"><img src="img/share-icon.svg" style="width: 20px;margin-top: -4px;margin-right: 10px;"/>Tell your friends:</p>
								<a href="javascript:;" class="fb-btn"></a>
								<a href="http://twitter.com/share?text=Check%20now%20if%20your%20vehicle%20requires%20a%20product%20update%20from%20Honda%20Malaysia%20https://productrecall.honda.com.my/" class="twitter-btn"></a>
							</div>
						</div>
					</div>
				</div>
				<div class="vin-nav">
					<div class="vin-progress">
						<div class="mobile-pagination">
							<p>STEP 1 / 2</p>
						</div>
						<a href="javascript:;" class="prev-btn"><span class="glyphicon glyphicon-menu-left" aria-hidden="true" style="margin-right: 10px;top: 2px;position: relative;width: auto;"></span>Back</a>
						<ul>
							<li class="active nav-1">1</li><span class="active nav-title-1">Enter VIN Number</span>
							<li class="nav-2">2</li><span class="nav-title-2">View vehicle status</span>
							<li class="nav-3">3</li><span class="nav-title-3">Preferred dealer</span>
							<li class="nav-4">4</li><span class="nav-title-4">Enter contact details</span>
							<li class="nav-5">5</li><span class="nav-title-5">Request submitted</span>
						</ul>
						<a href="javascript:;" class="next-btn">Next<span class="glyphicon glyphicon-menu-right" aria-hidden="true" style="margin-left: 10px;top: 2px;position: relative;width: auto;"></span></a>
						<a href="javascript:;" class="home-btn"><span class="glyphicon glyphicon-home" aria-hidden="true" style="margin-right: 20px;top: 2px;position: relative;width: auto;"></span>Back To Main</a>
					</div>
				</div>
			</section>
		</div>
		<script type="text/javascript">
			var productText = { 

				<?php 
					$out = '';
					foreach ($affected_parts as $key => $value) {
						$out .=  $value['textcode'].': "'.$value['name'].'",';
					}
					$out = substr($out, 0, -1);
					echo $out;
				?>
			   
			  }
			
			var inspectParts = { 

				<?php 
					$out = '';
					foreach ($inspect_parts as $key => $value) {
						$out .=  $value.': "'.$value.'",';
					}
					$out = substr($out, 0, -1);
					echo $out;
				?>
			   
			  }

			  var wapopup = document.getElementById("wapopupcontent");
					var wabtn = document.getElementById("clickwa");
					var closespan = document.getElementsByClassName("close")[0];

					if (wabtn) {
						wabtn.onclick = function() {
						  wapopup.style.display = "block";
						}
					}

					if (closespan) {
						closespan.onclick = function() {
						  wapopup.style.display = "none";
						}
					}

					if (wapopup) {
						window.onclick = function(event) {
						  if (event.target == wapopup) {
						    wapopup.style.display = "none";
						  }
						}
					}


				

			        function hondatouchurl() {
			            var Android = /(android)/i.test(navigator.userAgent); 
			            var iOS =  /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream; 
			              
			           /* if(Android) { 
			                window.location = "https://play.google.com/store/apps/details?id=com.honda.HondaTouch.prod";
			            } else if(iOS) {
			                window.location = "https://apps.apple.com/us/app/id1528936599";
			            } else {
			                window.location = "https://hondatouch.honda.com.my/login";
			            }*/
			              
			           window.location = "https://www.honda.com.my/aftersales/hondatouch";
			        }


			       
       

		</script>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
		<script src="vendor/bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
		<script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
		<script type="text/javascript" src="js/jquery.validate.min.js"></script>
		<script type="text/javascript" src="js/main.js?v=<?=microtime()?>"></script>
		<script>
			 $('.tooltips').append("<span></span>");
			 $(".tooltips").mouseenter(function(){
			 $(this).find('span').empty().append($(this).attr('tooltip'));
			 });


		</script>

	</body>
</html>