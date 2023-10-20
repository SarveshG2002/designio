<!DOCTYPE html>
<html lang="en">
    @include('includes.layout-header')
    <link rel="stylesheet" href="{{ asset('css/explore.css') }}">
<body>
    <div class="main_container">
        @include('includes.navbar')
        <div class="container">
            <div class="sidebar">
                @include('includes.sidebar',['page'=>'explore'])
                {{-- hello --}}
            </div>
            <div class="middle">
                <div class="explore-contentainer">
                    <div class="options">
                        <div class="option">
                            Painting
                        </div>
                        <div class="option">
                            Pop Art
                        </div>
                        <div class="option">
                            Sculpture
                        </div>
                        <div class="option">
                            Photography
                        </div>
                        <div class="option">
                            Decorative Art
                        </div>
                        <div class="option">
                            Fashion Design
                        </div>
                        <div class="option">
                            Music
                        </div>
                    </div>

                    <div class="feeds">
                        <div class="feed">
                            <img src="{{ asset('default_profile.png') }}" alt="Default Profile Image">
                        </div>
                        <div class="feed">
                            <img src="{{ asset('default_profile.png') }}" alt="Default Profile Image">
                        </div>
                        <div class="feed">
                            <img src="{{ asset('default_profile.png') }}" alt="Default Profile Image">
                        </div>
                        <div class="feed">
                            <img src="{{ asset('default_profile.png') }}" alt="Default Profile Image">
                        </div>
                        <div class="feed">
                            <img src="{{ asset('default_profile.png') }}" alt="Default Profile Image">
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