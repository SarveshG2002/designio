<!DOCTYPE html>
<html lang="en">
    @include('includes.layout-header')
<body>
    <div class="main_container">
        @include('includes.navbar')
        <div class="container">
            <div class="sidebar">
                @include('includes.sidebar',['page'=>'setting'])
                {{-- hello --}}
            </div>
            <div class="middle">
                Setting
            </div>
            <div class="rightbar">
                right bar
            </div>
        </div>     
    </div>                                                                                                                                                                                                                      
</body>
</html>