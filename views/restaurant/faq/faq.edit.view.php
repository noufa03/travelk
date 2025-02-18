

<?php require base_path('views/partials/restaurants/styles/menus/menus.php') ?>

<?php require base_path('views/partials/restaurants/sidebar.php') ?>

 <div class="main--content" >

 <?php require base_path('views/partials/restaurants/heading.php') ?>
 
 <p style="font-size: 18px; color: #555;">
 FAQS / Edit FAQ
</p>
        
        <div class="form--content">
     
        <form  method="POST" enctype="multipart/form-data">
       
      <div class="first--row">
      
                   
                                   <div class="form-group">
                                <label for="question">Question:</label><br>
                                 <textarea id="question" name="question" rows="4" cols="50"> <?= $faqs['question'] ?></textarea>
                                </div>
                             
                                
                                
                                <div class="form-group">
                                <label for="answer">Answer:</label><br>
                                <textarea id="answer" name="answer" rows="4" cols="50"><?= $faqs['answer'] ?></textarea>
                                </div>
                                
                                         
                                 
      </div>
       
      <div class="second--row">
        
                <button type="submit" class="btn btn-submit" 
          
          >
              Update FAQ
          </button>
          <button type="reset" class="btn btn-cancel">Discard Changes</button>

          
        
      
      </div>
     
       
    
     
        
    </form>
        
          </div>
       
           
       
    
    
</div>


</body>
</html>
<?php require base_path('views/partials/restaurants/filejs.php') ?>
<?php require base_path('views/partials/restaurants/js/menus_js.php') ?>

<?php require base_path('views/partials/footer.php') ?>
