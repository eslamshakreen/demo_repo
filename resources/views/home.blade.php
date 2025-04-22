<h1>Hello {{ $myname }} {{ $myLastName }}</h1>

@if(strlen($myname) > 3)

    <p>The name is Too Long</p>

@elseif(strlen($myname) < 3)

    <p>The name is Short</p>

@else

    <p>The name is just right</p>

@endif

@unless(strlen($myname) > 3)

    <p>The name is Too Long</p>

@endunless