<!DOCTYPE html>
<html lang="en">
    @include('includes.layout-header')
    <link rel="stylesheet" href="{{ asset('css/friends.css') }}">
<body>
    <div class="main_container">
        @include('includes.navbar')
        <div class="container">
            <div class="sidebar">
                @include('includes.sidebar',['page'=>'friends'])
                {{-- hello --}}
            </div>
            
            <div class="middle">
                <div class="feedDiv" id="allFeedDiv">
                    <div class="statuscontainer">
                        <div class="post_something">
                            Friends
                        </div>
                        
                    </div>
                </div>
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
                                // echo "hello";
                                
                            @endphp
                            @foreach ($following as $key => $friend)
                                <div class="flistdiv" onclick="window.location.href='chat/{{$friend->id}}'">
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
                                        <div class="name">
                                            {{ $friend->name }} {{-- Assuming 'name' is the property you want to display --}}
                                        </div>
                                        <div class="msg">
                                            {{ $friend->bio }}
                                        </div>
                                    </div>
                                    <div class="status" style="padding-left:10px">
                                        <div class="date">
                                            <p style="margin-top: 10px">23-03-2022</p> {{-- Assuming 'date' is the property you want to display --}}
                                        </div>
                                        <div class="time">
                                            <button id="reqbut{{ $friend->id }}" onclick="followme('{{ $friend->id }}')" style="background-color:grey">
                                                Followed
                                            </button> {{-- Assuming 'time' is the property you want to display --}}
                                        </div>
                                    </div>
                                    
                                </div>
                            @endforeach
                            <div class="headFriend">
                                <h1>Other</h1>
                            </div>
                            
                            @foreach ($notFollowing as $key => $friend)

                                @if(!isFollowing(session('id'),$friend->id))
                                    <div class="flistdiv">
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
                                            <div class="name">
                                                {{ $friend->name }} {{-- Assuming 'name' is the property you want to display --}}
                                            </div>
                                            <div class="msg">
                                                {{ $friend->bio }}
                                            </div>
                                        </div>
                                        <div class="status" style="padding-left:10px">
                                            <div class="date">
                                                <p style="margin-top: 10px">23-03-2022</p> {{-- Assuming 'date' is the property you want to display --}}
                                            </div>
                                            <div class="time">
                                                <button id="reqbut{{ $friend->id }}" onclick="followme('{{ $friend->id }}')">
                                                    Follow
                                                </button> {{-- Assuming 'time' is the property you want to display --}}
                                            </div>
                                        </div>
                                        
                                    </div>
                                @endif
                               
                            @endforeach
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

    <script src="{{ asset('js/friends.js') }}"></script>                                                                                                                                                                                                                      
</body>
</html>