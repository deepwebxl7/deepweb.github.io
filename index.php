<?php
session_start();
if (empty($_SESSION['login']) or empty($_SESSION['id']))
{
$ad = "none";
$ads = "none";
}
else
   {
	   	if($_SESSION['progres'] == '5' or $_SESSION['progres'] == '4'){
$ad = "true";
$ads = "true";
		}
		else{
			$ad = "none";
			$ads = "none";
		}
   }
?>
<!DOCTYPE html>
<html>
<title>IT-Forum</title>
<head>
  <script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=4pikod6o3svc6dxhlacg7advfaba1bqv0faf2acpaiegpoje"></script> 
  <script src="https://cloud.tinymce.com/5/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/materialize.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/polz.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link id="ndmode" rel="stylesheet" href="">
  <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
  <title>IT-Forum</title>
</head>

<body style="color: white; background: url(img/darkweb_bitcoin.jpg) no-repeat center center fixed; background-size: cover;">
  <div class="loaderArea">
      <div class="loader"></div>
   </div>
  <div class="navbar">
    <nav id="main" style="height: auto;">
        <nav class="nav-extended z-depth-0 container xxx">
      <div class="nav-wrapper">
        <a href="#" data-target="slide-out" class="sidenav-trigger">
          <i class="material-icons">menu</i>
        </a>
        <a href="#" class="brand-logo">
          <img style="height:80px;" src="img/logo.png">
        </a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
          <div class="nav_top">
          <li class="nav_t waves-effect waves-light">
            <a href="index.php">
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
        <div class="nav-content">
            <ul class="tabs tabs-transparent">
              <li class="tab"><a id="tab1" class="activate" href="#" onclick="document.getElementById('con3').style.display = 'none'; document.getElementById('con2').style.display = 'none'; document.getElementById('con1').style.display = ''; document.getElementById('tab1').className = ''; document.getElementById('tab2').className = ''; document.getElementById('tab3').className = ''; document.getElementById('tab1').className += 'activate'; ">Main</a></li>
              <li class="tab"><a id="tab2" href="#" onclick="document.getElementById('con1').style.display = 'none'; document.getElementById('con3').style.display = 'none'; document.getElementById('con2').style.display = ''; document.getElementById('tab1').className = ''; document.getElementById('tab2').className = ''; document.getElementById('tab3').className = ''; document.getElementById('tab2').className += 'activate'; ">Panel</a></li>
              <li class="tab"><a id="tab3" href="#" onclick="document.getElementById('con1').style.display = 'none'; document.getElementById('con2').style.display = 'none'; document.getElementById('con3').style.display = ''; document.getElementById('tab1').className = ''; document.getElementById('tab2').className = ''; document.getElementById('tab3').className = ''; document.getElementById('tab3').className += 'activate'; ">Profile</a></li>
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
	  <div id="div" class="center">
	  <?php
// Проверяем, пусты ли пересменные логина и id пользователя
if (empty($_SESSION['login']) or empty($_SESSION['id']))
{
// Если пусты, то мы не выводим ссылку
echo "Вы вошли на сайт, как гость";
echo " <br><a href='pages/login.php'>Log in</a>";
echo " <br><a href='pages/reg.php'>Register</a>";
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
	echo "<a class='btn' href='pages/logout.php'>Выйти</a>";
   }
			include ("pages/bd.php");
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
  <div id="con1" style="display: '';" class="container">
				    <marquee class="newsstring" direction="left">
				<p><?php
					$query8 = mysql_query("SELECT * FROM themes WHERE status='true'");
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
        <a href="#!" class="breadcrumb">Main</a>
      </div>
    </div>
  </nav>
        <br>
          <div class="row" id="bar1">
              <div class="col s12">
                <ul class="tabs xxx" >
                  <li class="tab col s3" onclick="document.getElementById('test3').style.display = 'none'; document.getElementById('test2').style.display = 'none'; document.getElementById('test1').style.display = ''; document.getElementById('t11t').className = 'tab21-3 '; document.getElementById('t22t').className = 'tab21-3 '; document.getElementById('t33t').className = 'tab21-3 '; document.getElementById('t11t').className += 'activate';"><a id="t11t" class="tab21-3 activate" href="#!">Список тем</a></li>
                  <li class="tab col s3" onclick="document.getElementById('test1').style.display = 'none'; document.getElementById('test3').style.display = 'none'; document.getElementById('test2').style.display = ''; document.getElementById('t11t').className = 'tab21-3 '; document.getElementById('t22t').className = 'tab21-3 '; document.getElementById('t33t').className = 'tab21-3 '; document.getElementById('t22t').className += 'activate';"><a id="t22t"class="tab21-3 " href="#!">Пользователи</a></li>
                  <li class="tab col s3 " onclick="document.getElementById('test1').style.display = 'none'; document.getElementById('test2').style.display = 'none'; document.getElementById('test3').style.display = ''; document.getElementById('t11t').className = 'tab21-3 '; document.getElementById('t22t').className = 'tab21-3 '; document.getElementById('t33t').className = 'tab21-3 '; document.getElementById('t33t').className += 'activate';"><a id="t33t"class="tab21-3 " href="#!">Новости</a></li>
                </ul>
              </div>
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
					  <div style="height:300px; overflow-y: scroll;">
                  <table class="xxx">
                      <tbody id="1">
					  <?php
	$query1 = mysql_query("SELECT * FROM themes");
    $array3 = mysql_fetch_array($query1);
    do{
	$authort = $array3['author'];
	$query2 = mysql_query("SELECT * FROM users WHERE login='$authort'"); 
    $array4 = mysql_fetch_array($query2);
	if($array4['online'] == 'online'){$colll = "green";}else{$colll = "grey";}
	    echo "<tr>";
        echo "<td class='themetdd'>".$array3['name']."<a href='pages/viewtheme.php?id=".$array3['id']."'><button type='submit'>></button></a></td>";
        echo "<td class='themetd'>".$array3['razdel']."</td>";
echo "<td><img src='".$array4['photo']."' class='circle smallphotoprofile'><a class='person' href='pages/viewuser.php?id=".$array4['id']."'><button type='submit'>".$array3['author']."</button></a><span style='color:".$colll.";'>".$array4['online']."</span></td>";
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
		  <span style="display:<?php echo $ads;?>;"><a style="display:<?php echo $adminnenadoc;?>;" href="pages/delete_theme.php?id=<?php echo $array3['id'];?>">
<button type="submit">Delete</button>
</a></span>
		  <span style="display:<?php echo $ad;?>;"><a style="display:<?php echo $adminnenadoc;?>;" href="pages/ch_themest.php?id=<?php echo $array3['id'];?>">
<button type="submit">Change Status</button>
</a></span></div></td>
<?php
echo "</tr>";
    }while($array3 = mysql_fetch_array($query1));
		  ?>
                        </tbody>
                    </table>
					</div>
													  <a href="pages/addtheme.php" style="display:<?php echo $logbull;?>;" class="btn waves-effect waves-light right"><i class="material-icons">add</i> Добавить тему</a>
<span class="red"  style="display:<?php echo $musttolog;?>;">Вы не вошли.<a href="pages/login.php">Войти</a></span>
              </div>

              <div id="test2" style="display:none;" class="col s12">
			  
			  
		<table class="xxx">
        <thead>
          <tr>
              <th style="width:30%;">Nickname</th>
              <th style="width:30%;">Rang</th>
              <th style="width:30%;">Role</th>
          </tr>
        </thead>
</table>
<div id="tableusers" style="height:300px; overflow-y: scroll;">
<table class="xxx">
        <tbody>
	<?php 
	$query = mysql_query("SELECT * FROM users");
    $array = mysql_fetch_array($query);
    do{
			if($array['status'] == 'Пользователь'){$stst = "";}	
	if($array['status'] == 'Проверенный'){$stst = "";}
	if($array['status'] == 'Moderator'){$stst = "moder";}
	if($array['status'] == 'VIP'){$stst = "vip";}
	if($array['status'] == 'Administrator'){$stst = "admin";}
	if($array['online'] == 'online'){$col = "green";}else{$col = "grey";}
          echo "<tr><td style='width:30%;'><a class='person' href='pages/viewuser.php?id=".$array['id']."'><button type='submit'>".$array['login']."</button></a><span style='color:".$col.";'>".$array['online']."</span></td>";
          echo "<td style='width:30%;'>"."<progress min='1' max='5' value='".$array['progres']."'></td>";
		  if($array['progres'] == '5'){
			  $adminnenado = "none";
		  }else{
			  $adminnenado = "true";
		  }
		  ?>
		  <td style="display:<?php echo $ad;?>;"><a style="display:<?php echo $adminnenado;?>;" href="pages/delete_tub.php?id=<?php echo $array['id'];?>">
<button type="submit">Delete</button>
</a></td>
		  <td style="display:<?php echo $ad;?>;"><a style="display:<?php echo $adminnenado;?>;" href="pages/blockuserip.php?ip=<?php echo $array['ip'];?>">
<button type="submit">Бан</button>
</a></td>
<?php
          echo "<td style='width:30%;'><span class='".$stst."'>".$array['status']."</span></td></tr>";
    }while($array = mysql_fetch_array($query));
		  ?>
        </tbody>
      </table>
	  </div>
			  </div>
              <div id="test3" style="display:none;" class="col s12">    
			  <a href="pages/addnews.php" style="display:<?php echo $logbull;?>;" class="btn waves-effect waves-light right"><i class="material-icons">add</i> Добавить новость</a>
<span class="red"  style="display:<?php echo $musttolog;?>;">Вы не вошли.<a href="pages/login.php">Войти</a></span>
<br><br>
<div style="height:300px; overflow-y: scroll;background-color:#264f45;border-radius:12px;padding:7px 7px 7px 7px;">
  <ul class="collapsible" style="border:none;" data-collapsible="accordion">
	<?php 
	$query1 = mysql_query("SELECT * FROM news");
    $array1 = mysql_fetch_array($query1);
    do{
	echo "<li class='xxx news'>";
	$autthor = $array1['author'];
	$polz = mysql_query("SELECT id,online,photo,progres FROM users WHERE login='$autthor'");
	$arr = mysql_fetch_array($polz);
	if($arr['progres'] == '5'){$adminnenadoy = "none";}else{$adminnenadoy = "true";}
	if($arr['online'] == 'online'){$coll = "green";}else{$coll = "grey";}
	echo "<img src='".$arr['photo']."' class='circle smallphotoprofile'><a class='person' href='pages/viewuser.php?id=".$arr['id']."'><button type='submit'>".$array1['author']."</button></a><span style='color:".$coll.";'>".$arr['online']."</span><span class='datenews right'>".$array1['datetime']."</span><br>Название: ".$array1['thname'];
			  ?>
		  <div class="right" style="display:<?php echo $ad;?>;"><a style="display:<?php echo $adminnenadoy;?>;" href="pages/delete_news.php?id=<?php echo $array1['id'];?>">
<button type="submit">Delete</button>
</a></div>
<?php
    echo "<div class='collapsible-header xxx'> Краткое описание: ".$array1['text1']."</div>";
    echo "<div class='collapsible-body xxx'><span>".$array1['text2']."</span></div>";
    echo "</li>";
    }while($array1 = mysql_fetch_array($query1));
		  ?>
		  </ul>
		  </div>
			</div>
            </div>
            <div id="inf3">
			<?php
				$query1 = mysql_query("SELECT * FROM pages");
    $razdel = mysql_fetch_array($query1);
	do{
			?>
                    <div class="col s6 m6 lll qwe">
                      <div class="card blue-grey darken-1">
                        <div class="card-content white-text">
                          <span class="card-title"><?php echo $razdel['name'];?>
						  		  <span style="display:<?php echo $ad;?>;"><a href="pages/delete_razdel.php?id=<?php echo $razdel['id'];?>">
<button type="submit">Delete</button>
</a></span>
						  </span>
                          <p><?php echo $razdel['description'];?></p>
                        </div>
                        <div class="card-action">
                          <a href="pages/viewrazdel.php?id=<?php echo $razdel['id'];?>">Просмотреть</a>
                        </div>
                      </div>
                    </div>
				<?php
	}while($razdel = mysql_fetch_array($query1));
				?>
<a href="pages/addrazdel.php" style="display:<?php echo $ad;?>;" class="btn waves-effect waves-light right"><i class="material-icons">add</i> Добавить раздел</a>
            </div>
            <br>
        <div class="row">
            <div class="col s12 m6" style="margin-top: -10px;">
              <div class="card blue-grey darken-1" style="width:60%; left:0px;right: 100%;">
                <div class="card-content white-text">
                  <span class="card-title">Вакансии</span>
                  <p>
                    <ul>
                      <li>&nbsp;&nbsp;&nbsp;&nbsp;Дизайнер</li>
                      <li>&nbsp;&nbsp;&nbsp;&nbsp;Модератор</li>
                      <li>&nbsp;&nbsp;&nbsp;&nbsp;Менеджер</li>
                    </ul>
                  </p>
                </div>
                <div class="card-action">
                  <a href="#">Подать заявку</a>
                </div>
              </div>
          </div>
          </div>
      
      </div> 
      <div id="con2" style="display: none;" class="container">
<div id="chat" class="xxx">
<div id="chatm">
	<?php 
	$query = mysql_query("SELECT * FROM chat");
    $array = mysql_fetch_array($query);
    do{
			$autthor = $array['author'];
	$polz = mysql_query("SELECT id,online,photo,progres FROM users WHERE login='$autthor'");
	$arr = mysql_fetch_array($polz);
	if($arr['progres'] == '5'){$adminnenadoy = "none";}else{$adminnenadoy = "true";}
	if($arr['online'] == 'online'){$coll = "green";}else{$coll = "grey";}
			if ($array['author'] == $_SESSION['login']){
						  if($array3['author'] == $_SESSION['login']){$ads = 'true';}
		  else{$ads = $ads;}
					echo "<div class='chatmsg'><span class='right messagem'><img src='".$arr['photo']."' class='circle smallphotoprofile'><a class='person' href='pages/viewuser.php?id=".$arr['id']."'><button type='submit'>".$array['author']."</button></a><span style='color:".$coll.";'>".$arr['online']."</span><span class='right'>".$array['time']."</span><br>";
		  			  ?>
		  <div class="right" style="display:<?php echo $ads;?>;"><a style="display:<?php echo $adminnenadoy;?>;" href="pages/delete_mesch.php?id=<?php echo $array['id'];?>">
<button type="submit">Delete</button>
</a></div>
<?php
echo "<br>".$array['text']."</span></div>";
	}else{
					echo "<div class='chatmsg'><span class='left messagef'><img src='".$arr['photo']."' class='circle smallphotoprofile'><a class='person' href='pages/viewuser.php?id=".$arr['id']."'><button type='submit'>".$array['author']."</button></a><span style='color:".$coll.";'>".$arr['online']."</span><span class='right'>".$array['time']."</span>";
		  			  ?>
		  <div class="right" style="display:<?php echo $ad;?>;"><a style="display:<?php echo $adminnenadoy;?>;" href="pages/delete_mesch.php?id=<?php echo $array['id'];?>">
<button type="submit">Delete</button>
</a></div>
<?php
echo "<br>".$array['text']."</span></div>";
	}
    }while($array = mysql_fetch_array($query));
		  ?>
</div>
<span class="red"  style="display:<?php echo $musttolog;?>;">Вы не вошли.<a href="pages/login.php">Войти</a></span>
<div id="chatf" style="display:<?php echo $logbull;?>;">
          <div class="row">
        <form action="pages/chat.php"  method="post" name="form" class="col s12">
            <div style="width:65%;" class="input-field col">
                <i class="material-icons prefix">mode_edit</i>
                <input name="text" id="text" maxlength="250">
				<input style="display:none;" name="author" id="author" value="<?php echo $_SESSION['login'];?>">
              </div>
			  <button style="width:35%;" class="btn waves-effect waves-light right" type="submit" name="action">Надіслати
          <i class="material-icons right">send</i>
        </button>
        </form>
</div>
</div>
      </div>
	  <div id="adminpanel" style="display:<?php echo $ad;?>;">
	  <?php 
	  $polz = mysql_query("SELECT * FROM users WHERE progres>='4'");
	$arra = mysql_fetch_array($polz);
	  ?>
	  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	  <br>
	  <?php
do{
		if($arra['online'] == 'online'){$coll = "green";}else{$coll = "grey";}
					echo "<img src='".$arra['photo']."' class='circle smallphotoprofile'><a class='person' href='pages/viewuser.php?id=".$arra['id']."'><button type='submit'>".$arra['login']."</button></a><span style='color:".$coll.";'>".$arra['online']."</span>//////////////////<span style='color:".$coll.";'>".$arra['ip']."</span><br>";
}while($arra = mysql_fetch_array($polz));
	  ?>
	  ______________________________________________________________________________________
	  
	  	  <?php $polz = mysql_query("SELECT * FROM");
	$arra = mysql_fetch_array($polz);?>
	  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	  </div>
	  </div>
      <div id="con3" class="container" style="display: none;height:auto;">
	  <br>
	  <?php
// Проверяем, пусты ли пересменные логина и id пользователя
if (empty($_SESSION['login']) or empty($_SESSION['id']))
{
// Если пусты, то мы не выводим ссылку
echo "<div class='code' style='width:auto;'>Вы вошли на сайт, как гость";
echo " <br><a href='pages/login.php'>Log in</a>";
echo " <br><a href='pages/reg.php'>Register</a></div>";
}
else
   {
	if($_SESSION['status'] == 'Пользователь'){$ststm = "";}	
	if($_SESSION['status'] == 'Проверенный'){$ststm = "";}
	if($_SESSION['status'] == 'Moderator'){$ststm = "moder";}
	if($_SESSION['status'] == 'VIP'){$ststm = "vip";}
	if($_SESSION['status'] == 'Administrator'){$ststm = "admin";}
	echo "<div class='left' style='width:30%;'><button href='#tab1' class='btn waves-effect' onclick='myp()'>Мой профиль</button><br>";
	echo "<button href='#tab1' class='btn waves-effect' onclick='chp()'>Изменить пароль</button><br>";
	echo "<button href='#tab1' class='btn waves-effect' onclick='cha()'>Изменить о себе</button><br>";
	echo "<button href='#tab1' class='btn waves-effect' onclick='chph()'>Изменить фото</button><br>";
	echo "<a class='btn' href='pages/logout.php'>Выйти</a><br></div>";
	echo "<table class='right' style='width:70%;height:auto;'><tr><td><div id='1111'><span style='font-size:20px;'>Мой профиль</span>";
    echo "<div class='code' style='width:auto;'>Вы вошли на сайт, как<br><img class='circle photoprofile' src='".$_SESSION['photo']."'> <br><span class='person'>".$_SESSION['login']."</span><br>";
	echo "Статус: ".$_SESSION['online']."<br>";
	echo "Последний раз онлайн: ".$_SESSION['lastto'];
	echo "<br>".$_SESSION['name']." ".$_SESSION['lastname']."<br>";
	echo "<span class='".$ststm."'>".$_SESSION['status']."</span><br>";
	echo "Дата регистрации: ".$_SESSION['date']."<br>";
	echo "<span style='".$ad."'>".$_SESSION['ip']."<br></span>";
	echo "Reputation<br>";
	echo "<progress min='1' max='5' value='".$_SESSION['progres']."'></progress><br>";
	echo "<a class='btn' href='pages/logout.php'>Выйти</a><br></div>";
	echo "<div class='aboutme'><span>About me</span><br>".$_SESSION['aboutme']."</div></div><br>";
   }
?>
<div id="chpass" class="xxx" style="display:none;">
<span style="font-size:20px;">Изменить пароль:</span>
               <form action='pages/changepass.php' method='post'>
			   Введите старый пароль:
               <input name='lpassword' type='password'>
			   Введите новый пароль:
			   <input name='id' type='hidden' id="id" value="<?php echo $_SESSION['id'];?>">
			   <input name='password' type='password'>
			   Введите новый пароль ещё раз:
			   <input name='cpassword' type='password'>
               <input type='submit' name='submit' value='Изменить'>
               </form>
</div>
<div id="chabme" class="xxx" style="display:none;">
<span style="font-size:20px;">Изменить пароль:</span>
               <form action='pages/changeaboutme.php' method='post'>
			   Введите информацию о себе:
               <input name='aboutmech' type='text'>
			   <input name='id' type='hidden' id="id" value="<?php echo $_SESSION['id'];?>">
               <input type='submit' name='submit' value='Изменить'>
               </form>
</div>
<div id="chpht" class="xxx" style="display:none;">
Введите ссылку на фото из интернета
<span style="font-size:20px;">Изменить фото:</span>
               <form action='pages/changephoto.php' method='post'>
			   Введите ссылку на фото:
               <input name='photo' type='text'>
			   <input name='id' type='hidden' id="id" value="<?php echo $_SESSION['id'];?>">
               <input type='submit' name='submit' value='Изменить'>
               </form>
</div>
</td>
</tr>
</table>
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
                <textarea name="message" id="message" type="text" size="160" maxlength="1000"></textarea>
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
          <a class="white-text" href="https://telegram.org/" target="blank"><img class="responsive-img circle imgsm" src="img/Telegram.png"></a>
          <a class="white-text" href="https://www.instagram.com" target="blank"><img class="responsive-img circle imgsm" src="img/Instagram.png"></a>
          <a class="white-text" href="https://twitter.com" target="blank"><img class="responsive-img circle imgsm" src="img/tvit.png"></a>
          <a class="white-text" href="https://www.youtube.com" target="blank"><img class="responsive-img circle imgsm" src="img/yout.png"></a>
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
  <script src="js/jquery-3.2.1.min.js"></script>
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
	$query = mysql_query("SELECT * FROM blockedip WHERE ip='".$_SERVER['REMOTE_ADDR']."'");
    $array2 = mysql_fetch_array($query);
	if($_SERVER['REMOTE_ADDR'] == $array2['ip']){
		          echo "<meta http-equiv='Refresh' content='0; URL=pages/bl.html'>Вас заблокировали по ip!Ви лох и питух.";
	}
?>
  <script src="js/materialize.js"></script>
  <script src="js/nav_m.js"></script>
  <script src="js/my.js"></script>
</html>