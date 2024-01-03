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
                                <div class="feed" onclick="toggleModal('{{ asset('storage/' . $post['img1']) }}','{{ $post['description']}}','{{ $post['tags'] }}','{{ $post['created_at'] }}','{{ $post['id'] }}')">
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
                            <div class="img" id="modal_image">
                                <img id="modalimage" src="{{ asset('storage/' . $post['img1']) }}" alt="">
                            </div>
                            <div class="PostData">
                                <div class="date_div">
                                    <span>Posted At</span>
                                    <div class="date" id="date">
                                    
                                    </div>
                                </div>
                                <div class="hr"></div>
                                <div class="desc_div">
                                    <span>Discription</span>
                                    <div class="desc" id="desc">

                                    </div>
                                </div>
                                
                                <div class="hr"></div>
                                <div class="tags_div">
                                    <span>Tags</span>
                                    <div class="tags" id="tags">

                                    </div>
                                </div>
                                <div class="updateBut">
                                    Edit
                                </div>
                                <input type="hidden" id="postid">
                                
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
    <script>
        var modal = document.querySelector(".imagemodal");
        var trigger = document.querySelector(".trigger");
        var closeButton = document.querySelector(".close-button");

        function toggleModal(img,disc,tags,date,id) {
            document.getElementById('modalimage').src = img;
            document.getElementById('date').textContent = date;
            document.getElementById('desc').textContent = disc;
            document.getElementById('tags').textContent = tags;
            // Get dominant color of the image
            getDominantColor(img, function(dominantColor) {
                console.log('Dominant Color:', dominantColor);

                // Apply the dominant color to the modal background or any other element
                document.getElementById('modal_image').style.backgroundColor = dominantColor;
            });
            document.getElementById('postid').value=id;
            modal.classList.toggle("show-modal");
        }


        function getDominantColor(imgUrl, callback) {
            var img = new Image();
            img.crossOrigin = "Anonymous"; // Enable cross-origin resource sharing (CORS) for the image
            img.src = imgUrl;

            img.onload = function() {
                var canvas = document.createElement("canvas");
                var context = canvas.getContext("2d");
                canvas.width = img.width;
                canvas.height = img.height;

                context.drawImage(img, 0, 0, img.width, img.height);

                var imageData = context.getImageData(0, 0, img.width, img.height);
                var data = imageData.data;

                // Count occurrences of each color
                var colorCounts = {};
                for (var i = 0; i < data.length; i += 4) {
                    var color = 'rgb(' + data[i] + ',' + data[i + 1] + ',' + data[i + 2] + ')';
                    colorCounts[color] = (colorCounts[color] || 0) + 1;
                }

                // Find the color with the maximum occurrences
                var dominantColor = Object.keys(colorCounts).reduce(function(a, b) {
                    return colorCounts[a] > colorCounts[b] ? a : b;
                });

                // Convert the dominantColor to hex format
                var rgbValues = dominantColor.match(/\d+/g);
                var hexColor = '#' + rgbValues.map(function(value) {
                    return ('0' + parseInt(value).toString(16)).slice(-2);
                }).join('');

                callback(hexColor);
            };
        }

        function windowOnClick(event) {
            if (event.target === modal) {
                toggleModal();
            }
        }

        // trigger.addEventListener("click", toggleModal);
        closeButton.addEventListener("click", toggleModal);
        window.addEventListener("click", windowOnClick);

    </script>                                                                                                                                                                                                                    
</body>
</html>