<body>
    <nav id="sidebar">
         <ul>
         <li>
         <span class="logo"><img src='./restaurants/dashboard_photos/logo.png' height="24px" width="24px"/>traveLK</span>
         <button  onclick=toggleSidebar() id="toggle-btn">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M440-240 200-480l240-240 56 56-183 184 183 184-56 56Zm264 0L464-480l240-240 56 56-183 184 183 184-56 56Z"/></svg>
         </button>
         
         </li>
             <li class="active" >
                <a href="/">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M240-200h120v-240h240v240h120v-360L480-740 240-560v360Zm-80 80v-480l320-240 320 240v480H520v-240h-80v240H160Zm320-350Z"/></svg>
                <span>Home</span>
                </a>
    
             </li>
             <li  >
                  <a href="/dashboard_rest?id=<?= $userid ?>">
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
                        <li><a href="/menu/add?id=<?= $userid?>">Add Menus</a></li>
                        <li><a href="/categories?id=<?= $userid?>">Categories</a></li>
                        <li><a href="/mymenus?id=<?= $userid?>">Menu List</a></li>
                    
                     
                     
                     
                     </div>
                
                </ul>
                
                </li> 
            
             <li>
             <button onclick=toggleSubMenu(this) class="dropdown-btn" >
             <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M160-200v-80h80v-280q0-83 50-147.5T420-792v-28q0-25 17.5-42.5T480-880q25 0 42.5 17.5T540-820v28q80 20 130 84.5T720-560v280h80v80H160Zm320-300Zm0 420q-33 0-56.5-23.5T400-160h160q0 33-23.5 56.5T480-80ZM320-280h320v-280q0-66-47-113t-113-47q-66 0-113 47t-47 113v280Z"/></svg>
             <span>Notifications</span>
             <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M480-344 240-584l56-56 184 184 184-184 56 56-240 240Z"/></svg>
             </button>
             <ul class="sub-menu" >
             <div >
      
          
            <li>  <a href="/details_rest?id=<?= $userid?>">Add Details</a></li>
             <li><a href="#">other 2</a></li>
             
             
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
                        <li>    <a href="/myreviews_rest?id=<?= $userid ?>" >Reviews</a></li>
                     <li><a href="/reservations">Reservations</a></li>
                     
                     
                     
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
                        <li>       <a href="/tables/Add?id=<?= $userid ?>" >Add Table</a></li>
                     <li><a href="/tables?id=<?= $userid ?>">Table List</a></li>
                     
                     
                     
                     </div>
                
                </ul>
                
                </li> 
             
             <li>
             
             <li>
                <button  onclick=toggleSubMenu(this) class="dropdown-btn">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M300-520q-58 0-99-41t-41-99q0-58 41-99t99-41q58 0 99 41t41 99q0 58-41 99t-99 41Zm0-80q25 0 42.5-17.5T360-660q0-25-17.5-42.5T300-720q-25 0-42.5 17.5T240-660q0 25 17.5 42.5T300-600Zm360 440q-58 0-99-41t-41-99q0-58 41-99t99-41q58 0 99 41t41 99q0 58-41 99t-99 41Zm0-80q25 0 42.5-17.5T720-300q0-25-17.5-42.5T660-360q-25 0-42.5 17.5T600-300q0 25 17.5 42.5T660-240Zm-444 80-56-56 584-584 56 56-584 584Z"/></svg>
                <span>Offers</span>
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M480-344 240-584l56-56 184 184 184-184 56 56-240 240Z"/></svg>
                </button>
                <ul class="sub-menu">
                    <div>
                        <li>     <a href="/myoffers?id=<?= $userid ?>"  >Add Offer</a></li>
                     <li><a href="#">Offer List</a></li>
                     
                     
                     
                     </div>
                
                </ul>
                
                </li> 
           
        
             
             
            
            <li  >
                <a href="profile.html">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M480-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM160-160v-112q0-34 17.5-62.5T224-378q62-31 126-46.5T480-440q66 0 130 15.5T736-378q29 15 46.5 43.5T800-272v112H160Zm80-80h480v-32q0-11-5.5-20T700-306q-54-27-109-40.5T480-360q-56 0-111 13.5T260-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T560-640q0-33-23.5-56.5T480-720q-33 0-56.5 23.5T400-640q0 33 23.5 56.5T480-560Zm0-80Zm0 400Z"/></svg>
                <span>profile</span>
                 </a>
              </li>
              
               
            <li  >
            <form method="POST" action="/session">
            <a href="#">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h280v80H200v560h280v80H200Zm440-160-55-58 102-102H360v-80h327L585-622l55-58 200 200-200 200Z"/></svg>
                <span>
                <input type="hidden" name="_method" value="DELETE"/>
                <span><button> Log Out</button></span>
                </span>
                 </a>
              </li>
            </form>
            
             
              
         

                
    
    </ul>
    </nav>