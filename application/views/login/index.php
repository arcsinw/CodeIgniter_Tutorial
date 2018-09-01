<div class="form-group">
  <label for="exampleInputEmail1">Email address</label>
  <input type="email" class="form-control" id="email" placeholder="Email">
</div>
<div class="form-group">
  <label for="exampleInputPassword1">Password</label>
  <input type="password" class="form-control" id="password" placeholder="Password">
</div>

  <p id="message_block" style="display: none">Example block-level help text here.</p>

<button id="login_btn" class="btn btn-default">Submit</button>

<script>
  var g_site = '/tutorial/demo';
  $('#login_btn').on('click', function () {
    var email = $('#email').val();
    var pwd = $('#password').val();
    
    $.ajax({
      url: g_site + '/login/login',
      type: 'POST',
      data: {
        password: pwd,
        email: email
      },
      dataType: 'text',
      success: function (data) {
        var message_block = document.getElementById('message_block');
        if (data === '1') {
          message_block.style.display = 'block';
          message_block.style.color = 'red';
          message_block.textContent = '用户名或登录密码错误！';
          console.log(data);
        } else {
          message_block.style.display = 'none';
          console.log(data);
          window.location.href = g_site + '/content';
        }
      },
      error: function (data) {
        message_block.style.display = 'block';
          message_block.textContent = 'Unexpected Error';
        console.log(data);
      }
    });
  });
</script>
