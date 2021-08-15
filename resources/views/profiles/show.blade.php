<!-- <body>
    <div id="app">
        <example-component></example-component>
    </div>
    <script type="text/javascript" src="/js/app.js"></script>
</body> -->

<h1>Profile for {{ $user->name }}</h1>
<ul>
    <li>{{$userProfileInfo->age}}
    <li>{{$userProfileInfo->location}}
    <li>{{$userProfileInfo->bio}}
</ul>
<h3>Fandoms I like</h3>

<ul>
@foreach($fandoms as $f)
    <li>{{ $f->name }}</li>
@endforeach
</ul>