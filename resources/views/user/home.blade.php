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
                <div class="feedDiv newFeedDiv" id="newFeedDiv" style="display:none">
                    <div class="statuscontainer">
                        <div class="post_something">
                            Post Something
                        </div>
                        <div class="newpost" style="margin-top:10px">
                            <div class="wrap">
                                <div class="comment">
                                   {{-- <input type="text" class="commentTerm" placeholder="Write here"> --}}
                                   <textarea onclick="toggletonewpost()" name="" class="commentTerm" id="" cols="30" rows="5" placeholder="Write your post"></textarea>
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
    </script>
                                                                                                                                                                                                                      
</body>
</html>