/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var at_current;
$('.left li').click(function () {
    at_current = $(this).prevAll().length + 1;
    $('li').removeClass('li-active');
    $(this).addClass('li-active');
    load();
});
var ajax = false;
function load() {
    //alert(at_current);
    if (ajax == false) {
        ajax = true;
        $.ajax({
            url: 'http://localhost/tool_html/' + 'ajax.php',
            data: {
                'action': "ajax",
                'id': at_current
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
            },
            success: function (data) {
                //$('.w3-main').removeClass('c-optical');
                if (data.status === true) {
                    // alert('true');
                    //$('.w3-main').text(data.content);
                    $('.center2 textarea').val(data.content);
                    $('.center1').html(data.content);

                } else {
                    alert('false');
                }
                ajax = false;
            },
            type: 'POST'
        });
        return false;
    }
}
function add() {
    var content = $('.center2 textarea').val();
    var right_text_old = $('.right textarea').val();
    if(right_text_old){
        content='\n'+content;
    }else{
        content=content;
    }
    typeInTextarea($('.right textarea'),content);
    $('.right1').html($('.right textarea').val());
}

function view1(){
    $('.center1').html($('.center2 textarea').val());
}
function view2(){
    $('.right1').html($('.right textarea').val());
}

function typeInTextarea(el, newText) {
    var start = el.prop("selectionStart");
    var end = el.prop("selectionEnd");
    var text = el.val();
    var before = text.substring(0, start);
    var after = text.substring(end, text.length);
    el.val(before + newText + after);
    el[0].selectionStart = el[0].selectionEnd = start + newText.length;
    el.focus();
    return false;
}

function reload(){
    $('.right textarea').val("");
    $('.right1').val("");
}
function copy1(){
    copyToClipboard('#copy1');
}

function copy2(){
    copyToClipboard('#copy2');
}

function copyToClipboard(element){
  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val($(element).html()).select();
    console.log($temp);
  document.execCommand("copy");
  $temp.remove();
}