<div id="backtotop" class="glyphicons up_arrow" style="display: block;">Sendmail</div>
<style>
#backtotop {
    display: none;
    z-index: 999;
    position: fixed;
    bottom: 30px;
    right: 10px;
    color: #333;
    background-color: #fff;
    margin-bottom: 0;
    font-weight: 400;
    vertical-align: middle;
    touch-action: manipulation;
    cursor: pointer;
    background-image: none;
    border: 1px solid #ccc;
    white-space: nowrap;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.428571429;
    box-sizing: border-box;
    border-radius: 3px;
}


.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
}

/* The Close Button */
.close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}

.loader {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid blue;
  border-right: 16px solid green;
  border-bottom: 16px solid red;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}


.error{display:none;}

.content_here{
	padding-top: 35px;
	padding-left: 14px;
    padding-bottom: 35px;
}

.loader{
	width: 10px;
    height: 10px;
	display:none;
}
</style>
<div id="myModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <span class="close" id="close">×</span>
    <div class="content_here">
    </div>
  </div>
</div>

<script>
var modal = document.getElementById('myModal');
// Get the button that opens the modal
// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];
var content = document.getElementsByClassName("content_here")[0];

document.getElementById("backtotop").onclick = function(){//do something
	//alert('pupop');
	modal.style.display = "block";
	var a = load_email();
	console.log(a);
	
}
document.getElementById("close").onclick = function(){//do something
	//alert('pupop');
	modal.style.display = "none";
	if (audio.currentTime !== 0) {
		audio.pause();
	}
}

var ajax=false;
function load_email(){
	if (ajax == false) {
        ajax = true;
        $.ajax({
            url: 'http://localhost/tool_html/' + 'email.php',
            data: {
              //  'action': "ajax",
              //  'id': at_current
            },
            //dataType: 'json',
            beforeSend: function () {
                // Handle the beforeSend event
                //$('.w3-main').addClass('c-optical');
            },
            error: function () {
                //$('.w3-main').removeClass('c-optical');
                //$('#info').html('<p>An error has occurred</p>');
                ajax = false;
            },
            success: function (data) {
                //$('.w3-main').removeClass('c-optical');
                //if (data.status === true) {
                    // alert('true');
                    //$('.w3-main').text(data.content);
                 //   $('.center2 textarea').val(data.content);
                 //   $('.center1').html(data.content);

               // } else {
                    //alert(data);
               // }			 
				content.innerHTML=data;
				//return data;
				ajax = false;
            },
            type: 'POST'
        });
        return false;
    }
}
var audio;
audio = new Audio('file/diff/a.mp3');
function send_email(){
	$('.loader').show();
	if (ajax == false) {	

		if (audio.currentTime !== 0) {
			audio.currentTime = 0;
		}		
		audio.play();
		
        ajax = true;
		var sb=  $('#sb').val();
		var em=  $('#em').val();
		var ab=  $('#ab').val();
		var ct=  $('#ct').val();
        $.ajax({
            url: 'http://localhost/tool_html/' + 'email.php',
            data: {
                'sb': sb,
                'em': em,
                'ab': ab,
                'ct': ct
            },
            dataType: 'json',
            beforeSend: function () {
                // Handle the beforeSend event
                //$('.w3-main').addClass('c-optical');
            },
            error: function () {
                //$('.w3-main').removeClass('c-optical');
                //$('#info').html('<p>An error has occurred</p>');
                ajax = false;
				$('.loader').hide();
				$('.error').show();
				$('.error').text('Something ê rô');
				$('.error').css("color","red");
				setTimeout(function(){ $('.error').hide();$('.error').css("color","black");	 }, 3000);  
							
            },
            success: function (data) {
                //$('.w3-main').removeClass('c-optical');
                if (data.status === true) {
                    // alert('true send');
                    //$('.w3-main').text(data.content);
                 //   $('.center2 textarea').val(data.content);
                 //   $('.center1').html(data.content);
					content.innerHTML=data.content;
                } else {
					$('.error').show();
					$('.error').text(data.content);
					setTimeout(function(){ $('.error').hide(); }, 2000);                    
                }			 
				
				//return data;
				$('.loader').hide();
				ajax = false;
            },
            type: 'POST'
        });
        return false;
    }
}

</script>
