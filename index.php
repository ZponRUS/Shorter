<?
$link = $_POST['link'];
if($link){
	include "config.php";

	$code = "";
	$abc = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
	for($i=0; $i < mt_rand(4, 9); $i++) $code = $code.$abc[mt_rand(0, strlen($abc))];
	while ( R::find( 'redirecttable', 'code = ?', array($code)) ){
		for($i=0; $i < mt_rand(4, 9); $i++) $code = $code.$abc[mt_rand(0, strlen($abc))];
	}

	if(!preg_match("((https|http):\/\/)", $link)) $link = "http://".$link;

	$data = R::dispense( 'redirecttable' );
	$data->code = $code;
	$data->link = $link;
	$id = R::store( $data );

}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Shorter By Zpon</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="resources/css/style.css">
</head>
<body>
	<center>
		<div class="block"><br><br>
			<h2>Shorter By Zpon &#10084;</h2>
			<form action="" method="POST">
				<div class="form-group">
					<label>Link to Short</label>
					<input type="text" class="form-control" name="link" placeholder="link" value=<? if($link) echo $link; ?>>
				</div>

			  <button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
		<? if($link): ?>
			<div class="block"><br>
				<h2>Link created:</h2><br>
				<h1 id="link"><?=$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST']."/r.php?c=".$code?></h1>
				<button type="submit" class="btn btn-primary" id="save">Save to clipboard</button>
				
			</div>
		<? endif ?>
	</center>
</body>
</html>

<script type="text/javascript">
var btn = document.getElementById("save");

btn.onclick = function() {   
	var element = document.getElementById("link");

	var range = document.createRange();
	range.selectNode(element);
	window.getSelection().addRange(range);
	document.execCommand("copy");
	window.getSelection().removeAllRanges();
} 
</script>