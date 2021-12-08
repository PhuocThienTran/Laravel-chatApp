{{-- FriendshipCreate page: see current auth users, add users as friends --}}

@extends('layouts/masterLayout')
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    @section('title')
        Follow Friends
    @endsection

    @section('content')
        <div class="container">
            <br><br>
            <h2>Select Users to Follow:</h2>
            <div class="col-md-12 order-md-1">
                {{-- create a new friendship via current auth user id and current "registered" user id --}} 
                <form method='POST' action='{{url("friendship")}}'>
                    {{csrf_field()}}
                    <label>Your ID is: </label>
                    <input type="text" class="form-control" value="{{Auth::user()->id}}" name="user">
                    <label>Friend Name: </label>
                    <select name="userfollowing" class="form-control" required>
                        @foreach ($users as $user)
                            @if($user->id != Auth::user()->id)
                                <option value="{{$user->id}}" name="userfollowing">{{$user->name}}</option>
                            @endif
                        @endforeach
                    </select>
                    <br>

                    <button class="btn btn-success pull-right" type="submit">Add Friend</button>
                </form>
            </div>
        </div>

    @endsection
    
