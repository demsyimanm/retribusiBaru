
<!DOCTYPE html>
<html>
<head>
  <!-- Standard Meta -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <!-- Site Properities -->
  <title>Login</title>
  @include('dkp.master.header')
  @include('dkp.master.footer')

  <style type="text/css">
    body {
      background-color: #DADADA;
    }
    body > .grid {
      height: 100%;
    }
    .image {
      margin-top: -100px;
    }
    .column {
      max-width: 450px;
    }
  </style>
  <script>
  $(document)
    .ready(function() {
      $('.ui.form')
        .form({
          fields: {
            email: {
              identifier  : 'username',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Please enter your username'
                },
                {
                  type   : 'length[5]',
                  prompt : 'Please enter a valid username'
                }
              ]
            },
            password: {
              identifier  : 'password',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Please enter your password'
                },
                {
                  type   : 'length[5]',
                  prompt : 'Your password must be at least 6 characters'
                }
              ]
            }
          }
        })
      ;
    })
  ;
  </script>
</head>
<body>

<div class="ui middle aligned center aligned grid">
  <div class="column">
    <h2 class="ui teal image header">
      <img src="{{URL::to('assets/image/alpro2.png')}}" style="width:50%" class="image">
      <div class="content" style="color:#0A3E56">
        Log-in to your account
      </div>
    </h2>
    <form class="ui large form" action="" method="POST">
      <div class="ui stacked segment">
        <div class="field">
          <div class="ui left icon input">
            <i class="user icon"></i>
            <input type="text" name="username" placeholder="Username">
          </div>
        </div>
        <div class="field">
          <div class="ui left icon input">
            <i class="lock icon"></i>
            <input type="password" name="password" placeholder="Password">
          </div>
        </div>
        {{csrf_field()}}
        <div class="ui fluid large teal submit button" style="background-color:#0A3E56">Login</div>
      </div>

      <div class="ui error message"></div>

    </form>

    <div class="ui message">
      <p><b>Algorithm and Programming Laboratory</b></p>
      <p>Teknik Informatika - ITS Surabaya</p>
    </div>
  </div>
</div>

</body>
</html>
