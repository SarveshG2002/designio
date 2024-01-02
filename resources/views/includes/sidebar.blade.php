@php
    $sidebar=[
        'Feed'=>[
            'link'=>'home',
            'page'=>'feed',
            'icon'=>'dashboard'
        ],
        'Explore'=>[
            'link'=>'explore',
            'page'=>'explore',
            'icon'=>'travel_explore'
        ],
        'Friends'=>[
            'link'=>'friends',
            'page'=>'friends',
            'icon'=>'diversity_3'
        ],
        'Messages'=>[
            'link'=>'group',
            'page'=>'group',
            'icon'=>'group'
        ],
        'Trending'=>[
            'link'=>'trending',
            'page'=>'trending',
            'icon'=>'chart_data'
        ],
        'Setting'=>[
            'link'=>'setting',
            'page'=>'setting',
            'icon'=>'settings'
        ],
        'My Posts'=>[
            'link'=>'myPosts',
            'page'=>'myPosts',
            'icon'=>'post'
        ],
        'Explore'=>[
            'link'=>'explore',
            'page'=>'explore',
            'icon'=>'travel_explore'
        ],
    ];
@endphp
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
        @foreach ($sidebar as $pagee=>$pagedata)
            <div class="navigation" onclick="loadmypage('<?=$pagedata['link']?>')">
                <div class="{{ ($page==$pagedata['page'])?'indicator':'' }}">
                
                </div>
                <div class="inditext">
                        <span class="material-symbols-outlined">
                            {{$pagedata['icon']}}
                            </span>
                            &nbsp;&nbsp;
                        {{$pagee}}
                </div>
            </div>
        @endforeach


    </div>
</div>

<script>
    function loadmypage(page){
        window.location.href="{{url('/')}}/"+page
    }
</script>