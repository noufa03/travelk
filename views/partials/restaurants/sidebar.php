<?php require base_path('views/partials/restaurants/styles/siderbarstyles.php') ?>
<body>
    <nav id="sidebar" style="display: flex;flex-direction:column;justify-content:space-between" >
        <ul>
            <li>
                <span class="logo"><img src="assets/logo.png" height="24px" /></span>
                <button  onclick=toggleSidebar() id="toggle-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M440-240 200-480l240-240 56 56-183 184 183 184-56 56Zm264 0L464-480l240-240 56 56-183 184 183 184-56 56Z"/></svg>
                </button>
            </li>
            <li>
                <a href="/"   class="<?= urlIs('/') ? 'active' : ''; ?>">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M240-200h120v-240h240v240h120v-360L480-740 240-560v360Zm-80 80v-480l320-240 320 240v480H520v-240h-80v240H160Zm320-350Z"/></svg>
                <span>Home</span>
                </a>
            </li>
            <li>
                <a href="/dashboard_rest?id=<?= htmlspecialchars($userid) ?>" 
                    class="<?= urlIs('/dashboard_rest') ? 'active' : ''; ?>">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M600-160v-280h280v280H600ZM440-520v-280h440v280H440ZM80-160v-280h440v280H80Zm0-360v-280h280v280H80Zm440-80h280v-120H520v120ZM160-240h280v-120H160v120Zm520 0h120v-120H680v120ZM160-600h120v-120H160v120Zm360 0Zm-80 240Zm240 0ZM280-600Z"/></svg>
                <span>Dashboard</span>
                </a>
            </li>
            <li>
                <button  onclick=toggleSubMenu(this) class="dropdown-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M560-564v-68q33-14 67.5-21t72.5-7q26 0 51 4t49 10v64q-24-9-48.5-13.5T700-600q-38 0-73 9.5T560-564Zm0 220v-68q33-14 67.5-21t72.5-7q26 0 51 4t49 10v64q-24-9-48.5-13.5T700-380q-38 0-73 9t-67 27Zm0-110v-68q33-14 67.5-21t72.5-7q26 0 51 4t49 10v64q-24-9-48.5-13.5T700-490q-38 0-73 9.5T560-454ZM260-320q47 0 91.5 10.5T440-278v-394q-41-24-87-36t-93-12q-36 0-71.5 7T120-692v396q35-12 69.5-18t70.5-6Zm260 42q44-21 88.5-31.5T700-320q36 0 70.5 6t69.5 18v-396q-33-14-68.5-21t-71.5-7q-47 0-93 12t-87 36v394Zm-40 118q-48-38-104-59t-116-21q-42 0-82.5 11T100-198q-21 11-40.5-1T40-234v-482q0-11 5.5-21T62-752q46-24 96-36t102-12q58 0 113.5 15T480-740q51-30 106.5-45T700-800q52 0 102 12t96 36q11 5 16.5 15t5.5 21v482q0 23-19.5 35t-40.5 1q-37-20-77.5-31T700-240q-60 0-116 21t-104 59ZM280-494Z"/></svg> 
                    <span>Menus</span>
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M480-344 240-584l56-56 184 184 184-184 56 56-240 240Z"/></svg>
                </button>
                <ul class="sub-menu">
                    <div>
                        <li><a href="/menu/add?id=<?= $userid?>" class="<?= urlIs('/menu/add') ? 'active' : ''; ?>">Add Menus</a></li>
                        <li><a href="/mymenus?id=<?= $userid?>" class="<?= urlIs('/mymenus') ? 'active' : ''; ?>">Menu List</a></li>
                        <li><a href="/categories?id=<?= $userid?>" class="<?= urlIs('/categories') ? 'active' : ''; ?>">Categories</a></li>
                    </div>
                </ul> 
            </li> 
            <li>
                <button  onclick=toggleSubMenu(this) class="dropdown-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M222-200 80-342l56-56 85 85 170-170 56 57-225 226Zm0-320L80-662l56-56 85 85 170-170 56 57-225 226Zm298 240v-80h360v80H520Zm0-320v-80h360v80H520Z"/></svg>
                    <span>Customer</span>
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M480-344 240-584l56-56 184 184 184-184 56 56-240 240Z"/></svg>
                </button>
                <ul class="sub-menu">
                    <div>
                        <li><a href="/myreviews_rest?id=<?= $userid ?>" class="<?= urlIs('/myreviews_rest') ? 'active' : ''; ?>" >Reviews</a></li>
                        <li><a href="/reservations" class="<?= urlIs('/reservations') ? 'active' : ''; ?>">Reservations</a></li>
                        <li><a href="/FAQs_rest" class="<?= urlIs('/FAQs') ? 'active' : ''; ?>">FAQS</a></li>
                    </div>
                </ul>
            </li> 
            <li>
                <button  onclick=toggleSubMenu(this) class="dropdown-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="m240-160 60-150q9-23 29-36.5t45-13.5h66v-161q-153-5-256.5-45T80-660q0-58 117-99t283-41q167 0 283.5 41T880-660q0 54-103.5 94T520-521v161h66q24 0 44.5 13.5T660-310l60 150h-80l-48-120H368l-48 120h-80Zm240-440q97 0 183-17t126-43q-40-26-126-43t-183-17q-97 0-183 17t-126 43q40 26 126 43t183 17Zm0-60Z"/></svg>
                    <span>Tables</span>
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M480-344 240-584l56-56 184 184 184-184 56 56-240 240Z"/></svg>
                </button>
                <ul class="sub-menu">
                    <div>
                        <li><a href="/tables/Add?id=<?= $userid ?>" class="<?= urlIs('/tables/Add') ? 'active' : ''; ?>">Add Table</a></li>
                        <li><a href="/tables?id=<?= $userid ?>" class="<?= urlIs('/tables') ? 'active' : ''; ?>">Table List</a></li>
                    </div>
                </ul>
            </li>  
            <li>
                <button  onclick=toggleSubMenu(this) class="dropdown-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M300-520q-58 0-99-41t-41-99q0-58 41-99t99-41q58 0 99 41t41 99q0 58-41 99t-99 41Zm0-80q25 0 42.5-17.5T360-660q0-25-17.5-42.5T300-720q-25 0-42.5 17.5T240-660q0 25 17.5 42.5T300-600Zm360 440q-58 0-99-41t-41-99q0-58 41-99t99-41q58 0 99 41t41 99q0 58-41 99t-99 41Zm0-80q25 0 42.5-17.5T720-300q0-25-17.5-42.5T660-360q-25 0-42.5 17.5T600-300q0 25 17.5 42.5T660-240Zm-444 80-56-56 584-584 56 56-584 584Z"/></svg>
                    <span>Offers</span>
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M480-344 240-584l56-56 184 184 184-184 56 56-240 240Z"/></svg>
                </button>
                <ul class="sub-menu">
                    <div>
                        <li><a href="/myoffers/add?id=<?= $userid ?>"    class="<?= urlIs('/myoffers/add') ? 'active' : ''; ?>"> Add Offer</a></li>
                        <li><a href="/myoffers?id=<?=$userid ?>"     class="<?= urlIs('/myoffers') ? 'active' : ''; ?>">Offer List</a></li>
                    </div>
                </ul>
            </li> 
            <li>
                <button  onclick=toggleSubMenu(this) class="dropdown-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="m370-80-16-128q-13-5-24.5-12T307-235l-119 50L78-375l103-78q-1-7-1-13.5v-27q0-6.5 1-13.5L78-585l110-190 119 50q11-8 23-15t24-12l16-128h220l16 128q13 5 24.5 12t22.5 15l119-50 110 190-103 78q1 7 1 13.5v27q0 6.5-2 13.5l103 78-110 190-118-50q-11 8-23 15t-24 12L590-80H370Zm70-80h79l14-106q31-8 57.5-23.5T639-327l99 41 39-68-86-65q5-14 7-29.5t2-31.5q0-16-2-31.5t-7-29.5l86-65-39-68-99 42q-22-23-48.5-38.5T533-694l-13-106h-79l-14 106q-31 8-57.5 23.5T321-633l-99-41-39 68 86 64q-5 15-7 30t-2 32q0 16 2 31t7 30l-86 65 39 68 99-42q22 23 48.5 38.5T427-266l13 106Zm42-180q58 0 99-41t41-99q0-58-41-99t-99-41q-59 0-99.5 41T342-480q0 58 40.5 99t99.5 41Zm-2-140Z"/></svg>
                    <span>General</span>
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M480-344 240-584l56-56 184 184 184-184 56 56-240 240Z"/></svg>
                </button>
                <ul class="sub-menu">
                    <div>
                        <li><a href="/settings/restaurant?id=<?= $userid ?>"   class="<?= urlIs('/settings') ? 'active' : ''; ?>"> Settings</a></li>
                        <li>
                        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <span class="links_name">Logout</span>
                        </a>
                        </li> 
                    </div>
                </ul>   
            </li> 
        </ul>
        <ul>
            <li>
                <div class="cpyrights">
                    <p style=" white-space: pre-line;margin-bottom:1rem;font-size:smaller">© 2024 traveLK. All rights reserved. </p>
                </div>
            </li>
        </ul>
    </nav>
    <form id="logout-form" action="/session" method="POST" style="display: none;">
        <input type="hidden" name="_method" value="DELETE"/>
    </form>
</body>
    
   