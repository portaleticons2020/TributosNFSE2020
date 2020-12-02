@extends('layouts.backend')
@section('content')
<style>
    .responsive {
        width: inherit;
        height: auto;
        max-width: 100%;
        max-height: 100%;


    }

    body {
        overflow: -moz-scrollbars-vertical;
        overflow-x: hidden;
        overflow-y: hidden;
    }

    #container figcaption {
        position: absolute;
        top: 550px;
        right: 550px;
        font-size: 60px;
        color: black;
        text-shadow: 0px 0px 5px black;
    }
</style>



<body>
    <figure id="container">
        <img src="/img/background.jpg" class="responsive" />
    </figure>
</body>



@endsection