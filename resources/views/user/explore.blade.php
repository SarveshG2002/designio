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
                        @foreach ($posts as $post)
                            @if($post['img1'] !== null)
                                <div class="feed">
                                    <img src="{{ asset('storage/' . $post['img1']) }}" alt="">
                                </div>
                            @endif
                        @endforeach
                    </div>
                    
                </div>

                <button class="trigger">Click the modal!</button>

                <div class="imagemodal">
                    <div class="modal-content">
                        <span class="close-button">×</span>
                        <h1>Hello, I am a modal!</h1>
                    </div>
                </div>

                
                
            </div>
            
            <div class="rightbar">
                right bar
            </div>
        </div>     
    </div> 
    <script>
        var modal = document.querySelector(".imagemodal");
var trigger = document.querySelector(".trigger");
var closeButton = document.querySelector(".close-button");

function toggleModal() {
    console.log("clicked")
    modal.classList.toggle("show-modal");
}

function windowOnClick(event) {
    if (event.target === modal) {
        toggleModal();
    }
}

trigger.addEventListener("click", toggleModal);
closeButton.addEventListener("click", toggleModal);
window.addEventListener("click", windowOnClick);

    </script>                                                                                                                                                                                                                     
</body>
</html>