{{-- Message page: see current chat users, recent message, send message, send files --}}

@extends('layouts/masterLayout')

    @section('title')
        Message
    @endsection

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/offcanvas/">

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="{{asset('css/offcanvas.css')}}" rel="stylesheet">
    
    <link href="{{asset('css/message.css')}}" rel="stylesheet">

    <br>
    @section('content')
        <main role="main" class="container">
            <div class="container bootstrap snippets bootdey">
                <div class="tile tile-alt" id="messages-main">
                    <div class="ms-menu">
                        <div class="action-header">
                            <h7>Users in this chat:</h7>                        
                        </div>
    
                        {{-- individually display current users in chat --}}
                        <div class="list-group lg-alt">
                            @foreach($users as $user)
                                <a class="list-group-item">
                                    <div class="pull-left">
                                        <img src="{{url($user->image)}}" alt="" class="img-avatar"><small class="list-group-item-heading"> {{$user->name}}</small></img>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                        
                    </div>
                    
                    <div class="ms-body">
                        <div class="action-header">
                            <span>Recent Messages</span>
                        </div>

                        <br>

                        <div class="message-feed media">
                            {{-- in each message, look for the corresponding user via aligning user->id and message->user_id --}}
                            @foreach($usermessage as $message)
                                @foreach($users as $user)
                                    @if($user->id == $message->user_id)
                                        <img class="bd-placeholder-img rounded-circle" width="50" height="50" src="{{url($user->image)}}" role="img" focusable="false">
                                        <div class="mf-content">
                                            <strong>{{$user->name}}: </strong>{{$message->message}}
                                            <br>
                                            {{-- check if the message has an image, if no -> display image as "" --}}
                                            @if($message->image == "")
                                                <small class="mf-date"><i class="fa fa-clock-o"></i> {{$message->created_at}}</small>                                    
                                            @else
                                                <img class="rounded-square" width="200" height="200" src="{{url($message->image)}}" role="img"></img>
                                                <br>
                                                <small class="mf-date"><i class="fa fa-clock-o"></i> {{$message->created_at}}</small>     
                                            @endif                               
                                            </img>
                                        </div>
                                        <br><br>
                                    @endif
                                @endforeach
                            @endforeach
                        </div>
                                    

                        {{-- create a new message with image as an option --}}
                        <form method='POST' action='{{url("message")}}' enctype="multipart/form-data">
                            {{csrf_field()}}
                            <small class="d-block text-left mt-3">
                                <input type="hidden" style="border:0"  value="{{Auth::user()->id}}" name="user">
                            
                                <div class="msb-reply">
                                    <label>Message:</label>
                                    <textarea placeholder="What's on your mind..." class="form-control" type="text" name="text"></textarea>

                                    <p><label>Attach Image: </label>
                                    <p><input type='file' name='messageImage'> <p/>          
                                    
                                    <button class="msg_send_btn" type="submit"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>

                                </div>        
                                
                            
                            </small>
                        </form>

                    </div>
                </div>
            </div>



        
        </main>
    @endsection

