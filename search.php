<!DOCTYPE html>
<html lang="en-US"> 
	<?
	    $dbh = new PDO('sqlite:database.db');

	    include ('./user_functions.php');

		$search_text = $_POST['search'];

		$search_channels = getSearchChannel($dbh, $search_text);
		$search_posts = getSearchPost($dbh, $search_text);
  	?>

  	<head>
	    <title>Search</title> 
	    <link href="imagens/icon.png" rel="shortcut icon">
	    <link href="profile.css" rel="stylesheet">
	    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400" rel="stylesheet">
	    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Quicksand:300,400" rel="stylesheet">
	    <link href="https://fonts.googleapis.com/css?family=Dosis:200,300" rel="stylesheet">
  	</head>

  <body>
    
    <? draw_header(); ?>

    <div class="main">
      	<section id="channels">
	      	<h2> Channels </h2>
	      	<? 	if($search_channels == null) {	?>
	      	
	      		<h3>There were no results found</h3>
	      	<? 	}
	      		else {
	      			foreach($search_channels as $search_channel) { ?>

	      				<a href="channel.php?id=<?=$search_channel['channelID']?>"><?=$search_channel['description'] ?></a>
	      			<? } ?>
	      			<h3>No more results to show</h3>
	      	<?	} 	?>
      	</section>

      	<section id="posts">
	      	<h2> Posts </h2>
	      	<? 	if($search_posts == null) {	?>
	      	
	      		<h3>There were no results found</h3>
	      	<? 	}
	      		else {
	      			foreach($search_posts as $search_post) {

	      				showPostByPostId($dbh, $search_post['postID']);
	      			} ?>
	      			<h3>No more results to show</h3>
	      	<?	} 	?>
	    </section>
    </div>  

    <div class="otherPages">   <!--  Fazer share ao site maybe? how tho-->
      	<a id="insta" href="https://www.instagram.com" target="_blank"> Instagram</a>
      	<a id="face" href="https://www.facebook.com" target="_blank"> Facebook </a>
    </div>

  </body>
  <? draw_footer() ?>
</html>