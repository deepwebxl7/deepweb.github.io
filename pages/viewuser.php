<?php
session_start();
include("bd.php");
if (empty($_SESSION['login']) or empty($_SESSION['id']))
{
$ad = "none";
}
else
   {
	   	if($_SESSION['progres'] == '5' or $_SESSION['progres'] == '4'){
$ad = "true";
		}
		else{
			$ad = "none";
		}
   }
if(!empty($_GET['id']))
{
$usersanalize = mysql_query("SELECT * FROM users WHERE `id` = '{$_GET['id']}'");
$user = mysql_fetch_array($usersanalize);
}else{echo "<meta http-equiv='Refresh' content='0; URL=../index.php'>Error!";}
?>
<!DOCTYPE html>
<html>
<title>IT-Forum</title>
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="../css/materialize.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
  <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/polz.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link id="ndmode" rel="stylesheet" href="">
  <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
  <title>IT-Forum</title>
</head>

<body style="color: white; background: url(../img/darkweb_bitcoin.jpg) no-repeat center center fixed; background-size: cover;">
  <div class="loaderArea">
      <div class="loader"></div>
   </div>
     <div class="navbar">
    <nav id="main" style="height: 80px;">
        <nav class="nav-extended z-depth-0 container xxx">
      <div class="nav-wrapper">
        <a href="#" data-target="slide-out" class="sidenav-trigger">
          <i class="material-icons">menu</i>
        </a>
        <a href="#" class="brand-logo">
          <img style="height:80px;" src="../img/logo.png">
        </a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
          <div class="nav_top">
          <li class="nav_t waves-effect waves-light">
            <a href="../index.php">
              <span style="font-size: 16px;">Main</span>
            </a>
          </li>
          <li class="nav_t waves-effect waves-light">
            <a href="#">
              <span style="font-size: 16px;">Info</span>
            </a>
          </li>
          <li class="nav_t waves-effect waves-light borderrightwhite">
            <a href="#">
              <span style="font-size: 16px;">Forum</span>
            </a>
          </li>
        </div>
        </ul>
      </div>
    </nav>
    </nav>
  </div>

<div class="nav_bar_left hide-on-med-and-down">
    <div class="collection">
        <a href="#" onclick="document.getElementById('con3').style.display = 'none'; document.getElementById('con2').style.display = 'none'; document.getElementById('con1').style.display = ''; document.getElementById('tab1').className = ''; document.getElementById('tab2').className = ''; document.getElementById('tab3').className = ''; document.getElementById('tab1').className += 'activate'; " class="collection-item">Main</a>
        <a href="#" onclick="document.getElementById('con1').style.display = 'none'; document.getElementById('con3').style.display = 'none'; document.getElementById('con2').style.display = ''; document.getElementById('tab1').className = ''; document.getElementById('tab2').className = ''; document.getElementById('tab3').className = ''; document.getElementById('tab2').className += 'activate'; " class="collection-item">Panel</a>
        <a href="#" class="collection-item" onclick="document.getElementById('con1').style.display = 'none'; document.getElementById('con2').style.display = 'none'; document.getElementById('con3').style.display = ''; document.getElementById('tab1').className = ''; document.getElementById('tab2').className = ''; document.getElementById('tab3').className = ''; document.getElementById('tab3').className += 'activate'; ">Profile</a>
        <a href="#" class="collection-item">Alvin</a>
      </div>
	  <div id="div" class="center xxx">
	  <?php
// Проверяем, пусты ли пересменные логина и id пользователя
if (empty($_SESSION['login']) or empty($_SESSION['id']))
{
// Если пусты, то мы не выводим ссылку
echo "Вы вошли на сайт, как гость";
echo " <br><a href='login.php'>Log in</a>";
echo " <br><a href='reg.php'>Register</a>";
$logbull = "none";
$musttolog = "";
}
else
   {
	if($_SESSION['status'] == 'Пользователь'){$ststm = "";}	
	if($_SESSION['status'] == 'Проверенный'){$ststm = "";}
	if($_SESSION['status'] == 'Moderator'){$ststm = "moder";}
	if($_SESSION['status'] == 'VIP'){$ststm = "vip";}
	if($_SESSION['status'] == 'Administrator'){$ststm = "admin";}
	$logbull = "";
	$musttolog = "none";
    echo "Вы вошли на сайт, как<br><img class='circle photoprofile' src='".$_SESSION['photo']."'> <br><span class='person'>".$_SESSION['login']."</span><br>";
	echo "<span class='".$ststm."'>".$_SESSION['status']."</span><br>";
	echo "Reputation<br>";
	echo "<progress min='1' max='5' value='".$_SESSION['progres']."'></progress><br>";
	echo "<a class='btn' href='logout.php'>Выйти</a>";
   }
?>
<br>
</div>
	  <div id="timedisplay" class="center"></div>
	          <input class="btn waves-light" value="Show Date" onclick="alert(new Date())">
      <h6>Night Mode</h6>
      <div class="switch on">
          <label>
            Off
            <input id="nightmode" onchange="fun1()" type="checkbox" checked>
            <span class="lever">
            </span>
            On
          </label>
        </div>
</div>
<div class="hide-on-med-and-down nav_bar_right">
<div>
<h6>Администрация форума в сети</h6>
<hr>
<?php
					$query13 = mysql_query("SELECT * FROM users WHERE online='online'");
    $array0 = mysql_fetch_array($query13);
		do{
			if($array0['progres'] >= '4'){
echo "<img src='".$array0['photo']."' class='circle smallphotoprofile'><a class='person' href='pages/viewuser.php?id=".$array0['id']."'><button type='submit'>".$array0['login']."</button></a><br>";
			}else{
				echo "Никого нету в сети";
			}
		}while($array0 = mysql_fetch_array($query13));
		?>
</div>
<hr>
<br>
<div class="polzv">
<h6>Пользователи в сети</h6>
<hr>
<?php
					$query13 = mysql_query("SELECT * FROM users WHERE online='online'");
    $array0 = mysql_fetch_array($query13);
		do{
						if($array0['online'] == 'online'){
echo "<a class='person' href='pages/viewuser.php?id=".$array0['id']."'><button type='submit'>".$array0['login']."</button></a>,";
						}else{
				echo "Никого нету в сети";
						}
		}while($array0 = mysql_fetch_array($query13));
		?>
		<hr>
</div>
</div>
    <div id="con1" class="container">
				    <marquee class="newsstring" direction="left">
				<p><?php
					$query8 = mysql_query("SELECT * FROM themes");
    $array78 = mysql_fetch_array($query8);
	for($i=1;$i<=3;$i++){
		do{
        echo "<a href='pages/viewtheme.php?id=".$array78['id']."'><button type='submit'>".$array78['name']."</button></a>";
		}while($array78 = mysql_fetch_array($query8));
	}
		?></p>
  </marquee>
        <nav>
    <div class="nav-wrapper xxx">
      <div class="col s12">
        <a href="javascript:history.go(-1)" class="breadcrumb">Назад</a>
		<a href="#!" class="breadcrumb">Профиль <?php echo $user['login'];?></a>
      </div>
    </div>
  </nav>
        <div>
	  <br>
	  <?php
// Проверяем, пусты ли пересменные логина и id пользователя
if (empty($user['login']) or empty($user['id']))
{
// Если пусты, то мы не выводим ссылку
echo "<div class='code left' style='width:auto;'>Вы вошли на сайт, как гость";
echo " <br><a href='pages/login.php'>Log in</a>";
echo " <br><a href='pages/reg.php'>Register</a></div>";
}
else
   {
	   		  if($user['progres'] == '5'){
			  $adminnenado = "none";
		  }else{
			  $adminnenado = "true";
		  }
	if($user['status'] == 'Пользователь'){$stst = "";}	
	if($user['status'] == 'Проверенный'){$stst = "";}
	if($user['status'] == 'Moderator'){$stst = "moder";}
	if($user['status'] == 'VIP'){$stst = "vip";}
	if($user['status'] == 'Administrator'){$stst = "admin";}
	echo "<span style='font-size:20px;'>Профиль ".$user['name']."</span>";
    echo "<div class='code' style='width:auto;'>Вы вошли на сайт, как<br><img class='circle photoprofile' src='".$user['photo']."'> <br><span class='person'>".$user['login']."</span><br>";
	echo "Статус: ".$user['online']."<br>";
			  ?>
		  <td style="display:<?php echo $ad;?>;"><a style="display:<?php echo $adminnenado;?>;" href="delete_tub.php?id=<?php echo $user['id'];?>">
<button type="submit">Delete</button>
</a></td>
		  <td style="display:<?php echo $ad;?>;"><a style="display:<?php echo $adminnenado;?>;" href="blockuserip.php?ip=<?php echo $user['ip'];?>">
<button type="submit">Бан</button><br>
</a></td>
<?php
	echo "Последний раз онлайн: ".$user['lastto'];
	echo "<br>".$user['name']." ".$user['lastname']."<br>";
	echo "<span class='".$stst."'>".$user['status']."</span><br>";
	echo "Дата регистрации: ".$user['date']."<br>";
	echo "<span style='display:".$ad.";'>".$user['ip']."<br></span>";
	echo "Reputation:<br>";
	echo "<progress min='1' max='5' value='".$user['progres']."'></progress><br>";
	echo "<a style='display:";?><?php echo $ad;?><? echo ";' href='plusrep.php?id=".$user['id']."'><button type='submit'>+</button></a>";
	echo "<a style='display:";?><?php echo $ad;?><? echo ";'href='minsrep.php?id=".$user['id']."'><button type='submit'>-</button><br></a>";
	echo "<div class='aboutme'><span>About me</span><br>".$user['aboutme']."</div></div></div>";
   }
?>
      </div>
	  	  <div id="5" class="container center" style="display:inline-block;width:60%;margin-left:20%;">
	  <br>
    <center><span class="maintext">Contact us</span></center><br>
    <div id="contactform">
    <br>
    <div class="row">
	<?php include("pages/bd.php"); ?>
        <form action="pages/sendMessage.php"  method="post" name="form" class="col s12">
          <div class="row">
            <div class="input-field col s6">
              <i class="material-icons prefix">account_circle</i>
              <input id="author" name="author" type="text" class="validate">
              <label for="icon_prefix">Имя</label>
            </div>
            <div class="input-field col s6">
              <i class="material-icons prefix">phone</i>
              <input id="icon_telephone" type="tel" class="validate">
              <label for="icon_telephone">Телефон</label>
            </div>
			<input name="js" type="hidden" value="no" id="js">
            </div>
			<br>
            <div class="input-field col s12">
                <i class="material-icons prefix">mode_edit</i>
                <textarea name="message" id="message" class="materialize-textarea"></textarea>
                <label for="icon_prefix2">Текст</label>
              </div>
			  <button style="right: 10px" class="btn waves-effect waves-light right" type="submit" name="action">Надіслати
          <i class="material-icons right">send</i>
        </button>
        </form>
      </div>
              <br><br>
              </div>
</div>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<script type="text/javascript">$(document).ready(function(){
  $(window).scroll(function () {if ($(this).scrollTop() > 0) {$('#scroller').fadeIn();} else {$('#scroller').fadeOut();}});
  $('#scroller').click(function () {$('body,html').animate({scrollTop: 0}, 400); return false;});
  });</script>
  <div id="scroller" class="b-top" style="display: none;"><span class="b-top-but">Up</span></div>
  <footer class="page-footer xxx"  style="padding-bottom: 0%; width: 100%;">
    <div class="container">
      <div class="row container">
        <div class="col l5 s6">
          <h5 class="white-text">Footer Content</h5>
          <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
        </div>
        <div class="col l3 s6">
          <h5 class="white-text">Links</h5>
          <ul>
            <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
            <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
            <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
            <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
          </ul>
        </div>
		        <div class="col l4 s12">
          <h5 class="white-text">Social</h5>
          <a class="white-text" href="https://telegram.org/" target="blank"><img class="responsive-img circle imgsm" src="../img/Telegram.png"></a>
          <a class="white-text" href="https://www.instagram.com" target="blank"><img class="responsive-img circle imgsm" src="../img/Instagram.png"></a>
          <a class="white-text" href="https://twitter.com" target="blank"><img class="responsive-img circle imgsm" src="../img/tvit.png"></a>
          <a class="white-text" href="https://www.youtube.com" target="blank"><img class="responsive-img circle imgsm" src="../img/yout.png"></a>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      © 2014 Copyright Text
      <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
      </div>
    </div>
  </footer> 
  <script src="../js/jquery-3.2.1.min.js"></script>
  <script type="text/javascript">
function getDate()
{
    var date = new Date();
    var hours = date.getHours();
    var minutes = date.getMinutes();
    var seconds = date.getSeconds();
    //По надобности условие ниже повторить с minutes и hours
    if(seconds < 10)
    {
        seconds = '0' + seconds;
    }
    document.getElementById('timedisplay').innerHTML = hours + ':' + minutes + ':' + seconds;
}
setInterval(getDate, 0);
</script>
  <script>
      $(window).on('load', function () {
        $preloader = $('.loaderArea'),
          $loader = $preloader.find('.loader');
        $loader.fadeOut();
        $preloader.delay(350).fadeOut('slow');
      });
  </script>  
</body>
<?php
	$query = mysql_query("SELECT ip FROM blockedip");
    $array = mysql_fetch_array($query);
	if($_SERVER['REMOTE_ADDR'] == $array['ip']){
		          echo "<meta http-equiv='Refresh' content='0; URL=bl.html'>Вас заблокировали по ip!Ви лох и питух.";
	}
?>
  <script src="../js/materialize.js"></script>
  <script src="../js/nav_m.js"></script>
  <script src="../js/my.js"></script>
</html>

