@extends('layouts.master')

@section('content')  
<style>
    /* img {
        max-width: 100%;
        max-height: 100%;
    } */
    .profile {
        max-width: 850px;
    }
    .profile a {
        transition: .15s color;
    }
    .profile a:hover {
        text-decoration: none;
        color: hsl(0, 0%, 48%);
        transition: .15s color;
    }
    .container
    {
        min-height: 70%;
        min-height: -webkit-calc(100% - 183px);
        min-height: -moz-calc(100% - 183px);
        min-height: calc(100% - 183px);
    }

</style>
<div class="profile mx-auto pt-4">
    <div class="container">
       <div class="columns">
           <div class="column is-one-third">
                <figure class="w-100">
                    <img class="image is-rounded p-4" src="{{ asset('storage/' . $userPhotos[0]->filename) }}">
                </figure>   
           </div>
           <div class="column">
                <h2 class="title is-1 mt-6">{{$user->name}}, <span class="has-text-grey-light">{{$userProfileInfo->age}}</span></h2> 
                <div class="tags">
                    @foreach($userFandomTags as $f)
                        @if (in_array($f, auth()->user()->fandomTagNames()))
                            <span class="tag is-primary is-rounded is-medium">{{ $f }}</span>
                        @else
                            <span class="tag is-light is-rounded is-medium">{{ $f }}</span>
                        @endif  
                @endforeach
                </div>
           </div>
       </div>
    </div>

    {{-- Bio + Social --}}
    <div class="container is-size-5">
        <div class="columns px-2">
            <div class="column px-4">
                {{$userProfileInfo->bio}}
                <br>
                <br>
                <a class="button" href="/users/edit/{{ $user->id }}">Edit My Profile</a>
            </div>
            <div class="column pl-4">
                @if($userProfileInfo->twitter) 
                    <p> <i class="fab fa-twitter fa-fw align-middle has-text-grey pr-2"></i> 
                        <a href="https://twitter.com/{{ $userProfileInfo->twitter }}"> {{ $userProfileInfo->twitter }}</a>
                    </p> 
                @endif
                @if($userProfileInfo->discord) 
                    <p> <i class="fab fa-discord fa-fw align-middle has-text-grey pr-2"></i> {{ $userProfileInfo->discord }} </p> 
                @endif
                @if($userProfileInfo->tumblr) 
                    <p> <i class="fab fa-tumblr fa-fw align-middle has-text-grey pr-2"></i> 
                        <a href="https://{{ $userProfileInfo->tumblr }}.tumblr.com"> {{ $userProfileInfo->tumblr }} </a>
                    </p>
                @endif
                @if($userProfileInfo->email) 
                    <p> 
                        <i class="fas fa-envelope fa-fw align-middle has-text-grey pr-2"></i> 
                        <a href="mailto:{{ $userProfileInfo->email }}"> {{ $userProfileInfo->email }} </a>
                    </p> 
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
