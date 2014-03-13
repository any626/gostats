<!DOCTYPE HTML>
<?php
	require_once('/classes/request.php');
	$user = new Request($_GET['steam_id']);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Counter Strike: Global Offensive Stats</title>

    <!-- Bootstrap -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="views/profile.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">
    	<div class="header">
    		<h1>Counter Strike: Global Offensive Stats</h1>
    		<?php require('/forms/_userForm.php'); ?>
    	</div>
    	<div class="jumbotron">
    		<h2><?php echo $user->getPlayerInfo('personaname');?></h2>
    		<img id="player_image" src="<?php echo $user->getPlayerInfo('avatarfull');?>" class="img-responsive">
    	</div>
    	<div class="row">
    		<div class="col-lg-6">
    			<div class="panel">
    				<div class="panel-heading">Match Stats</div>
    				<div class="panel-body">
    					<ul class="list-group">
							<li class="list-group-item">
								<span class="badge"><?php echo $user->getStat('last_match_kills');?></span>
								Kills
							</li>
							<li class="list-group-item">
								<span class="badge"><?php echo $user->getStat('last_match_deaths');?></span>
								Deaths
							</li>
							<li class="list-group-item">
								<span class="badge"><?php echo $user->getStat('last_match_kills')/$user->getStat('last_match_deaths');?></span>
								KD Ratio
							</li>
							<li class="list-group-item">
								<span class="badge"><?php echo $user->getStat('last_match_wins');?></span>
								Rounds Won
							</li>
							<li class="list-group-item">
								<span class="badge"><?php echo $user->getStat('last_match_kills')/$user->getStat('last_match_rounds');?></span>
								Kills per Round
							</li>
							<li class="list-group-item">
								<span class="badge"><?php echo $user->getStat('last_match_damage')/$user->getStat('last_match_rounds');?></span>
								Damage per Round
							</li>
							<li class="list-group-item">
								<span class="badge"><?php echo $user->getStat('last_match_damage');?></span>
								Damage
							</li>
							<li class="list-group-item">
								<span class="badge"><?php echo $user->getStat('last_match_mvps');?></span>
								MVPs
							</li>
						</ul>
    				</div>
    			</div>
    		</div>
    		<div class="col-lg-6">
    			<div class="panel">
    				<div class="panel-heading">Overall Stats</div>
    				<div class="panel-body">
    					<ul class="list-group">
							<li class="list-group-item">
								<span class="badge"><?php echo $user->getStat('total_kills');?></span>
								Total Kills
							</li>
							<li class="list-group-item">
								<span class="badge"><?php echo $user->getStat('total_deaths');?></span>
								Total Deaths
							</li>
							<li class="list-group-item">
								<span class="badge"><?php echo $user->getStat('total_kills')/$user->getStat('total_deaths');?></span>
								KD Ratio 
							</li>
							<li class="list-group-item">
								<span class="badge"><?php echo $user->getStat('total_kills_headshot')*100/$user->getStat('total_kills');?></span>
								Headshot Kill %
							</li>
							<li class="list-group-item">
								<span class="badge"><?php echo $user->getStat('total_shots_hit')*100/$user->getStat('total_shots_fired');?></span>
								Accuray %
							</li>
							<li class="list-group-item">
								<span class="badge"><?php echo $user->getStat('total_matches_won')*100/$user->getStat('total_matches_played');?></span>
								Match Win %
							</li>
							<li class="list-group-item">
								<span class="badge"><?php echo $user->getStat('total_kills')/$user->getStat('total_rounds_played');?></span>
								Kills per Round
							</li>
							<li class="list-group-item">
								<span class="badge"><?php echo $user->getStat('total_damage_done');?></span>
								Total Damage
							</li>
						</ul>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>

</html>
<?php
if(isset($_POST["steam_id"])){
	header('Location: profile.php?steam_id=' . $_POST["steam_id"]);
}
?>