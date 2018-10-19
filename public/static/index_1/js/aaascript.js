$('#login-button').click(function (event) {
	var userName=document.getElementById("userName").value;  
    var pwd=document.getElementById("pwd").value;
    if(userName=="晨晓维" &&  pwd=="1020"){ 
		event.preventDefault();
		$('form').fadeOut(500);
		$('.wrapper').addClass('form-success');
		setTimeout(function(){location.href="index_12";},2000);
	}
	else{
		alert("Wrong Password");
	}
});
