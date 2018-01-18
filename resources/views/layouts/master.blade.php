<!DOCTYPE html>
<html>
<head>

@include('layouts.assets') 

</head>
<body>

@include('layouts.nav')

<div class="container">

	@yield('content')
	
</div>



@yield('scripts')
</body>
</html>