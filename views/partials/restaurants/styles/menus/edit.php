<?php require base_path('views/partials/restaurants/styles.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');
    @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');


:root {
    --base-clr:#f0f2f0;
    --line-clr: #76c07d ;
    --hover-clr: white;
    --text-clr:black;
    --accent-clr: #76c07d;
    --secondary-text-clr: #1A1A19;
  }
*{
margin: 0;
padding: 0;

}  

html{
font-family:Poppins 1.5rem;


}

body{

min-height: 100vh;
min-height: 100dvh;
background-color: var(--base-clr);
color: var(--text-clr);
display: grid;
grid-template-columns: auto 1fr;
}










/* add menu  add table*/


.form--content {
    width: 100%;
    max-width: 800px;
    margin: 0 auto;
    padding: 60px;
    border: 1px solid #ccc;
    border-radius: 10px;
   
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);

}

.form--content .first--grp .form-group{
 display: flex;
flex-direction: column;
width: 100%;
max-width:400px;

}

.form--content .second--grp {

 display: flex;
flex-direction: column;
gap: 1rem;

}
.form--content .first--grp {

 display: flex;
flex-direction: column;
gap: 1rem;
width: 400px;

}

.first--row {
    display: flex;
    flex-direction: row;
    gap: 3rem;
}
.second--row{

display: flex;
flex-direction: row;
gap: 2rem;
  justify-content: center; /* Aligns items horizontally to the center */
  align-items: center; 
}

.form--content label {
    margin-bottom: 8px;
 
    color:var(--secondary-text-clr);
}

.form--content input,
.form--content textarea{
    margin-bottom: 16px;
    padding: 20px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 5px;
    width: 100%;
    box-sizing: border-box;
}

.form--content input:focus,
.form--content textarea:focus {
    border-color: #007BFF;
    outline: none;
    box-shadow: 0 0 4px rgba(0, 123, 255, 0.5);
}





.form--content textarea {
    resize: vertical;
}

.form-group {
  margin-bottom: 15px;
}

.form-group label {
  display: block;
  font-weight: bold;
  margin-bottom: 5px;
  color: #555;
}

.form-group input,
.form-group textarea {
  width: 100%;
 
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
  font-size: 14px;
}

.upload-box {
  border: 2px dashed #ccc;
  border-radius: 4px;
  padding: 20px;
  text-align: center;
  font-size: 14px;
  color: #888;
  cursor: pointer;
}

.upload-box span a {
  color: orange;
  text-decoration: none;
}

.upload-box span a:hover {
  text-decoration: underline;
}


.btn {
  padding: 10px 50px;
  font-size: 14px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

.btn-submit {
  background-color: orange;
  color: white;
}

.btn-submit:hover {
  background-color: #e69500;
}

.btn-cancel {
  background-color: white;
  color: orange;
  border: 1px solid orange;
}

.btn-cancel:hover {
  background-color: #f8f8f8;
}



.checkbox-group {
            display: flex;
            align-items: center;
            gap: 5rem; /* Adds spacing between text and checkbox */
        }
        
        label {
            font-size: 16px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        input[type="checkbox"] {
            width: 20px;
            height: 20px;
            cursor: pointer;
        }
        
     
        .checkbox-group label {
            display: block;
            margin-bottom: 5px;
        }
     

@media (max-width: 1024px) {
            .form--content .first--grp {

                 display: flex;
                flex-direction: column;
                gap: 0.1rem;
                width: 400px;
                
                }
                        
                        
               .first--row {
              display: flex;
              flex-direction: column;
              gap: 0.1rem;
          }
          
          
          .form-group .upload-box input 
           {
              width: 100%;
              align-content:end ;
             
             
            }
              /* .second--row {
              display: flex;
              flex-direction: column;
              gap: 1rem;
          } */
            
         /* .btn {
         width: 100px;
          padding:20px;
          font-size:12px;
         
        } */
        .form--content {
          width: 100%;
          max-width: 400px;
        
      
      }



  }       


@media (max-width: 768px) {
            .form--content .first--grp {

                 display: flex;
                flex-direction: column;
                gap: 0.1rem;
                width: 350px;
                
                }
                        
                        
               .first--row {
              display: flex;
              flex-direction: column;
              gap: 0.1rem;
          }
          
          
          .form-group .upload-box input 
           {
              width: 70%;
              align-content:end ;
             
             
            }
              /* .second--row {
              display: flex;
              flex-direction: column;
              gap: 1rem;
          } */
            
         /* .btn {
         width: 100px;
          padding:20px;
          font-size:12px;
         
        } */
        .form--content {
          width: 100%;
          max-width: 350px;
        
      
      }



  }       


   


  @media (max-width: 480px) {
            .form--content .first--grp {

                 display: flex;
                flex-direction: column;
                gap: 0.1rem;
                width: 300px;
                
                }
                        
                        
               .first--row {
              display: flex;
              flex-direction: column;
              gap: 0.1rem;
          }
          
          
          .form-group .upload-box input 
           {
              width: 50%;
              align-content:end ;
             
             
            }
              /* .second--row {
              display: flex;
              flex-direction: column;
              gap: 1rem;
          } */
            
         /* .btn {
         width: 100px;
          padding:20px;
          font-size:12px;
         
        } */
        .form--content {
          width: 100%;
          max-width: 300px;
        
      
      }



  }     

    </style>
 
</head>