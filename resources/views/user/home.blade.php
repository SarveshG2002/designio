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
                <div class="feedDiv" id="allFeedDiv">
                    <div style="width:100%;display:grid;grid-template-columns: 55% 1% 44%;">
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
                        <div>

                        </div>
                        <div class="statuscontainer">
                            <div class="post_something">
                                Post Something
                            </div>
                            <div class="newpost" style="margin-top:10px">
                                <div class="wrap">
                                    <div class="comment">
                                       {{-- <input type="text" class="commentTerm" placeholder="Write here"> --}}
                                       <textarea onclick="toggletonewpost()" name="" class="commentTerm" id="" cols="30" rows="1" placeholder="Write your post"></textarea>
                                       <button type="submit" class="commentButton">
                                        <i class="fa-regular fa-images"></i>
                                      </button>
                                    </div>
                                 </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="feedcontainer">
                        <?php
                            $feeds=[1,2,3,4];
                            foreach($feeds as $feed){
                                ?>
                                <div class="feed">
                                    <div class="userinfo">
                                        <div class="userprofile">
                                            <img src="default_profile.png" alt="">
                                        </div>
                                        <div class="username">
                                            <div>
                                                sarwya_not_available
                                                <div class="time" style="font-size: 10px;">
                                                    2 days ago
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="discription">
                                        {{-- <br> --}}
                                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facere accusamus enim excepturi. Dolores, itaque eum corporis modi veniam repellendus sapiente distinctio incidunt quod perspiciatis amet vero, repellat hic magnam! Enim?
                                    </div>
                                    <div class="artwork">
                                        <img src="test-feed{{$feed}}.jpg" alt="">
                                        <br>
                                        <br>
                                        <hr>
                                        <br>
                                        
                                    </div>
                                    <div class="reach">
                                        <div class="commentcount">
                                            <i class="fa-regular fa-comment"></i>
                                                25 Comments
                                        </div>
                                        <div class="likes">
                                            <div class="likeDiv" style="display:inline-block">
                                                <i></i>
                                                Like
                                              </div>
                                        </div>
                                        <div class="save" style="text-align:right;margin-right:50px">
                                            <i class="fa-regular fa-bookmark"></i> Save
                                        </div>
                                    </div>
                                    <div class="comments">
                                        <br>
                                        <hr>
                                        <br>
                                        <div class="wrap">
                                            <div class="comment">
                                               <input type="text" class="commentTerm" placeholder="Comment">
                                               <button type="submit" class="commentButton">
                                                <span class="material-symbols-outlined">
                                                    search
                                                    </span>
                                              </button>
                                            </div>
                                         </div>
                                         <br>
                                    </div>
                                </div>
                                <?php
                            }    
                        ?>
                    </div>
                </div>
                <form action="post/addpost" method="POST" id="addnepostform" enctype="multipart/form-data">
                    @csrf
               
                <div class="feedDiv newFeedDiv" id="newFeedDiv" style="display:none">
                    <div class="statuscontainer">
                        <div class="post_something">
                            Post Something
                        </div>
                        <div class="newpost" style="margin-top:10px">
                            <div class="wrap">
                                <div class="comment">
                                   {{-- <input type="text" class="commentTerm" placeholder="Write here"> --}}
                                   <textarea oninput="document.getElementById('discriptionpreview').innerHTML=this.value" name="discription" class="commentTerm" id="postdesc" cols="30" rows="5" placeholder="Write your post"></textarea>
                                </div>
                             </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="statuscontainer newfeedcreator">
                       <div class="imagecontent">
                            <div class="inputFile">
                                <div class="button" style="cursor:pointer" onclick="document.getElementById('imageInput').click()">Upload Image</div>
                                <div class="imagename" id="imagename">
                                    
                                </div>
                                <input type="file" id="imageInput" accept="image/*" name="postImage" style="display:none">
                                <br>
                                <br>
                                <img id="imagePreview" src="test-feed2.jpg" alt="Image Preview" style="width: 100%;">
                                <br><br>
                                <div id="chips-container">
                                    <input type="text" id="text-input" class="chip-input" placeholder="Enter text and press Enter">
                                    <i class="fa-regular fa-circle-question" title="You can place hashtag by typing here.
To add multiple hashtags press enter after a tag.
To remove a tag click on that tag"></i>
                                </div>
                                <br>
                            <div class="button" onclick="submitForm()">
                                Post
                            </div>
                            </div>
                            <div class="preview">
                                <h2>Post Preview</h2>
                                <div class="feedcontainer" style="margin-top: 5px">
                                    <div class="feed" style="padding-top:5px">
                                        <div class="userinfo">
                                            <div class="userprofile">
                                                <img src="default_profile.png" alt="">
                                            </div>
                                            <div class="username">
                                                <div>
                                                    sarwya_not_available
                                                    <div class="time" style="font-size: 10px;">
                                                        2 days ago
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="discription" id="discriptionpreview" style="white-space: pre-wrap;">
                                        </div>
                                        <div class="artwork">
                                            <img src="test-feed2.jpg" id="imagePreview1"  alt="">
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                       </div>
                    </div>
                </div>
            </form>
            </div>
            <div class="rightbar">
                right bar
            </div>
        </div>     
    </div>    
    <script>
        $(function() {
            $( ".likeDiv" ).click(function() {
                $( "i,span" ).toggleClass( "press", 1000 );
            });
        });
        function toggletonewpost(){
            document.getElementById("allFeedDiv").style.display="none"
            document.getElementById("newFeedDiv").style.display="block"
        }

        const imageInput = document.getElementById('imageInput');
        const imagePreview = document.getElementById('imagePreview');
        const imagePreview1 = document.getElementById('imagePreview1');

        imageInput.addEventListener('change', function () {
            const file = this.files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    imagePreview.src = e.target.result;
                    imagePreview1.src = e.target.result;
                    imagePreview.style.display = 'block';
                    imagePreview1.style.display = 'block';
                    document.getElementById('imagename').innerText=file.name
                };

                reader.readAsDataURL(file);
            } else {
                imagePreview.src = '';
                imagePreview.style.display = 'none';
            }
        });


        const chipsContainer = document.getElementById('chips-container');
        const textInput = document.getElementById('text-input');
        const postdesc = document.getElementById('postdesc');

        textInput.addEventListener('keydown', function(event) {
            
            if (event.key === 'Enter' && textInput.value.trim() !== '') {
                event.preventDefault();
                createChip(textInput.value.trim());
                textInput.value = '';
            }
        });

        postdesc.addEventListener('keydown', function(event) {
            
            if (event.key === 'Enter' && textInput.value.trim() !== '') {
                event.preventDefault();
            }
        });

        function createChip(text) {
            const chip = document.createElement('div');
            chip.classList.add('chip');
            chip.textContent = "#"+text;
            chipsContainer.appendChild(chip);

            chip.addEventListener('click', function() {
                chip.remove();
            });
        }

        function submitForm() {
            // Collect chip values
            const chips = Array.from(chipsContainer.querySelectorAll('.chip'))
                .map(chip => chip.textContent.replace('#', '')); // Remove '#' prefix

            // Add chips as hidden input fields to the form
            const form = document.querySelector('form');
            chips.forEach(chip => {
                const hiddenInput = document.createElement('input');
                hiddenInput.type = 'hidden';
                hiddenInput.name = 'chips[]'; // Use an array for multiple values
                hiddenInput.value = chip;
                form.appendChild(hiddenInput);
            });

            // Submit the form
            form.submit();
        }
    </script>

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if (session('error'))
<div class="alert alert-success">
    {{ session('error') }}
</div>
@endif
                                                                                                                                                                                                                      
</body>
</html>