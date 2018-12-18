<!DOCTYPE html>
<html lang="en-US"> 
	<?
	    $dbh = new PDO('sqlite:database.db');

	    include ('account_functions.php');
	    include ('post_functions.php');
	    include ('search_functions.php');
	    include ('utilities_functions.php');
	    include ('session.php');

		$search_text = htmlspecialchars($_POST['search']);

		$account_id = $_SESSION['accountID'];
	    $accountUsername = getAccountUsername($dbh, $account_id);
	    $accountPhoto = getAccountPhoto($dbh, $account_id);

		$search_channels = getSearchChannel($dbh, $search_text);
		$search_posts = getSearchPost($dbh, $search_text);
  	?>

  	<head>
	    <title>Search</title> 
	    <link href="../imagens/icon.png" rel="shortcut icon">
	    <link href="../css/profile.css" rel="stylesheet">
	    <link href="../css/post_style.css" rel="stylesheet">
	    <link href="../css/common.css" rel="stylesheet">
	    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400" rel="stylesheet">
	    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Quicksand:300,400" rel="stylesheet">
	    <link href="https://fonts.googleapis.com/css?family=Dosis:200,300" rel="stylesheet">
  	</head>

  <body>

    <? draw_header($accountPhoto, $accountUsername); ?>

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

    <? draw_other_pages() ?>

  </body>
  <? draw_footer() ?>
</html>