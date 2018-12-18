<!DOCTYPE html>
<html lang="en-US">
<?
  $warningID = $_GET['id'];
?>
  <head>
    <title>Log In</title>  
    <link href="../imagens/icon.png" rel="shortcut icon">
    <link href="../css/login.css" rel="stylesheet">
    <link href="../css/common.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Quicksand:300,400" rel="stylesheet">
  </head>

  <body>

    <div class="topBar">
        <a href="../index.html"><img src="../imagens/icon.png" height="40" width="40"></a>
        <p>Aria</p>
    </div>
   
    <div class="logInMenu">
      <form id="login" action="login.php" method="post">
        <p> Log In </p>
        <p><?
          if($warningID == 1){
            echo 'Wrong password or username';
          }
        ?></p>
        <p><input type="text" name="username" placeholder="Username" required="required"></p>
        <p><input type="password" name="password" placeholder="Password" required="required"></p>
        <p><input id="button" type="submit" value="Enter" ></p>
      </form>
    </div>
  </body>

  <footer>
    <div class="ltw">
      <a id="ltw" href="https://web.fe.up.pt/~arestivo/page/courses/2018/ltw/" target="_blank"><p>Linguagens & Tecnoglogias Web</p></a>
    </div>
  </footer>

</html>