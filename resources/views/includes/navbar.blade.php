<div class="navbox">
    <div class="row">
        <div class="col s2 logo">
            designio
        </div>
        <div class="col s8 search">
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
        </div>
        <div class="col s2 logout">
           <div style="cursor: pointer;" onclick="location.href='logout'">
             Logout
           </div>
        </div>
    </div>
</div>

<form action="" >
    <input type="hidden" id="tok" value="{{session('authentication')}}">
    {{-- <input type="hidden" id="tok" value="{{session('authentication')}}"> --}}
</form>