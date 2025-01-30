     <div class="header--wrapper">
         
            <div >
               <button  onclick=toggleSidebar() id="toggle-btn">
                       
                       <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="green"><path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/></svg>
                          </button>
            </div>
                      
          
            
        <div class="info">
          <div class="header--title">
          
                <span>Hello, <?= $_SESSION["user"]["email"] ?></span>
                 </div>
                  <?php
                  if (isset($logo)) {
                      echo "<img src='/restaurants/folder$userid/logo/$logo' alt=''>";
                  } else {
                      echo "<img src='/restaurants/default_logo/default_logo.png' alt=''>";
                  }
                  ?>


        
        </div>
              
            
            
        </div>