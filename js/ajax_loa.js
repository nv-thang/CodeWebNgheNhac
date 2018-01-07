// JavaScript TGT v4.5
var loadingTGT 	= '<div class="loadding"><img src="'+mainURL+'/images/loading.gif" /></div>';
var http = createRequestObject();
function SHOWHIDE(id) {
	$('#'+id).slideToggle(0);
}

$(document).ready(function () {
	$("#menu_nav").dropmenu();
	$("#key").autocomplete("get_list_key.php", {width: 275,matchContains: true,minChars: 2,selectFirst: false});
	$.ajax({type:"POST",url:"ajax-tgt.php",data:"Login=1",success:function(html){$("#LoginTGT").html(html);}});
	$('#drlReason').change(function() {
		erid	=	$(this).val();
		if(erid == 1)
			$('#ERCT').show();
		else
			$('#ERCT').hide();
	});
});

$(function() {$('#deleteBOX').click(function() {Name = 'Bạn có thực sự muốn xóa! <input class="delete" type="submit" id="deleteBOX" name="deleteAll" value="[Có]" />|<input class="delete" type="submit" value="[Không]" />';$('#ask_ok').show();$('#ask_ok').html(Name);});});
function createRequestObject() {
	var xmlhttp;
	try { xmlhttp=new ActiveXObject("Msxml2.XMLHTTP"); }
	catch(e) {
    try { xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");}
	catch(f) { xmlhttp=null; }
  }
  if(!xmlhttp&&typeof XMLHttpRequest!="undefined") {
	xmlhttp=new XMLHttpRequest();
  }
	return  xmlhttp;
}

function checkAllFields(ref)
{
var chkAll = document.getElementById('checkAll');
var checks = document.getElementsByName('delAnn[]');
var removeButton = document.getElementById('removeChecked');
var boxLength = checks.length;
var allChecked = false;
var totalChecked = 0;
	if ( ref == 1 )
	{
		if ( chkAll.checked == true )
		{
			for ( i=0; i < boxLength; i++ )
			checks[i].checked = true;
		}
		else
		{
			for ( i=0; i < boxLength; i++ )
			checks[i].checked = false;
		}
	}
	else
	{
		for ( i=0; i < boxLength; i++ )
		{
			if ( checks[i].checked == true )
			{
			allChecked = true;
			continue;
			}
			else
			{
			allChecked = false;
			break;
			}
		}
		if ( allChecked == true )
		chkAll.checked = true;
		else
		chkAll.checked = false;
	}
	for ( j=0; j < boxLength; j++ )
	{
		if ( checks[j].checked == true )
		totalChecked++;
	}
	removeButton.value = "Remove ["+totalChecked+"] Selected";
}
var str = '';
function setValue(obj)
{
		var str = 'Nhập từ khóa ...';   
			if(obj.value == '')
			{
				obj.value = str;
				obj.style.color = '#848484';
			}
			else if(obj.value == str)
			{
				obj.value = '';
				obj.style.color = '#000000';
			}
}			
function nohandleResponse() {
	try {
		if((http.readyState == 4)&&(http.status == 200)){
			response = http.responseText;
			field.innerHTML = response;
			if(!response) window.location.href = url;
		}
  	}
	catch(e){}
	finally{}
}

function handleResponse() {
	try {
		if((http.readyState == 4)&&(http.status == 200)){
			response = http.responseText;
			field.innerHTML = response;
			field.scrollIntoView();
			if(!response) window.location.href = url;
		}
  	}
	catch(e){}
	finally{}
}

function AlbumNEW(singer_type,album_type,obj) {
	var linkList = document.getElementById("tab_click_album").getElementsByTagName("a");
   		for (i = 0; i < linkList.length; i++) {
      		linkList[i].className = "_tabSChart";
   		}
   	obj.className = "activer";
	try {
		field = document.getElementById("load_album");
		field.innerHTML = loadingTGT;
		http.open('POST', mainURL+'/index.php');
		http.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		http.onreadystatechange = nohandleResponse;
		http.send('load_album=1&singer_type='+singer_type+'&album_type='+album_type);
	}
	catch(e){}
	finally{}
	return false;
}

function VideoNEW(singer_type,obj) {
	var linkList = document.getElementById("tab_click_video").getElementsByTagName("a");
   		for (i = 0; i < linkList.length; i++) {
      		linkList[i].className = "_tabSChart";
   		}
   	obj.className = "activer";
	try {
		field = document.getElementById("load_video");
		field.innerHTML = loadingTGT;
		http.open('POST', mainURL+'/index.php');
		http.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		http.onreadystatechange = nohandleResponse;
		http.send('load_video=1&singer_type='+singer_type);
	}
	catch(e){}
	finally{}
	return false;
}

function showTop(num,page,number,apr) { 
    field = document.getElementById(num);
	field.innerHTML = loadingTGT;
	http.open('POST', mainURL+'/index.php');
	http.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	http.onreadystatechange = handleResponse;
    http.send('showtop=1&num='+num+'&page='+page+'&number='+number+'&apr='+apr); 
  	return false; 
}

function showComment(media_id,page,comment_type) { 
	field = document.getElementById("comment_field");
	field.innerHTML = loadingTGT;
	http.open('POST',  mainURL+'/index.php');
	http.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	http.onreadystatechange = handleResponse;
    http.send('showcomment=1&media_id='+media_id+'&page='+page+'&comment_type='+comment_type); 
  return false; 
} 

function comment_handleResponse() {
	try {
		if((http.readyState == 4)&&(http.status == 200)){
			var response = http.responseText;
			if (response == 'OK') {
				media_id = encodeURIComponent(document.getElementById("media_id").value);
				num = encodeURIComponent(document.getElementById("num").value);
				comment_type = encodeURIComponent(document.getElementById("comment_type").value);
				showComment(media_id,1,comment_type);
			}
			else document.getElementById("comment_loading").innerHTML = response;

		}
  	}
	catch(e){}
	finally{}
}

function comment_check_values() {
	if(loginTGT == 'NO') {
		Login_Box();
	}else {
		media_id = encodeURIComponent(document.getElementById("media_id").value);
		num = encodeURIComponent(document.getElementById("num").value);
		comment_poster = encodeURIComponent(document.getElementById("comment_poster").value);
		comment_type = encodeURIComponent(document.getElementById("comment_type").value);
		comment_content = encodeURIComponent(document.getElementById("comment_content").value);
		try {
			document.getElementById("comment_loading").innerHTML = loadingTGT;
			document.getElementById("comment_loading").style.display = "block";
			http.open('POST',  mainURL+'/index.php');
			http.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
			http.onreadystatechange = comment_handleResponse;
			http.send('comment=1&media_id='+media_id+'&num='+num+'&comment_poster='+comment_poster+'&comment_type='+comment_type+'&comment_content='+comment_content);
			document.getElementById("submit").disabled=true;document.getElementById("submit").value="LOADING...";
		}
		catch(e){}
		finally{}
	  return false;
	}
}
function LoadInfoSinger(name_singer,type,type_2) {jQuery.ajax({type:"POST",url:"index.php",data:"SingerInfo=1&name_singer="+name_singer+"&type="+type+"&type_2="+type_2,success:function(html){if(type_2 == 1){jQuery("#LoadSingerInfo").html(html);}else jQuery("#LoadLyricInfo").html(html);}});}

/*LOGIN*/
function Login_Box() {
               new Boxy('<div class="login_boxy">'+
						'<form method="post" action="xuly_login.php">'+
						'<table width="100%" border="0" cellpadding="0" cellspacing="5">'+
						'<tr><td class="login_left_boxy">Tài khoản</td><td class="login_input_top"><input class="login_input_boxy" type="text" name="username" /></td></tr>'+
						'<tr><td class="login_left_boxy">Mật khẩu</td><td><input class="login_input_boxy" type="password" name="password" /></td></tr>'+
						'<tr><td></td><td class="login_left_boxy_ghinho"><input type="checkbox" checked="checked" name="remember" value="1"> Ghi nhớ đăng nhập? | <a href="Member/Quen-Mat-Khau.html" target="_blank">Quên mật khẩu?</a></td></tr>'+
						'<tr><td></td><td class="login_left_boxy_ghinho">Chưa có tài khoản, <a href="dangki.php" target="_blank">Đăng Ký</a></p></td></tr>'+						'<tr><td colspan="2" class="login_bottom_boxy"><input class="login_xxx" type="submit" value="Đăng nhập" name="login_oki"/>&nbsp;<input class="close" onclick="register();" type="submit" value="Hủy bỏ" /></td></tr>'+
						'</table>'+
						'</form></div>', {title: 'Đăng nhập', modal: true});
};
function GETOKI(song_id,type) {
	if(type == 1) {
		AddOK = '<img src="'+mainURL+'/images/media/add_oki.gif" />';
		$('#playlist_'+song_id).html(AddOK);
	}
	if(type == 2)  {
		AddOK = '<a class="Alike">Đã thêm xong</a>';
		$('#Load_Album_'+song_id).html(AddOK);
	}
	if(type == 3) {
		AddOK = '<img src="'+mainURL+'/images/media/add_oki.gif" />';
		$('#Load_Video_'+song_id).html(AddOK);
	}
}
function _load_box(number) {
	if(loginTGT == 'NO') {
		Login_Box();
	}else {
	
	ID = document.getElementById('_load_box_'+number);
	if (ID.style.display == "block") {
		ID.style.display = "none"; 
	}
	else {
			$('._PL_BOX').hide();
			$.post("ajax-tgt.php", {song_id: ""+number+""}, function(data){
				if(data.length >0) {
					$('#_load_box_' + number).show();
					$('#_load_box_pl_' + number).html(data);
				}
			});
		}
	}
}

function BXH(type,number,obj) {

	if(type == 'bxh_vn' || type == 'bxh_am' || type == 'bxh_ca') {
		id_load	 	= 'tab_click_top_song';
		id_load2	= 'load_bxh';
	}else if (type == 'new_vn' || type == 'new_am' || type == 'new_ca') {
		id_load	 	= 'tab_click_new_song';
		id_load2	= 'load_new_song';
	}else {
		id_load 	= 'tab_click_top_video';
		id_load2	= 'load_bxhv';
	}
	var linkList = document.getElementById(id_load).getElementsByTagName("a");
   		for (i = 0; i < linkList.length; i++) {
      		linkList[i].className = "_tabSChart";
   		}
   	obj.className = "activer";
	
	try {
		field = document.getElementById(id_load2);
		field.innerHTML = loadingTGT;
		http.open('POST', mainURL+'/index.php');
		http.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		http.onreadystatechange = nohandleResponse;
		http.send('loadTopsong=1&type='+type+'&number='+number);
	}
	catch(e){}
	finally{}
	return false;
}

function _CREATPLAYLIST(id_song,num) {
	if(num == 0) {
		_V_ = '<input type="text" id="_playlist_name_'+id_song+'" class="del_padding" /> <span class="_add_"><a onclick="_CREATPLAYLIST('+id_song+',1);">Thêm</a><span>';
		$('#_CREATPLAYLIST_'+id_song).html(_V_);
	}
	else {
		album_name = encodeURIComponent(document.getElementById('_playlist_name_'+id_song).value);
		jQuery.ajax({
				 type:"POST",
				 url:"ajax-tgt.php",
				 data:"CreatPlaylist=1&album_name="+album_name+"&id="+id_song,
				 success:function(html){
					 $('._PL_BOX').hide();
					 	if(html == 0)
					 		$('#_Add2').html("<div class=\"error_yeu_thich\">Đã thêm bài hát vào <span>"+album_name+"</span> thành công<div>");
						if(html == 1)
							$('#_Add2').html("<div class=\"oki\"><span>Playlist</span> Đã có trong danh sách playlist của bạn<div>");
					 }
			});
		GETOKI(id_song,1);
	}
}
function AddFAV(add_id,type) {
		jQuery.ajax({
				 type:"POST",
				 url:"ajax-tgt.php",
				 data:"FAV=1&add_id="+add_id+"&type="+type,
				 success:function(html){
					 $('._PL_BOX').hide();
					 $('#_Add2').html("<div class=\"oki\">Đã thêm bài hát vào <span>Yêu thích</span> thành công<div>");
					 }
			});
		if(type == 1) GETOKI(add_id,1);
		if(type == 2) GETOKI(add_id,2);
		if(type == 3) GETOKI(add_id,3);
}

function THEMPLAYLIST(add_id,bh_id) {
		jQuery.ajax({
				 type:"POST",
				 url:"ajax-tgt.php",
				 data:"ADDPLAYLIST=1&add_id="+add_id+"&bh_id="+bh_id,
				 success:function(html){
					 $('._PL_BOX').hide();
					 }
			});
		GETOKI(bh_id,1);
}

function _lstPlsAdd(bh_id) {
	add_id 		= encodeURIComponent(document.getElementById("_lstPls").value);
	if(add_id == "") {
		$('#_Add2').html("<div class=\"error_yeu_thich\">Bạn chưa có <span>playlist</span> nào vui lòng tạo một playlist mới<div>");
	}else {
	THEMPLAYLIST(add_id,bh_id);
		$('#_Add2').html("<div class=\"oki\">Đã thêm bài hát vào <span>playlist</span> thành công<div>");
	}
}

function AddFAVAlbum(add_id) {
	if(loginTGT == 'NO') {
		Login_Box();
	}else {
		jQuery.ajax({
				 type:"POST",
				 url:"ajax-tgt.php",
				 data:"AddFAVAlbum=1&add_id="+add_id,
				 success:function(html){
						 if(html == 'no') {
						 	$('#_Add').html("<div class=\"error_yeu_thich\">Bạn đã thêm vào yêu thích<div>");
						 }else {
							AddFAV(add_id,2);	
							$('#_Add').html("<div class=\"oki\">Đã thêm playlist vào <a href=\"cpanel/music/favouritep.html\">Yêu thích</a> thành công</div>");
						 }
					 }
			});
	}
}
function AddFAVVideo(add_id) {
	if(loginTGT == 'NO') {
		Login_Box();
	}else {
		jQuery.ajax({
				 type:"POST",
				 url:"ajax-tgt.php",
				 data:"AddFAVVideo=1&add_id="+add_id,
				 success:function(html){
						 if(html == 'no') {
						 	$('#_Add').html("<div class=\"error_yeu_thich\">Bạn đã thêm vào yêu thích<div>");
						 }else {
							AddFAV(add_id,3);	
							$('#_Add').html("<div class=\"oki\">Đã thêm video vào <a href=\"cpanel/video/favourite.html\">Yêu thích</a> thành công</div>");
						 }
					 }
			});
	}
}
function xSongAlbum(album_id,remove_id) {
				 var order = "xSongAlbum=1&album_id="+album_id+'&remove_id='+remove_id;
				 $.post("update-album.php", order, function(theResponse){
						 	$('#LoadSongAlbum').html(theResponse);
						 });
}

function SendError() {
	if(loginTGT == 'NO') {
		Login_Box();
	}else {
		media_id 	= encodeURIComponent(document.getElementById("media_id").value);
		drlReason 	= encodeURIComponent(document.getElementById("drlReason").value);
		type 		= encodeURIComponent(document.getElementById("type").value);
		errortxt	=	drlReason;
		if(drlReason == 0) {
				$('.error_yeu_thich').show();
				$('.error_yeu_thich').html('Bạn chưa chọn nội dung báo lỗi.');
				return false;
		}
		if(drlReason == 1) {
				errortxt  = 	encodeURIComponent(document.getElementById("txtContent").value);			
		}
		
		if(errortxt=="") {
				$('.error_yeu_thich').show();
				$('.error_yeu_thich').html('Bạn chưa nhập nội dung báo lỗi.');
				return false;
		}
		
		else {
					jQuery.ajax({
							 type:"POST",
							 url:"ajax-tgt.php",
							 data:"SendError=1&media_id="+media_id+"&errortxt="+errortxt+"&type="+type,
							 success:function(html){
								 if(html == 1) {
									 $('.error_yeu_thich').show();
									 $('.error_yeu_thich').html('Nội dung của bạn chứa nhiều hơn 250 ký tự.');
									 }
								 if(html == 2) {
									 Boxy.alert("Mọi ý kiến đóng góp của bạn sẽ được BQT XhdMp3.CoM tiếp nhận và giải quyết trong thời gian sớm nhất, cảm ơn các bạn.", null, {title: 'Thông báo'});
								 }
								 }
						});
		}

	}
	
	
}

function eventPlayerZing(nameEvent, messegeEvent) {
	switch(nameEvent)
	{
		case 'zoomSizeOn':
			if ($.cookie('zoom') == 1) {
				$('#v_load_x1').removeClass('player_fjx');
				$('#m_3').removeClass('fjx_margin');
				$.cookie('zoom',0);
			}else {
				$('#v_load_x1').addClass('player_fjx');
				$('#m_3').addClass('fjx_margin');
				$.cookie('zoom',1);
			}
			break;
		case 'zoomSizeOff':
			$('#v_load_x1').removeClass('player_fjx');
			$('#v_load_x2').removeClass('fjx_margin');
			break;
		case 'nextHandler':
		case 'prevHandler':
			$('#_plContainer').children('div').each(function(){$(this).removeClass('hover').removeClass('bglist');});
			$('#_plItem'+messegeEvent).addClass('hover');			
			break;
	}
}

function SINGERSHOWHIDE() {
	$('#singer_info').slideToggle(0);
	ID = document.getElementById('singer_info');
	if (ID.style.display == "block") {
		$('#singer_txt').html('Ẩn thông tin');
	}else {
		$('#singer_txt').html('Xem thông tin');	
	}
}

function LYRICSHOWHIDE(show) {
	if(show == 1) {
		$('#lyric_load').removeClass('rows4');
		$('.iLyric').html('<a class="_viewMore_" onclick="LYRICSHOWHIDE(0);">Ẩn toàn bộ</a>');
	}else {
		$('#lyric_load').addClass('rows4');	
		$('.iLyric').html('<a class="_viewMore" onclick="LYRICSHOWHIDE(1);">Xem toàn bộ</a>');
	}	
}
function ALBUMHOWHIDE(show) {
	if(show == 1) {
		$('#info_load').removeClass('row2');
		$('#info_txt').html('<a class="_viewMore_" onclick="ALBUMHOWHIDE(0);">Ẩn toàn bộ</a>');
	}else {
		$('#info_load').addClass('row2');	
		$('#info_txt').html('<a class="_viewMore" onclick="ALBUMHOWHIDE(1);">Xem toàn bộ</a>');
	}	
}