{{-- Home page: add friends, converse, unfriend --}}

@extends('layouts/masterLayout')

@section('title')
    Home
@endsection


@section('content')
    <br>
    <div class="container marketing">
        {{-- Welcome + Logged user name via auth check --}}
        <h3>Welcome @auth {{Auth::user()->name}} @endauth</h3>
        <div class="row">
            {{-- foreach loops through current userfriendship --}}
            @foreach($userfriendship as $friendship)      
                <div class="col-lg-4">
                    <img class="bd-placeholder-img rounded-circle" width="140" height="140" src="{{url($friendship->image)}}" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"></img>
                    <h2>{{$friendship->name}}</h2>

                    {{-- method_field delete to unfriend, csrf_field provides unique token for this specific action --}}
                    <form method="post" action='{{url("friendship/$friendship->id")}}'>
                        {{csrf_field()}}
                        {{ method_field('DELETE') }}  
                        <button class="btn btn-danger btn-margin" type="submit">Unfriend</button>
                    </form>

                </div><!-- /.col-lg-4 -->
            @endforeach
        </div><!-- /.row -->
        <p><a class="btn btn-secondary" style="margin:auto; display:block;" href='{{url("/message/converse")}}'>Return to Conversation</a></p>
    </div>

    



    <!-- FOOTER -->
    <footer class="container">
        <p>&copy; 2021 Quick Apps</p>
    </footer>

@endsection