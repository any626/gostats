<!DOCTYPE HTML>
<?php
	//require_once("request.php");
?>




<html>
<header>
	<style>
	*{margin:0; padding:0;}
	html, body {margin: 0;
		padding:0;
		width: 100%;
		height: 100%;
		background-color:#193441;
	}
	#steam_id{margin:0;
		padding:0;
		position:absolute;
		width:300px;
		height:30px;
		top:50%;
		left:50%;
		margin-left:-150px;
		margin-top:-15px;
		background-color:#91AA9D;
		color:#193441;
		font-weight:bold;
		font-family:"Lucida Console", Times, serif;
	}
	::-webkit-input-placeholder{color:#FCFFF5;}
	</style>
</header>
</body>
	<div id="form_container">
		<form method="post" name="userSearch">
			<input id="steam_id" type="text" name="steam_id" placeholder="64bit Steam ID">
			<input id="submit" type="submit" name="submit" style="visibility:hidden;">
		</form>
	</div>
</body>
</html>
<?php
if(isset($_POST["steam_id"])){
	header('Location: profile.php?steam_id=' . $_POST["steam_id"]);
}
?>