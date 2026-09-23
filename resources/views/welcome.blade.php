@extends('layouts.app')

@section('sidebar')
    <ul class="text-center landing-side">
        <li class="sidebar-header">Spotlight</li>
        <li class="sidebar-section p-2">
            @if(isset($featuredCharacter) && $featuredCharacter && $featuredCharacter->image)
                <div>
                    <a href="{{ $featuredCharacter->url }}"><img src="{{ $featuredCharacter->image->thumbnailUrl }}" class="img-thumbnail" alt="{{ $featuredCharacter->fullName }}" /></a>
                </div>
                <div class="mt-1">
                    <span class="h5 mb-0">{!! $featuredCharacter->displayName !!}</span>
                </div>
                <div class="small">
                    @if($featuredCharacter->user)
                        Owned by {!! $featuredCharacter->user->displayName !!}
                    @else
                        Up for adoption
                    @endif
                </div>
                <hr class="w-75 mx-auto my-1" style="border-style: dashed;">
                <div class="small text-muted">A randomly chosen resident, refreshed on every visit.</div>
            @else
                <div class="small text-muted p-2">New characters will be spotlighted here once the masterlist fills up.</div>
            @endif
        </li>
        <li class="sidebar-section p-2 landing-side-links">
            <a href="{{ url('world') }}">Encyclopedia</a>
            <a href="{{ url('masterlist') }}">Masterlist</a>
            <a href="{{ url('prompts/prompts') }}">Prompts</a>
            <a href="{{ url('gallery') }}">Gallery</a>
        </li>
    </ul>
@endsection

@section('content')
    @if(Auth::check())
        @include('pages._dashboard')
    @else
        @include('pages._logged_out')
    @endif
@endsection
