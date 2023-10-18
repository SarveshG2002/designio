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
                        
                    </div>
                    <div class="feeds">

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