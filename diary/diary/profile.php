<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
 
$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];


?>

<!doctype html>
<!--[if lt IE 7 ]> <html lang="en" class="ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
<meta name="viewport" content="width = 1050, user-scalable = no" />
<script type="text/javascript" src="../../extras/jquery.min.1.7.js"></script>
<script type="text/javascript" src="../../extras/modernizr.2.5.3.min.js"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>
<style>
  	@import url('https://fonts.googleapis.com/css2?family=Dancing+Script:wght@500&display=swap');
	  @import url('https://fonts.googleapis.com/css2?family=Megrim&family=Satisfy&display=swap');
	body {
		background-color: #666666;
	}
	input[type=text], input[type=date],select{
		position: relative;
		width: 70%;
		padding: 20px 10px 10px;
		background: transparent;
		outline: none;
		box-shadow: none;
		border: none;
		border-bottom: 1px solid #515151;
		color: #31323a;
		font-size: 1em;
		letter-spacing: 0.05em;
	}
	textarea {
		position: relative;
		width: 90%;
		padding: 20px 10px 10px;
		background: transparent;
		outline: none;
		box-shadow: none;
		border: none;
		color: #232427;
		font-size: 1em;
		letter-spacing: 0.05em;
		margin-top: -2.5rem;
		font-family: 'Dancing Script', cursive;
		font-size: 1.1rem;
	}
	h3{
		margin-top: 2rem;
		font-family: monospace;

	}
	p{
		color: #1b1c1f;
		font-size: 1.1em;
		letter-spacing: 0.05em;
		font-family: 'Dancing Script', cursive;
		margin-left: 2.1rem;
	}
	input[type=button] {
		background: none;
		color: #1b1c1f;
		border: none;
		font-size: 1rem;
		text-decoration: underline;
		cursor: pointer;
		font-size: 1rem;
	}

.sidebar{
  position: fixed;
  width: 240px;
  left: 0px;
  height: 100%;
  background-color: #dec299;
  transition: all .5s ease;
}
.sidebar header{
  font-size: 28px;
  color: #292626;
  line-height: 70px;
  text-align: center;
  background-color: #bf9b7b;
  user-select: none;
  font-family: 'Lato', sans-serif;
}
.sidebar a{
  display: block;
  height: 65px;
  width: 100%;
  color: #605c5c;
  line-height: 65px;
  padding-left: 30px;
  box-sizing: border-box;
  border-left: 5px solid transparent;
  font-family: 'Lato', sans-serif;
  transition: all .5s ease;
}
a.active,a:hover{
  border-left: 5px solid var(--accent-color);
  color: #292524;
   background: linear-gradient(to left, var(--accent-color), var(--gradient-color));
}
.sidebar a i{
  font-size: 23px;
  margin-right: 16px;
}
.sidebar a span{
  letter-spacing: 1px;
  text-transform: uppercase;
}
label #btn{
  position: absolute;
  left: 5px;
  cursor: pointer;
  color: #d6adff;
  border-radius: 5px;
  margin: 15px 30px;
  font-size: 29px;
  background-color: #e8d1ff;
  box-shadow:inset 2px 2px 2px 0px rgba(255,255,255,.5),
    inset -7px -7px 10px 0px rgba(0,0,0,.1),
   3.5px 3.5px 20px 0px rgba(0,0,0,.1),
   2px 2px 5px 0px rgba(0,0,0,.1);
  height: 45px;
  width: 45px;
  text-align: center;
  text-shadow: 2px 2px 3px rgba(255,255,255,0.5);
  line-height: 45px;
  transition: all .5s ease;
}
h2 {
  position: relative;
  text-align: center;
  color: #353535;
  font-size: 60px;
  font-family: 'Lato', sans-serif;
  margin: 0;
  color: #946f3f;
}
.flipbook .entry{
	position: relative;
	display: flex;
	justify-content: center;
	align-items: center;
	color: #bf9b7b;
}
.entry h1 {
	font-family: Megrim;
	font-size: 4rem;
}

iframe {
	margin-top: 100px;
	box-shadow: 5px 5px #414141;
}
audio {
	display: hidden;
}

</style>
<body>
<div class="nav">
    <div class="sidebar">
      <header>Menu</header>
      <a href="profile.php" class="active">
        <span class="material-symbols-outlined">
			person
		</span>
        <span>Profile</span>
      </a>
      <a href="gallery.html">
        <span class="material-symbols-outlined">
			gallery_thumbnail
			</span>
        <span>Gallery</span>
      </a>
      <a href="diarylist.php">
        <span class="material-symbols-outlined">
			list
			</span>
        <span>Diary List</span>
      </a>
      <a href="diaryentry.html">
		<span class="material-symbols-outlined">
			book_4
			</span>
        <span>Diary Entry</span>
      </a>
      <a href="logout.php">
        <span class="material-symbols-outlined">
			logout
		</span>
		<span>Logout</span>
      </a>
    </div>
</div>
<div class="flipbook-viewport">
	<div class="container">
		<div class="flipbook">
			<div class="entry" style="background-image:url(https://t3.ftcdn.net/jpg/02/86/19/40/360_F_286194087_4VJlefzIszMnE3YbV1fcaYvkIbidlkZg.jpg)">
				<h1>Profile</h1>
			</div>
			<div style="background-image:url(https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRo_Jt7ueP3OUdTdxYmkvLOtxHnzBMiRHR38A&usqp=CAU)">
				<<center>
					<h1> <?php echo " Welcome, $username";?> </h1>
					<h1> Course : BSIT </h1>
				</center>
			</div>
			<div style="background-image:url(https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRo_Jt7ueP3OUdTdxYmkvLOtxHnzBMiRHR38A&usqp=CAU)">
				<center><h1>Description</h1></center>
				<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit quod illum fugiat ipsum iusto amet? Hic voluptatibus, vel fuga odio officia magnam culpa eos assumenda rerum nihil illum explicabo facere!</p>
				<audio src=""></audio>
			</div>
			
			<div style="background-image:url(https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRo_Jt7ueP3OUdTdxYmkvLOtxHnzBMiRHR38A&usqp=CAU)">
				<center><iframe width="380" height="300" src="https://www.youtube.com/embed/fTasQFwysoE?si=lZa1-T7Ido_Hc4uV" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe><center>
			</div>
			<div style="background-image:url(https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRo_Jt7ueP3OUdTdxYmkvLOtxHnzBMiRHR38A&usqp=CAU)">
				<audio src="./audio/Rick Astley - Never Gonna Give You Up (Official Music Video)_dQw4w9WgXcQ.mp3" autoplay></audio>
			</div>
			<div style="background-image:url(https://t3.ftcdn.net/jpg/02/86/19/40/360_F_286194087_4VJlefzIszMnE3YbV1fcaYvkIbidlkZg.jpg)">
				
			</div>
		</div>
	</div>
</div>


<script type="text/javascript">

function loadApp() {

	// Create the flipbook

	$('.flipbook').turn({
			// Width

			width:830,
			
			// Height

			height:530,

			// Elevation

			elevation: 40,
			
			// Enable gradients

			gradients: true,
			
			// Auto center this flipbook

			autoCenter: true

	});
}

// Load the HTML4 version if there's not CSS transform

yepnope({
	test : Modernizr.csstransforms,
	yep: ['../../lib/turn.js'],
	nope: ['../../lib/turn.html4.min.js'],
	both: ['css/basic.css'],
	complete: loadApp
});

</script>

</body>
</html>