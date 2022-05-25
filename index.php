<?php 
session_start();
	include("functions.php");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/main.css">
    <title>Document</title>
</head>
<body>
    

    <header>Hello</header>
    <main>
        
        <ul id="Messages"></ul>


        <form id="writingbox" action="insert.php" method="post">
            <input id="textbox" type="text" autofocus="autofocus" placeholder="Type here..." name="typingfield" ><br>
        </form>
    </main>
    <footer>Enhlo</footer>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="/js/app.js"></script>
</body>
</html>