<div class="sidebardiv">
    <div class="myprofile">
        <div class="profile">
            <div class="img">
                <img src="default_profile.png" alt="">
            </div>
            <div class="username">
                <div class="name">
                    johny Dept
                </div>
                <div class="profileuser">
                    @iamjohnydept
                </div>
            </div>
        </div>
    </div>
    <div class="navigations">
        <div class="navigation" onclick="loadmypage('home')">
            <div class="indicator">
            
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
            <div class="">
            
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
            <div class="">
            
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
            <div class="">
            
            </div>
            <div class="inditext">
                    <span class="material-symbols-outlined">
                    group                        
                    </span>
                        &nbsp;&nbsp;
                    Groups
            </div>
        </div>
        <div class="navigation" onclick="loadmypage('trending')">
            <div class="">
            
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
            <div class="">
            
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
        window.location.href=page
    }
</script>