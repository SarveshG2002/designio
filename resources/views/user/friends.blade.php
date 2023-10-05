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
                        <div class="friendList">
                            <div class="flistdiv">
                                <div class="fname">
                                    <div class="name">
                                        Virat Kohli
                                    </div>
                                    <div class="msg">
                                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Rem facere fugit neque, quidem perspiciatis, 
                                    </div>
                                </div>
                                <div class="status">
                                    <div class="date">
                                        22-7-2023
                                    </div>
                                    <div class="time">
                                        02:07 pm
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
</body>
</html>