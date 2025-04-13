<?php require base_path("views/partials/rental/styles/sidecar.php"); ?>
<body>

      <nav id="sidebar" style="display: flex;flex-direction:column;justify-content:space-between" >
         <ul>
         <li>
                         <span class="logo"><img src="/assets/logo.png" height="24px" /></span>
         <button  onclick=toggleSidebar() id="toggle-btn">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M440-240 200-480l240-240 56 56-183 184 183 184-56 56Zm264 0L464-480l240-240 56 56-183 184 183 184-56 56Z"/></svg>
         </button>
         
         </li>
             <li  >
                <a href="/">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M240-200h120v-240h240v240h120v-360L480-740 240-560v360Zm-80 80v-480l320-240 320 240v480H520v-240h-80v240H160Zm320-350Z"/></svg>
                <span>Home</span>
                </a>
    
             </li>
             <li  >
                  <a href="/dashboard_rental?id=<?= $userid ?>"   class="<?= urlIs('/dashboard_rental') ? 'active' : ''; ?>">
<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M240-200v40q0 17-11.5 28.5T200-120h-40q-17 0-28.5-11.5T120-160v-320l84-240q6-18 21.5-29t34.5-11h100v-80h240v80h100q19 0 34.5 11t21.5 29l84 240v320q0 17-11.5 28.5T800-120h-40q-17 0-28.5-11.5T720-160v-40H240Zm-8-360h496l-42-120H274l-42 120Zm-32 80v200-200Zm100 160q25 0 42.5-17.5T360-380q0-25-17.5-42.5T300-440q-25 0-42.5 17.5T240-380q0 25 17.5 42.5T300-320Zm360 0q25 0 42.5-17.5T720-380q0-25-17.5-42.5T660-440q-25 0-42.5 17.5T600-380q0 25 17.5 42.5T660-320Zm-460 40h560v-200H200v200Z"/></svg>
                    <span>Dashboard</span>
                  </a>
              
        
             </li>
           
            
             
             <li>
            <a href="/bookings?id=<?= $userid ?>"     class="<?= urlIs('/bookings') ? 'active' : ''; ?>">
<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M360-320q-17 0-28.5-11.5T320-360v-80q17 0 28.5-11.5T360-480q0-17-11.5-28.5T320-520v-80q0-17 11.5-28.5T360-640h240q17 0 28.5 11.5T640-600v80q-17 0-28.5 11.5T600-480q0 17 11.5 28.5T640-440v80q0 17-11.5 28.5T600-320H360Zm120-60q8 0 14-6t6-14q0-8-6-14t-14-6q-8 0-14 6t-6 14q0 8 6 14t14 6Zm0-80q8 0 14-6t6-14q0-8-6-14t-14-6q-8 0-14 6t-6 14q0 8 6 14t14 6Zm0-80q8 0 14-6t6-14q0-8-6-14t-14-6q-8 0-14 6t-6 14q0 8 6 14t14 6ZM280-40q-33 0-56.5-23.5T200-120v-720q0-33 23.5-56.5T280-920h400q33 0 56.5 23.5T760-840v720q0 33-23.5 56.5T680-40H280Zm0-120v40h400v-40H280Zm0-80h400v-480H280v480Zm0-560h400v-40H280v40Zm0 0v-40 40Zm0 640v40-40Z"/></svg>
                <span>Bookings</span>

            </a>
                
                </li> 
            
          
             <li>
                 <a href="/myreviews_car?id=<?= $userid ?>"     class="<?= urlIs('/myreviews_car') ? 'active' : ''; ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M222-200 80-342l56-56 85 85 170-170 56 57-225 226Zm0-320L80-662l56-56 85 85 170-170 56 57-225 226Zm298 240v-80h360v80H520Zm0-320v-80h360v80H520Z"/></svg>
                <span>Reviews</span>

                 </a>
               
                
                </li> 
                
                
                   
                      <li>
                <button  onclick=toggleSubMenu(this) class="dropdown-btn">
<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="m370-80-16-128q-13-5-24.5-12T307-235l-119 50L78-375l103-78q-1-7-1-13.5v-27q0-6.5 1-13.5L78-585l110-190 119 50q11-8 23-15t24-12l16-128h220l16 128q13 5 24.5 12t22.5 15l119-50 110 190-103 78q1 7 1 13.5v27q0 6.5-2 13.5l103 78-110 190-118-50q-11 8-23 15t-24 12L590-80H370Zm70-80h79l14-106q31-8 57.5-23.5T639-327l99 41 39-68-86-65q5-14 7-29.5t2-31.5q0-16-2-31.5t-7-29.5l86-65-39-68-99 42q-22-23-48.5-38.5T533-694l-13-106h-79l-14 106q-31 8-57.5 23.5T321-633l-99-41-39 68 86 64q-5 15-7 30t-2 32q0 16 2 31t7 30l-86 65 39 68 99-42q22 23 48.5 38.5T427-266l13 106Zm42-180q58 0 99-41t41-99q0-58-41-99t-99-41q-59 0-99.5 41T342-480q0 58 40.5 99t99.5 41Zm-2-140Z"/></svg>
                <span>General</span>
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M480-344 240-584l56-56 184 184 184-184 56 56-240 240Z"/></svg>
                </button>
                <ul class="sub-menu">
                    <div>
                        <li> 
                        
                        <a href="/issues/rental?id=<?= $userid ?>"   class="<?= urlIs('/settings') ? 'active' : ''; ?>">  
                        
                        Report Issues</a>
                        
                        
                        
                        </li>
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
                <div class="cpyrights" style="color: black;">
                    <p style=" white-space: pre-line;margin-bottom:1rem;font-size:smaller">© 2024 traveLK. All rights reserved. </p>
                </div>
            </li>
        </ul>
    
    
    </nav>
    
     <form id="logout-form" action="/session" method="POST" style="display: none;">
        <input type="hidden" name="_method" value="DELETE"/>
    </form>
   