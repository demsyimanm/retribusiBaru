<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sistem Informasi Retribusi Kebersihan Kota Surabaya</title>
	<link rel="shortcut icon" href="{{URL::to('assets/image/logosurabaya.png')}}">
</head>
@include('dkp.master.header')
@include('dkp.master.footer')	
@include('dkp.master.navbar')
<body class="hold-transition skin-blue fixed sidebar-mini">
	<div class="wrapper">
		
		<div class="content-wrapper">
			@yield('content')
		</div>
    </div>

</body>
</html>
