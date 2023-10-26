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
                                            <div class="msg">
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
                    Right
                </div>
                
            </div>
            <div class="rightbar">
                right bar
            </div>
        </div>     
    </div>                                                                                                                                                                                                                      
</body>
</html>