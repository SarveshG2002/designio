<!DOCTYPE html>
<html lang="en">
    @include('includes.layout-header')
    <link rel="stylesheet" href="{{ asset('css/chat.css') }}">
<body>
    <div class="main_container">
        @include('includes.navbar')
        <div class="container">
            <div class="sidebar">
                @include('includes.sidebar',['page'=>'friends'])
                {{-- hello --}}
            </div>
            <div class="middle">
                {{-- Chatting with {{$fid}} --}}
                <div class="left_middle">
                    <div class="feedDiv" id="allFeedDiv">
                        <div class="statuscontainer">
                            <div class="wrap">
                                <div class="search">
                                <input type="text" class="searchTerm" placeholder="Search">
                                <button type="submit" class="searchButton">
                                        <span class="material-symbols-outlined">
                                            search
                                        </span>
                                </button>
                                </div>
                            </div>
                            <div class="friendList" style="height: 80vh;overflow-x:auto">
                                <div class="headFriend">
                                    <h1>My Friends</h1>
                                </div>
                                @php
                                    $iid=0;
                                @endphp
                                @foreach ($following as $key => $friend)
                                    <div class="flistdiv" onclick="window.location.href='{{url('/')}}/chat/{{$friend->id}}'">
                                        <div class="profileimg">
                                            <div class="img">
                                                @php
                                                $profileImg =  $friend->profile;
                                                @endphp
                                
                                                @if($profileImg !== null)
                                                    <img src="{{ asset('storage/' . $profileImg) }}" alt="Profile Image">
                                                @else
                                                    <img src="{{ asset('default_profile.png') }}" alt="Default Profile Image">
                                                @endif
                                                {{-- <img src="default_profile.png" alt=""> --}}
                                            </div>
                                        </div>
                                        <div class="fname">
                                            <p class="name">
                                                {{ $friend->name }} {{-- Assuming 'name' is the property you want to display --}}
                                            </p>
                                            <div class="msg" style="font-size:15px">
                                                {{ $friend->bio }}
                                            </div>
                                        </div>
                                        <div class="status" style="padding-left:10px">
                                            <div class="date">
                                                <p style="margin-top: 10px">23-03-2022</p> {{-- Assuming 'date' is the property you want to display --}}
                                            </div>
                                            
                                        </div>
                                        
                                    </div>
                                @endforeach
                            
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="right_middle">
                    <div class="feedDiv" style="width:98%">
                        <div class="statuscontainer">
                            <div class="wrap">
                                <div class="" style="border-width:0px 0px 0.5px 0px; border-style:ridge; border-color:rgb(209, 209, 209)">
                                {{-- <input type="text" class="searchTerm" placeholder="Search">
                                <button type="submit" class="searchButton">
                                        <span class="material-symbols-outlined">
                                            search
                                        </span>
                                </button> --}}
                                <div class="friendName">
                                    Sarvesh Gandhere
                                </div>
                                </div>
                            </div>
                            <div class="messages">
                                <div class="text-messages" id="message-container">
                                    <div class="message my-text">
                                        <div class="amsg">
                                            This is a left-aligned message.
                                        </div>
                                        <div class="msgstatus">
                                            <span class="material-symbols-outlined my-text">schedule</span>
                                        </div>
                                    </div>
                                    <div class="message friend-text">
                                        This is a right-aligned message.
                                    </div>

                                    
                                </div>
                                <div class="wrap msg-input">
                                    <div class="search">
                                        <input type="text" class="searchTerm" id="my-input-msg" placeholder="Search" style="width:90%">
                                        <button type="submit" class="searchButton" id="send_my_mesg">
                                                <span class="material-symbols-outlined">
                                                    send
                                                </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                
            </div>
            <div class="rightbar">
                right bar
            </div>
        </div>     
    </div>     
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/chat.js') }}"></script>   
</body>
</html>