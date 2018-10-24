<?
global $MESS;
include("lang/".LANGUAGE_ID."/install/options.php");

$bg = COption::GetOptionString("intelma.comingsoon", "bg".SITE_ID);
$logo = COption::GetOptionString("intelma.comingsoon", "logo".SITE_ID);
$date = COption::GetOptionString("intelma.comingsoon", "datetimepicker".SITE_ID);
$text = COption::GetOptionString("intelma.comingsoon", "text".SITE_ID);
$fb = COption::GetOptionString("intelma.comingsoon", "fb".SITE_ID);
$vk = COption::GetOptionString("intelma.comingsoon", "vk".SITE_ID);
$ok = COption::GetOptionString("intelma.comingsoon", "ok".SITE_ID);
$websta = COption::GetOptionString("intelma.comingsoon", "websta".SITE_ID);
$tel = COption::GetOptionString("intelma.comingsoon", "tel".SITE_ID);
$mail = COption::GetOptionString("intelma.comingsoon", "mail".SITE_ID);
if(!$bg) $bg='/bitrix/images/intelma.comingsoon/bg.jpg';
?>
<!DOCTYPE HTML>
<head>
<meta charset="utf-8">
<title><?=$header?></title>
<meta http-equiv="X-UA-Compatible" content="chrome=1">
<!--<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=PT+Sans+Narrow+Lobster:regular,bold"> -->
<link rel="stylesheet" type="text/css" href="/bitrix/themes/intelma.comingsoon/styles.css">
</head>

<body id="home">
<div id="Header">

<p class="logo_fn"><img src="<?=$logo;?>" alt='logo'></p>

<div class="wrapper">
</div>

</div>
<div id="Content" class="wrapper"> 
<div class="countdown styled"></div> 
<h2 class="intro"><?=$text?></h2>
<div id="subscribe"> 
	<div id="socialIcons">
		<ul> 
			<!--<li><a href="" title="Twitter" class="twitterIcon"></a></li> -->
			<?if (!$fb=="") echo "<li><a href='$fb' title='facebook' class='facebookIcon' target='_blank'></a></li>";?>
			<?if (!$vk=="") echo "<li><a href='$vk' title='vk' class='vkIcon' target='_blank'></a></li>";?>
			<?if (!$ok=="") echo "<li><a href='$ok' title='ok' class='okIcon' target='_blank'></a></li>";?>
			<?if (!$websta=="") echo "<li><a href='$websta' title='websta' class='webstaIcon' target='_blank'></a></li>";?> 
		</ul>
	</div>
</div>

<div class="templ">
    <span>Photo by <a href="https://unsplash.com/photos/jLZWzT_kdTI?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Jérôme Prax</a> on <a href="/?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Unsplash</a></span>
    </br>
</div>
<div class="rek">
    <?echo GetMessage("ICS_CNTCT")?> <?=$tel?>  </br><a href="mailto:<?=$mail?>"><?=$mail?></a>
</div>
</div>

<div id="overlay"></div>

<!--Scripts-->
<script type="text/javascript" src="/bitrix/js/intelma.comingsoon/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="/bitrix/js/intelma.comingsoon/Backstretch.js"></script>
<script type="text/javascript" src="/bitrix/js/intelma.comingsoon/jquery.countdown.js"></script>
<script type="text/javascript">$.backstretch("<?=$bg?>"); </script>


<?
if($date){
$date=$date.":00"; 
?>
<script type="text/javascript">
$( 
function() 
{
	var endDate = "<?=$date?>"; 
	$('.countdown.simple').countdown({ date: endDate });
	$('.countdown.styled').countdown({
	  date: endDate,
	  render: function(data) {
		$(this.el).html("<div>" + this.leadingZeros(data.days, 3) + " <span><?=$MESS["ICS_D"]?></span></div><div>" + this.leadingZeros(data.hours, 2) + " <span><?=$MESS["ICS_H"]?></span></div><div>" + this.leadingZeros(data.min, 2) + " <span><?=$MESS["ICS_M"]?></span></div><div>" + this.leadingZeros(data.sec, 2) + " <span><?=$MESS["ICS_S"]?></span></div>");
	  }
	});
	$('.countdown.callback').countdown({
	  date: +(new Date) + 10000,
	  render: function(data) {
		$(this.el).text(this.leadingZeros(data.sec, 2) + " sec");
	  },
	  onEnd: function() {
		$(this.el).addClass('ended');
	  }
	}).on("click", function() {
	  $(this).removeClass('ended').data('countdown').update(+(new Date) + 10000).start();
	});

});
</script>
<?}?>
</body>
</html>
