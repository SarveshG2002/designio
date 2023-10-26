<!DOCTYPE html>
<html lang="en">
    @include('includes.layout-header')
    <link rel="stylesheet" href="{{ asset('css/chat.css') }}">
<body>
    <div class="main_container">
        @include('includes.navbar')
        <div class="container">
            <div class="sidebar">
                @include('includes.sidebar',['page'=>'friends'])
                {{-- hello --}}
            </div>
            <div class="middle">
                {{-- Chatting with {{$fid}} --}}
                <div class="left_middle">
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
                            <div class="friendList" style="height: 80vh;overflow-x:auto">
                                <div class="headFriend">
                                    <h1>My Friends</h1>
                                </div>
                                @php
                                    $iid=0;
                                @endphp
                                @foreach ($following as $key => $friend)
                                    <div class="flistdiv" onclick="window.location.href='{{url('/')}}/chat/{{$friend->id}}'">
                                        <div class="profileimg">
                                            <div class="img">
                                                @php
                                                $profileImg =  $friend->profile;
                                                @endphp
                                
                                                @if($profileImg !== null)
                                                    <img src="{{ asset('storage/' . $profileImg) }}" alt="Profile Image">
                                                @else
                                                    <img src="{{ asset('default_profile.png') }}" alt="Default Profile Image">
                                                @endif
                                                {{-- <img src="default_profile.png" alt=""> --}}
                                            </div>
                                        </div>
                                        <div class="fname">
                                            <p class="name">
                                                {{ $friend->name }} {{-- Assuming 'name' is the property you want to display --}}
                                            </p>
                                            <div class="msg" style="font-size:15px">
                                                {{ $friend->bio }}
                                            </div>
                                        </div>
                                        <div class="status" style="padding-left:10px">
                                            <div class="date">
                                                <p style="margin-top: 10px">23-03-2022</p> {{-- Assuming 'date' is the property you want to display --}}
                                            </div>
                                            
                                        </div>
                                        
                                    </div>
                                @endforeach
                            
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="right_middle">
                    <div class="feedDiv" style="width:98%">
                        <div class="statuscontainer">
                            <div class="wrap">
                                <div class="" style="border-width:0px 0px 0.5px 0px; border-style:ridge; border-color:rgb(209, 209, 209)">
                                {{-- <input type="text" class="searchTerm" placeholder="Search">
                                <button type="submit" class="searchButton">
                                        <span class="material-symbols-outlined">
                                            search
                                        </span>
                                </button> --}}
                                <div class="friendName">
                                    Sarvesh Gandhere
                                </div>
                                </div>
                            </div>
                            <div class="messages">
                                <div class="text-messages" id="message-container">
                                    <div class="message my-text">This is a left-aligned message.</div>
                                    <div class="message friend-text">This is a right-aligned message.</div>
                                    <div class="message my-text">Another left-aligned message.Another left-aligned message</div>
                                    <div class="message my-text">Another righ right-alignet-aligned message.</div>
                                    <div class="message my-text">This is a left-aligned message. Another message</div>
                                    <div class="message friend-text">This is a right-aligned message.</div>
                                    <div class="message my-text">Another left-aligned message.</div>
                                    <div class="message my-text">Another right-aligned mesAnother left-aligned messageAnother left-aligned messagesage.</div>
                                    <div class="message friend-text">This is a right-aligned message.</div>
                                    <div class="message friend-text">This is aAnother left-aligned message right-aligned message.</div>
                                    <div class="message friend-text">This is a rir left-alignght-aligned message.</div>
                                    <div class="message friend-text">This is a right-aligned message.</div>
                                     <div class="message my-text">Another right-aligned message.</div>
                                    <div class="message my-text">This is a left-aligned message.</div>
                                    <div class="message friend-text">This is a right-aligned message.</div>
                                    <div class="message my-text">Another left-a right-alignelignr left-aligned message.</div>
                                    <div class="message my-text">This is a left-aligned message.</div>
                                    <div class="message friend-text">This is a right-aligned message.</div>
                                    <div class="message my-text">Another left-aligned message.</div>
                                    <div class="message my-text">Another right-ali right-aligne right-alignegned message.</div>
                                    <div class="message friend-text">This is a right-aligned message.</div>
                                    <div class="message friend-text">This is a right-aligned message.</div>
                                    <div class="message friend-text">This is a right-aligned message.</div>
                                    <div class="message my-text">Another right-aligned message.</div>
                                </div>
                                <div class="wrap msg-input">
                                    <div class="search">
                                        <input type="text" class="searchTerm" id="my-input-msg" placeholder="Search" style="width:90%">
                                        <button type="submit" class="searchButton" id="send_my_mesg">
                                                <span class="material-symbols-outlined">
                                                    send
                                                </span>
                                        </button>
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
    <script>
        // JavaScript to automatically scroll to the newest message
        const messageContainer = document.getElementById("message-container");
        function scrollToBottom() {
            messageContainer.scrollTop = messageContainer.scrollHeight;
        }

        // Example: Add a new message and then scroll to it
        // const newMessage = document.createElement("div");
        // newMessage.textContent = "This is a new message.";
        // newMessage.className = "message left";
        // messageContainer.appendChild(newMessage);
        scrollToBottom();

        document.getElementById("my-input-msg").addEventListener("keyup", (event) => {
            if (event.key === "Enter") {
                sendMessage();
            }
        });

        document.getElementById('send_my_mesg').addEventListener('click', () => {
            sendMessage();
        });

        function sendMessage() {
            let myMsg = document.getElementById("my-input-msg").value;

            if (myMsg) {
                const newMessage = document.createElement("div");
                newMessage.textContent = myMsg;
                newMessage.className = "message my-text";
                messageContainer.appendChild(newMessage);
                scrollToBottom(); // Scroll to the newest message

                // Clear the input field after sending
                document.getElementById("my-input-msg").value = "";
            }
        }
    </script>                                                                                                                                                                                                                 
</body>
</html>