<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="favicon.ico" />
    <link rel="shortcut icon" type="image/png" href="{{asset('assets/images/fontend_logo/icon.png')}}"/>
    
    <style>
    
	@import url(https://fonts.googleapis.com/css?family=Roboto:300);
	
	.login-page {
	  width: 360px;
	  padding: 8% 0 0;
	  margin: auto;
	}
	.form {
	  position: relative;
	  z-index: 1;
	  background: #ffffff;
	  max-width: 360px;
	  margin: 0 auto 100px;
	  padding: 45px;
	  text-align: center;
	  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
	}
	.form input {
	  font-family: "Roboto", sans-serif;
	  outline: 0;
	  background: #f2f2f2;
	  width: 100%;
	  border: 0;
	  margin: 0 0 15px;
	  padding: 15px;
	  box-sizing: border-box;
	  font-size: 14px;
	}
	.form button {
	  font-family: "Roboto", sans-serif;
	  text-transform: uppercase;
	  outline: 0;
	  background: #4caf50;
	  width: 100%;
	  border: 0;
	  padding: 15px;
	  color: #ffffff;
	  font-size: 14px;
	  -webkit-transition: all 0.3 ease;
	  transition: all 0.3 ease;
	  cursor: pointer;
	}
	.form button:hover,
	.form button:active,
	.form button:focus {
	  background: #43a047;
	}
	.form .message {
	  margin: 15px 0 0;
	  color: #b3b3b3;
	  font-size: 12px;
	}
	.form .message a {
	  color: #4caf50;
	  text-decoration: none;
	}
	.form .register-form {
	  display: none;
	}
	.container {
	  position: relative;
	  z-index: 1;
	  max-width: 300px;
	  margin: 0 auto;
	}
	.container:before,
	.container:after {
	  content: "";
	  display: block;
	  clear: both;
	}
	.container .info {
	  margin: 50px auto;
	  text-align: center;
	}
	.container .info h1 {
	  margin: 0 0 15px;
	  padding: 0;
	  font-size: 36px;
	  font-weight: 300;
	  color: #1a1a1a;
	}
	.container .info span {
	  color: #4d4d4d;
	  font-size: 12px;
	}
	.container .info span a {
	  color: #000000;
	  text-decoration: none;
	}
	.container .info span .fa {
	  color: #ef3b3a;
	}
	body {
	  background: url({{asset('assets/admin_bg.jpg')}});
	   background-position: center;
	  font-family: "Roboto", sans-serif;
	  -webkit-font-smoothing: antialiased;
	  -moz-osx-font-smoothing: grayscale;
	}
	

    </style>
</head>
<body>


 <div class="login-page">

  <div class="form">
   	<h2>Admin Login</h2>
    <form class="login-form"  method="POST" action="{{ url('/admin/login') }}">
    {{csrf_field()}}
       <input type="text" id="#{label}" name="name" value="{{ old('name') }}" required="required" placeholder="username" />
       @if ($errors->has('name'))
                                    <span class="help-block" style="color:red; font-size: 14px;">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
      <input type="password" id="#{label}" name="password" placeholder="password" required="required"/>
      <button>login</button>
     
    </form>
  </div>
</div>

</body>
</html>
