<!DOCTYPE html>
<html lang="en">
    @include('includes.layout-header')
    <link rel="stylesheet" href="{{ asset('css/myposts.css') }}">
<body>
    <div class="main_container">
        @include('includes.navbar')
        <div class="container">
            <div class="sidebar">
                @include('includes.sidebar',['page'=>'myPosts'])
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
                        @foreach ($posts as $post)
                            @if($post['img1'] !== null)
                                <div class="feed" onclick="toggleModal('{{ asset('storage/' . $post['img1']) }}')">
                                    <img src="{{ asset('storage/' . $post['img1']) }}" alt="">
                                </div>
                            @endif
                        @endforeach
                    </div>
                    
                </div>

                {{-- <button class="trigger">Click the modal!</button> --}}

                <div class="imagemodal">
                    <div class="modal-content">
                        <div>
                            <span class="close-button">×</span>
                        </div>
                        <div class="modal-partition">
                            <div class="img">
                                <img id="modalimage" src="{{ asset('storage/' . $post['img1']) }}" alt="">
                            </div>
                            <div class="comment">
                                Comments over here
                            </div>
                        </div>
                        {{--  --}}
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