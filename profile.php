<!DOCTYPE HTML>
<?php
	require_once('/classes/request.php');
	$user = new Request($_GET['steam_id']);
?>

<html>
<head>
	<style>
	*{margin:0; padding:0;}
	html, body {margin: 0;
		padding:0;
		width: 100%;
		height: 100%;
		background-color:#193441;
		color:#FCFFF5;
		font-family:"Lucida Console", Times, serif;
	}
	#form_container{height:0;}
	#steam_id{margin:0;
		padding:0;
		position:absolute;
		width:15%;
		height:4%;
		top:5%;
		left:80%;
		margin-left:-7.5%;
		margin-top:-2%;
		background-color:#91AA9D;
		color:#193441;
		font-weight:bold;
		font-family:"Lucida Console", Times, serif;
	}
	::-webkit-input-placeholder{color:#FCFFF5;}
	#profile{position:absolute; top: 5%; left: 50%;}
	#vertical{ margin:0; padding: 0;height:100%; width:10%; left: 20%;background-color: #91AA9D;position:absolute;}
	#match_stats{width:100%; height:20%; top:40%; background: rgb(62,96,111);background-color:rgba(62,96,111, 0.6);position:absolute;}
	#overall_stats{width:100%; height:20%; top:65%; background: rgb(62,96,111);background-color:rgba(62,96,111, 0.6);position:absolute;}
	.stats_type{display:block; width:10%; height:20%; left:20%; top: 40%; position:absolute;}
	.stats_type > h3{display:block; text-align:center;}
	.stats{position:absolute; height:100%; width:70%; overflow:hidden; left:30%;}
	</style>
</head>
</body>
	<div id="main_container">
		<?php require('/forms/_userForm.php'); ?>
		<div id="profile">
			<h1 id="player_name"><?php echo $user->getPlayerInfo('personaname');?></h1>
			<img id="player_image" src="<?php echo $user->getPlayerInfo('avatarfull');?>">
		</div>
		<div id="vertical">
		</div>
		<div id="match_stats">
			<div class="stats_type">
				<h3>Match Stats</h3>
			</div>
			<div class="stats"></div>
		</div>
		<div id="overall_stats">
			<div class="stats_type">
				<h3>Overall Stats</h3>
			</div>
			<div class="stats"></div>
		</div>
	</div>
</body>
</html>
<?php
if(isset($_POST["steam_id"])){
	header('Location: profile.php?steam_id=' . $_POST["steam_id"]);
}
?>