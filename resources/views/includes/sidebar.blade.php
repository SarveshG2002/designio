<div class="sidebardiv">
    <div class="myprofile">
        <div class="profile">
            <div class="img">
                @php
                    $profileImg = session('profileimg');
                @endphp

                @if($profileImg !== null)
                    <img src="{{ asset('storage/' . $profileImg) }}" alt="Profile Image">
                @else
                    <img src="{{ asset('default_profile.png') }}" alt="Default Profile Image">
                @endif
            </div>
            <div class="username">
                <div class="name">
                    {{ session('name') }}
                </div>
                <div class="profileuser">
                    {{ "@".session('username') }}
                </div>
            </div>
        </div>
    </div>
    <div class="navigations">
        <div class="navigation" onclick="loadmypage('home')">
            <div class="{{ ($page=="feed")?'indicator':'' }}">
            
            </div>
            <div class="inditext">
                    <span class="material-symbols-outlined">
                        dashboard
                        </span>
                        &nbsp;&nbsp;
                    Feed
            </div>
        </div>
        <div class="navigation" onclick="loadmypage('explore')">
            <div class="{{ ($page=="explore")?'indicator':'' }}">
            
            </div>
            <div class="inditext">
                <span class="material-symbols-outlined">
                    travel_explore
                    </span>
                        &nbsp;&nbsp;
                    Explore
            </div>
        </div>
        <div class="navigation" onclick="loadmypage('friends')">
            <div class="{{ ($page=="friends")?'indicator':'' }}">
            
            </div>
            <div class="inditext">
                <span class="material-symbols-outlined">
                    diversity_3
                    </span>
                        &nbsp;&nbsp;
                    Friends
            </div>
        </div>
        <div class="navigation" onclick="loadmypage('group')">
            <div class="{{ ($page=="group")?'indicator':'' }}">
            
            </div>
            <div class="inditext">
                    <span class="material-symbols-outlined">
                    group                        
                    </span>
                        &nbsp;&nbsp;
                    Messages
            </div>
        </div>
        <div class="navigation" onclick="loadmypage('trending')">
            <div class="{{ ($page=="trending")?'indicator':'' }}">
            
            </div>
            <div class="inditext">
                <span class="material-symbols-outlined">
                    chart_data
                    </span>
                        &nbsp;&nbsp;
                    Trending
            </div>
        </div>
        <div class="navigation" onclick="loadmypage('setting')">
            <div class="{{ ($page=="setting")?'indicator':'' }}">
            
            </div>
            <div class="inditext">
                    <span class="material-symbols-outlined">
                        settings
                        </span>
                        &nbsp;&nbsp;
                    Setting
            </div>
        </div>
    </div>
</div>

<script>
    function loadmypage(page){
        window.location.href="{{url('/')}}/"+page
    }
</script>