<!DOCTYPE html>
<html lang="en">
    @include('includes.layout-header')
    <link rel="stylesheet" href="{{ asset('css/messages.css') }}">
<body>
    <div class="main_container">
        @include('includes.navbar')
        <div class="container">
            <div class="sidebar">
                @include('includes.sidebar',['page'=>'group'])
                {{-- hello --}}
            </div>
            <div class="middle">
                <div class="feedDiv" id="allFeedDiv">
                    <div class="statuscontainer">
                        <div class="post_something">
                            Messages
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
                            
                            @php
                                $iid=0;
                                // echo "hello";
                                $following = $myChat;
                                // echo "<pre>";
                                // print_r($myChat);
                                // echo "</pre>";
                            @endphp
                            @foreach ($following as $key => $friend)
                            @php
                            $otheruser = (session('id')==$friend->user1_id)?$friend->user2_id:$friend->user1_id;
                            $profile = userDataById($otheruser);
                            $profileImg = $profile->profile;
                            @endphp
                                <div class="flistdiv" onclick="window.location.href='chat/{{$otheruser}}'">
                                    <div class="profileimg">
                                        <div class="img">
                                           
                            
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
                                            {{ $profile->name }} {{-- Assuming 'name' is the property you want to display --}}
                                        </div>
                                        <div class="msg">
                                            {{ $friend->content }}
                                        </div>
                                    </div>
                                    <div class="status" style="padding-left:10px">
                                        <div class="date">
                                            <p style="margin-top: 10px">{{ $friend->latest_message_time }}</p> {{-- Assuming 'date' is the property you want to display --}}
                                        </div>
                                        
                                    </div>
                                    
                                </div>
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
</body>
</html>