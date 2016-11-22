
<?php 
if(!empty($_POST)){
	if(!empty($_POST['ct'])){
		$sb=$_POST['sb'];
		$em=$_POST['em'];
		$ab=$_POST['ab'];
		$ct=$_POST['ct'];
		include 'PHPMailer/gmail.php';
		
		$return['status'] = true;
        $return['content'] = '<h2>Send success, Thank You and Have good day.</h2> <img src="file/img/fun.gif" height="" width=""/><br><br>(Admin will resend email for you if (exit) email).';
		
	}else{
		$return['status'] = false;
        $return['content'] = 'Not value (Content html)';
	}
	echo json_encode($return);
	die;
	var_dump($_POST);die;
	
}
?>
<html>
<head>
<meta charset="UTF-8">
<meta name="description" content="Free Web tutorials">
<meta name="keywords" content="HTML,CSS,XML,JavaScript">
<meta name="author" content="Hege Refsnes">
</head>
<body>
<h1>Send suggestion to admin</h1>
Subject:<br><input type="text" id="sb"><br>
Email:<br> <input type="text" id="em"><br>
About you: <br><input type="text" id="ab"><br>
Content html (* need value)<br><textarea rows="4" cols="30" id="ct">
</textarea>
<br/>
<p class="error"></p>


<button onclick="send_email()">Send</button><div class="loader"></div>
</body>
</html>
