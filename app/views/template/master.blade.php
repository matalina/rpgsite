<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>@yield('title')</title>
	<meta name="description" content="@yield('description')">
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>
    <header>
        <div id="logo">
             <img src="{{ '#' }}" alt="{{ Matalina\Rpg\Models\Config::where('name','=','site-name')->first() }}"/>
        </div>
        <nav>
            @include('template.menu')
        </nav>
    </header>
    <main>
        @yield('content')
    <main>
    <footer>
    
    </footer>
</body>
</html>