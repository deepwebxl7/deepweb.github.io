<?php
session_start();
include("bd.php");
if (empty($_SESSION['login']) or empty($_SESSION['id']))
{
$ad = "none";
$ads = "none";
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
$razdelanalize = mysql_query("SELECT * FROM pages WHERE `id` = '{$_GET['id']}'");
$razdel = mysql_fetch_array($razdelanalize);
}else{echo "<meta http-equiv='Refresh' content='0; URL=../index.php'>Error!";}
?>
<!DOCTYPE html>
<html>
<title>IT-Forum</title>
<head>
  <script src="https://cloud.tinymce.com/5/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
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
	  include("bd.php");
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
	};
		?></p>
  </marquee>
    <nav>
    <div class="nav-wrapper xxx">
      <div class="col s12">
        <a href="../index.php" class="breadcrumb">Main</a>
		        <a href="#!" class="breadcrumb">Просмотр раздела: <?php echo $razdel['name'];?></a>
      </div>
    </div>
  </nav>
	<span><h5><strong><?php echo $razdel['name'];?></strong></h5></span>
	<div class="code"><?php echo $razdel['description']; ?></div>
	<br>
              <div id="test1"  style="display:'';" class="col s12">
			  <table>
			                        <thead style="background-color: darkred;">
                        <tr>
                            <th >Тема</th>
                            <th class="themetd">Раздел</th>
                            <th class="themetd">Автор</th>
                            <th style="background-color:darkgreen;" class="themetdl">Статус</th>
                        </tr>
                      </thead>
			  </table>
					  <div style="height:400px; overflow-y: scroll;">
                  <table class="xxx">
                      <tbody id="1">
					  <?php
					  $namer = $razdel['name'];
	$query1 = mysql_query("SELECT * FROM themes WHERE razdel='$namer'");
    $array3 = mysql_fetch_array($query1);
    do{
	$authort = $array3['author'];
	$query2 = mysql_query("SELECT * FROM users WHERE login='$authort'"); 
    $array4 = mysql_fetch_array($query2);
	if($array4['online'] == 'online'){$colll = "green";}else{$colll = "grey";}
	    echo "<tr>";
        echo "<td class='themetdd'>".$array3['name']."<a href='viewtheme.php?id=".$array3['id']."'><button type='submit'>></button></a></td>";
        echo "<td class='themetd'>".$array3['razdel']."</td>";
echo "<td><img src='".$array4['photo']."' class='circle smallphotoprofile'><a class='person' href='viewuser.php?id=".$array4['id']."'><button type='submit'>".$array3['author']."</button></a><span style='color:".$colll.";'>".$array4['online']."</span></td>";
echo "<td class='themetd'><span class='provereno right' style='display:".$array3['status'].";'><i class='tiny material-icons'>check_circle</i> Проверено</span>";
		  if($array4['progres'] == '5'){
			  $adminnenadoc = "none";
		  }else{
			  $adminnenadoc = "true";
		  }
		  if($array3['author'] == $_SESSION['login']){$ads = 'true';}
		  else{$ads = $ads;}
		  ?>
		  <?php echo "<div style='display: ".$adminnenadoc.";'>";?>
		  <span style="display:<?php echo $ads;?>;"><a style="display:<?php echo $adminnenadoc;?>;" href="delete_theme.php?id=<?php echo $array3['id'];?>">
<button type="submit">Delete</button>
</a></span>
		  <span style="display:<?php echo $ad;?>;"><a style="display:<?php echo $adminnenadoc;?>;" href="ch_themest.php?id=<?php echo $array3['id'];?>">
<button type="submit">Change Status</button>
</a></span></div></td>
<?php
echo "</tr>";
    }while($array3 = mysql_fetch_array($query1));
		  ?>
                        </tbody>
                    </table>
					</div>
													  <a href="addtheme.php" style="display:<?php echo $logbull;?>;" class="btn waves-effect waves-light right"><i class="material-icons">add</i> Добавить тему</a>
<span class="red"  style="display:<?php echo $musttolog;?>;">Вы не вошли.<a href="login.php">Войти</a></span>
              </div>
      </div>
	  	  <div id="5" class="container center" style="display:inline-block;width:60%;margin-left:20%;">
	  <br>
    <center><span class="maintext">Contact us</span></center><br>
    <div id="contactform">
    <br>
    <div class="row">
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
                <textarea name="message" id="message" class="materialize-textarea"></textarea>
              </div>
			  <button style="right: 10px" class="btn waves-effect waves-light right" type="submit" name="action">Надіслати
          <i class="material-icons right">send</i>
        </button>
        </form>
      </div>
              <br><br>
              </div>
</div>
<script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=4pikod6o3svc6dxhlacg7advfaba1bqv0faf2acpaiegpoje"></script> 
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

