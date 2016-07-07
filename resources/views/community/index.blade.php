@extends('layouts.app')

@section('content')
    <div class="container">
		<h1>Community</h1>

        <ul class="links">
            @foreach ($links as $link)
                <li class="links__link">
                    <a href="{{ $link->link }}" target="_blank">
                        {{ $link->title }}
                    </a>

                    <small>
                        Contributed By: <a href="#">{{ $link->creator->name }}</a> {{ $link->updated_at->diffForHumans() }}
                    </small>
                </li>
            @endforeach
        </ul>
    </div>
@stop