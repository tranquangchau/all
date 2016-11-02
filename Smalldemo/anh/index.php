<html>
<meta charset='utf-8'>
<head>
<style>
form span{        width: 94px;
    height: 20px;
    display: inline-table;
    padding: 3px;}
</style>
<script src="jquery-1.10.2.js"></script>
<script>
$(function(){
$('#iurl').mouseup(function(e) {
	//alert('chage');
    var text=getSelectedText();
    if (text!='') {
		//alert(text);	
		var str=text.anchorNode.data;
		var str=str.substring(text.anchorOffset,text.focusOffset);
		var mto=text.anchorOffset;
		var mfrom=text.focusOffset;
		$('#inpu2').text(text+'('+mfrom+":"+mto+')');
		//$('#postisition').val(mfrom+":"+mto);
		$('#postisition').val(mto+":"+mfrom);
	}
	
    //if(str)
        //alert(text.anchorOffset);

	
	//alert('pageX='+e.anchorOffset);
});

function getSelectedText() {
    if (window.getSelection) {
        return window.getSelection();
    } else if (document.selection) {
        return document.selection.createRange();
    }
    return '';
}

});

</script>
</head>


<body>
<form action="" method="POST">
<span>Link</span>xcvb
<input type="text" name="inpu1" id="inputurl" style="width: 500px;" onfocusout="myFunction()"/><br/>
<span id="iurl" style="display: block;padding-left: 106px;width: auto;"></span>
<input id="postisition" name="postisition" type="hidden" value=""/>
<span>variable</span><span id="inpu2"/></span><br/>

<input type="submit" />
</form>

 
<br/>
<br/>


<script>
function myFunction() {
    var x = document.getElementById("inputurl");
    var y = document.getElementById("iurl");
    y.innerHTML  = x.value;
}
</script>

<?php

if(isset($_POST)){
	if(!empty($_POST['inpu1'])){
		$url=$_POST['inpu1'];
		include 'check.php';
		$link=$url;
		//$link='https://lh3.googleusercontent.com/-EHdHrC9QxjA/AAAAAAAAAAI/AAAAAAAAAAA/AGNl-Oo2YtWLqMLQzzZXRzVitV-8kADRaw/s32-c-mo/photo.jpg';
		//$link='http://tranquangchau.net/u/uploads/1472934817_Image-2237.jpg';
		//$link='http://tranquangchau.net/u/uploads/1472934408_Image-666.jpg';
		//$link='http://static.livedemo00.template-help.com/wt_58434_v1/images/gallery-15_original.jpg';
		//$link='http://tranquangchau.net/u/uploads/1472934817_Image-ghd.jpg';
		$valu1='';
		if(!empty($_POST['postisition'])){
			$at= $_POST['postisition'];
			$ar1=explode(':',$at);
			var_dump($ar1);//die;
			
			$valu1=substr($url,$ar1[0],$ar1[1]-$ar1[0]);
			echo '__'.$valu1.'__<br/>';
		}
		if(is_numeric($valu1)){
			//is number autoload ++
		}
			if($valu1 = 1){
				echo 'autoload';
				$A= new CheckInput;				
				$b=true;
				$x=0;
				while($b) {
					
					$x++;
					$sta=$ar1[0];
					$ste=$ar1[1];
					$valu_first=substr($url,0,$sta);
					$valu_last=substr($url,$sta+1,strlen($url)-$sta);
					$link_change=$valu_first.$x.$valu_last;
					
					//echo '<br>link goc: '.$url;
					//echo '<br>link first: '.$valu_first;
					//echo '<br>link last: '.$valu_last;
					//echo '<br> link change: '.$link_change;
					//return;die;
					$b=$A->checkURL($link_change);
					echo '<br>'.$link_change;
					if($b){
						
						$c=$A->savefile($link_change);
					}
					var_dump($b);
					//echo "The number is: $x <br>";
					//$x++;
				}
				/*
				var_dump($b);
				if($b){			
					$c=$A->savefile($link);
					var_dump($c);die;
				}else{
					echo 'Link file not correct or exit';
				}
				*/
				
			}else{
				echo 'load no mal';
				$A= new CheckInput;
				$b=$A->checkURL($link);
				var_dump($b);
				if($b){			
					$c=$A->savefile($link);
					var_dump($c);die;
				}else{
					echo 'Link file not correct or exit';
				}
			}
		
		die;
		
		$A= new CheckInput;
		$b=$A->checkURL($link);
		var_dump($b);
		if($b){			
			$c=$A->savefile($link);
			var_dump($c);die;
		}else{
			echo 'Link file not correct or exit';
		}
		
		
	}
}

?>
</body>
</html>