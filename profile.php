<!DOCTYPE html>
<html lang="en-US"> 
  <head>
    <title>Profile</title>  
    <link href="profile_style.css" rel="stylesheet">
    <link href="profile_layout.css" rel="stylesheet">  
  </head>
  <body>
    <div class="header">
      <h1><a href="wall.php">ONLINE 420</a></h1>
      <form id="search_users" action="search_users.php" method="post">
        <input type="text" name="userName" placeholder="Search users">
        <input type="submit" value="Search" >
      </form>
    </div>

    <div class="main">
      <section id="bio"> 
        <img src="test.jpg" alt="Profile photo" height="250" width="250">
        <h2>Username</h2>
        <h4>Name</h4>
        <h5>Email, Birthday</h5>
        <h5>City</h5>
        <h5>Job</h5>
      </section>
      <section id="posts">
        <h2>POSTS</h2>
      </section>
    </div>
  </body>
</html>
