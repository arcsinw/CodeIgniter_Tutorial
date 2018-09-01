
var g_site = '/tutorial/demo';
$('#login_btn').on('click', function () {
	var pwd = $('#email').val();
	var email = $('#password').val();
	
	$.ajax({
		url: g_site + '/login/login',
		type: 'POST',
		data: {
			password: pwd,
			email: email
		},
		dataType: 'text',
		success: function (data) {
			var lg_err = document.getElementById('lg_err');
			if (data === '0') {
				lg_err.style.display = 'block';
				document.getElementById('lg_err').firstElementChild.textContent = '用户名或登录密码错误！';
				console.log(data);
			} else {
				lg_err.style.display = 'none';
				lg_err.style.color = 'red';
				console.log(data);
				window.location.href = g_site + data;
			}
		},
		error: function (data) {
			console.log(data);
		}
	});
});
