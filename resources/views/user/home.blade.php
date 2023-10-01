<!DOCTYPE html>
<html lang="en">
    @include('includes.layout-header')
    <link rel="stylesheet" href="{{ asset('css/feed.css') }}">
<body>
    <div class="main_container">
        @include('includes.navbar')
        <div class="container">
            <div class="sidebar">
                @include('includes.sidebar',['page'=>'feed'])
                {{-- hello --}}
            </div>
            <div class="middle">
                <div class="feedDiv">
                    <div class="statuscontainer">
                        <div class="todaystatus mystatus" style="background-color: #caabff;">
                            <img src="default_profile.png" alt="">
                        </div>
                        <div class="todaystatus ostatus">
                            <img src="default_profile.png" alt="">
                        </div>
                        <div class="todaystatus ostatus">
                            <img src="default_profile.png" alt="">
                        </div>
                    </div>
                    
                    <div class="feedcontainer">
                        <div class="feed">
                            <div class="userinfo">

                            </div>
                            <div class="discription">

                            </div>
                            <div class="artwork">

                            </div>
                            <div class="reach">

                            </div>
                            <div class="comment">

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