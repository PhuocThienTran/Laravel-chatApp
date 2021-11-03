@extends('layouts/masterLayout')

@section('title')
    Home
@endsection


@section('content')
    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <br>
    <div class="container marketing">
        <h3>Welcome @auth {{Auth::user()->name}} @endauth</h3>
        <div class="row">
            @foreach($userfriendship as $friendship)      
                <div class="col-lg-4">
                    <img class="bd-placeholder-img rounded-circle" width="140" height="140" src="{{url($friendship->image)}}" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"></img>
                    <h2>{{$friendship->name}}</h2>

                    <form method="post" action='{{url("friendship/$friendship->id")}}'>
                        {{csrf_field()}}
                        {{ method_field('DELETE') }}  <!-- we use the method delete that using the hidden method -->
                        <button class="btn btn-danger btn-margin" type="submit">Unfriend</button>
                    </form>

                </div><!-- /.col-lg-4 -->
            @endforeach
        </div><!-- /.row -->
        <p><a class="btn btn-secondary" style="margin:auto; display:block;" href='{{url("/message/test")}}'>Return to Conversation</a></p>
    </div>

    



    <!-- FOOTER -->
    <footer class="container">
        <p>&copy; 2021 Quick Apps</p>
    </footer>

@endsection