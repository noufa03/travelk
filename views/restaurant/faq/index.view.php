<?php require base_path('views/partials/restaurants/styles/menus/menus.php') ?>
<?php require base_path('views/partials/restaurants/styles/table.php') ?>
<?php require base_path('views/partials/restaurants/sidebar.php') ?>


 <div class="main--content" >

<?php require base_path('views/partials/restaurants/heading.php') ?>

<p style="font-size: 18px; color: #555;">
   Customer / FAQS
</p>

<button  class="btn btn-submit" > <a href='/faq/add?id=<?= $userid ?>' >+ Add FAQ</a></button>


<div class="table--content">
<table>
        <thead>
            <tr>
                <th> ID</th>
                <th>Questions</th>
               <th>answer</th>
              
              
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($questions as $question): ?>
        <tr>
        <td># <?= $question['id'] ?></td>
      
         <td><?= $question['question'] ?></td>
         <td><?= isset($question['answer'])? $question['answer']:'no reply' ?></td>
         
       <td> <a href="/faq/edit?id=<?= $question['id'] ?>"> <button> Edit</button></a></td>
       <td><a href=""><button class="delete">Delete</button></a></td>
        
        </tr>
      
        
        
      
     
        <?php endforeach; ?>
        </tbody>
    </table>
    
  

</div>


   
 




            
 

       
</div>
<?php require base_path('views/partials/restaurants/filejs.php') ?>
<?php require base_path('views/partials/footer.php') ?>
