<!DOCTYPE html>
<html lang="en-US">
  <?

    $warningID = null;
    $warningID = $_GET['id'];
  ?>

  <head>
    <title>Sign Up</title>  
    <link href="../imagens/icon.png" rel="shortcut icon">
    <link href="../css/signup.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Quicksand:300,400" rel="stylesheet">
  </head>

  <body>
  
    <div class="topBar">
      <a href="../index.html"><img src="../imagens/icon.png" height="40" width="40"></a>
      <p>Aria</p>
    </div>

    <div class="signUpMenu">
      <form id="signup" action="./register.php" method="post">
        <p> Sign Up </p>
        <p>
          <div class="ErrorMessage"> 
        <?
        if($warningID == 1)
          echo 'Passwords dont match!';
        else if($warningID == 2)
          echo 'Username is already in use!';
        else if($warningID == 3)
          echo 'Email is already in use!';
        ?>
        </div>
        </p>
        <p><input type="text" name="name" placeholder="Name" required="required"></p>
        <p><input type="text" name="username" placeholder="Username" required="required"></p>
        <p><input type="email" name="email" placeholder="example@example.com" required="required"></p>
        <p><input type="password" name="password" placeholder="Password" required="required" pattern=".{5,}" title="5 characters minimum"></p>
        <p><input type="password" name="repassword" placeholder="Repeat password" required="required"></p>
        <p><input type="number" name="age" placeholder="Age" min="1" max="120" required="required"></p>
        <p><input id="button" type="submit" value="Enter"></p>
      </form>
    </div>

  </body>

  <footer>
    <div class="about">
      <p>About Us  <p>
    </div>

    <div class="ltw">
      <a id="ltw" href="https://web.fe.up.pt/~arestivo/page/courses/2018/ltw/" target="_blank"><p>Linguagens & Tecnoglogias Web</p></a>
    </div>

    <div class="contacts">
      <p> Contact </p>
    </div>

  </footer>

</html>
