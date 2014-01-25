

<html>
<header></header>
</body>
	<form method="post" name="userSearch">
		<input id="steam_id" type="text" name="steam_id">
		<input id="submit" type="submit" name="submit" style="visibility:hidden;">
	</form>
</body>
</html>
<?php
if(isset($_POST["steam_id"])){
	header('Location: profile.php?steam_id=' . $_POST["steam_id"]);
}
?>