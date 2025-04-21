<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');
    @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');

:root {
    --base-clr:#f0f2f0;;
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
    font-family: Poppins, sans-serif;
}

body{   
    position: relative;
    background-color: #ffffff;
    color: black;
    display: grid;
    min-height: 100vh;
    min-height: 100dvh;
    grid-template-columns: auto 1fr;
        /* background-color: var(--base-clr);
        color: var(--text-clr); */
}



/* button */
.button-6 {
    align-items: center;
    background-color: #FFFFFF;
    border: 1px solid rgba(0, 0, 0, 0.1);
    border-radius: .25rem;
    box-shadow: rgba(0, 0, 0, 0.02) 0 1px 3px 0;
    box-sizing: border-box;
    color: rgba(0, 0, 0, 0.85);
    cursor: pointer;
    display: inline-flex;
    font-family: system-ui,-apple-system,system-ui,"Helvetica Neue",Helvetica,Arial,sans-serif;
    font-size: 16px;
    font-weight: 600;
    justify-content: center;
    line-height: 1.25;
    margin: 0;
    min-height: 3rem;
    padding: calc(.875rem - 1px) calc(1.5rem - 1px);
    position: relative;
    text-decoration: none;
    transition: all 250ms;
    user-select: none;
    -webkit-user-select: none;
    touch-action: manipulation;
    vertical-align: baseline;
    width: auto;
}

.button-6:hover,.button-6:focus {
    border-color: rgba(0, 0, 0, 0.15);
    box-shadow: rgba(0, 0, 0, 0.1) 0 4px 12px;
    color: rgba(0, 0, 0, 0.65);
}
.button-6:hover {
    transform: translateY(-1px);
}
.button-6:active {
    background-color: #F0F0F1;
    border-color: rgba(0, 0, 0, 0.15);
    box-shadow: rgba(0, 0, 0, 0.06) 0 2px 4px;
    color: rgba(0, 0, 0, 0.65);
    transform: translateY(0);
}

/* main body */
.main--content{

/* border: 8px solid black; */
position: relative;
background-color:var(--hover-clr) ;
/* width: 100%; */
border:
1px solid #000000;
  border-radius:
1em;
  margin:
20px;
  padding:
min(3em, 2%);
 

}

.header--wrapper img{
 width: auto;
height: 100%;
cursor: pointer;
border-radius: 50%;


}
.header--wrapper{
display: flex;
justify-content:space-between;
align-items: center;
flex-wrap: wrap;
background:white;

border-radius: 0 10px 10px 0;
padding: 10px 2rem;
margin-bottom: 1rem;

border: 1px solid #ccc;
box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);

}



.header--title{
color:var(--text-clr);

padding: 10px;
border-radius: 10px 0 0 10px;

}

.user--info{
    display: flex;
    align-items: center;
    gap: 10px;
    


}
.info{
  display: flex;
    align-items: center;
    height: 50px;
  
   /* border: 1px solid var(--line-clr); */
/* background-color:var(--base-clr); */
border-radius: 10px;

}


.search--box{
    background:var(--hover-clr);
    border-radius:15px;
    color:var(--text-clr) ;
    display: flex;
    align-items:center;
    gap: 5px;
    padding: 4px 12px;

}

.search--box input{
    background: transparent;
    padding: 10px;
    
}
.search--box svg{
font-size: 1.2rem;
cursor: pointer;
transition: all 0.5s ease-out;


}
.search--box svg:hover{
    transform: scale(1.1);

}





/* add menu  add table*/


.form--content {
    width: 100%;
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
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

.first--row {
    display: flex;
    flex-direction: row;
    gap: 3rem;
}
.second--row{

display: flex;
flex-direction: row;
gap: 3rem;
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

/* pop up */

.popup{
width: 400px;
background-color: #F5EFE6;
border-radius: 6px;
position:absolute;
top: 0%;
left: 50%;
transform: translate(-50%,-50%) scale(0.1);
text-align: center;
padding: 0 30px 30px;
color: #007BFF;
visibility: hidden;
transition: transform 0.4s,top 0.4s;

}

.open-popup{
visibility: visible;
top: 50%;
transform: translate(-50%,-50%) scale(1);

}

.popup img{
width: 100px;
margin-top: -50px;
border-radius: 50%;
box-shadow: 0 2px 5px rgba(0,0,0,0.2);


}
.popup h2{
font-size: 38px;
font-weight: 500;
margin: 30px 0 10px;
}

.popup button{
width: 100%;
margin-top: 10px;
padding:10px 0;
background: #1A4D2E;
border: 0;
outline: none;
font-size: 18px;
border-radius: 4px;
cursor: pointer;
box-shadow: 0 5px 5px rgba(0,0,0,0.2);

}

.popup #delete-form delete{
width: 100%;
margin-top: 50px;
padding:10px 0;
background: #1A4D2E;
border: 0;
outline: none;
font-size: 18px;
border-radius: 4px;
cursor: pointer;
box-shadow: 0 5px 5px rgba(0,0,0,0.2);

}

/* table */
.table--content{
width: 100%;
max-width: 1500px;
margin: 50px auto;



}

table {
    width: 100%;
    color: #1A1A19;
    border-collapse: collapse;
    margin: 20px 0;
    font-size: 16px;
    text-align: left;
    background-color: #fff;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
 
}

th, td {
    padding: 12px;
    border: 1px solid var(--hover-clr);
    font-size: small;
    font-weight: 100;
    color: #1A4D2E;
}

th {
    background-color:white;
    color:#1A4D2E;
    font-weight: 100;
   
}

tr {
    background-color:white;
    
}

tr:hover {
    background-color: #f1f1f1;
}

a {
    color:var(--secondary-text-clr);
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}


#delete-form button{
width: 50%;

padding: 0 1.2rem ;
background:red;
color: var(--text-clr);
border: 0;
outline: none;
font-size: small;
border-radius: 4px;
cursor: pointer;
box-shadow: 0 5px 5px rgba(0,0,0,0.2);
}


td a button {


display: inline-block;
width: 100%;
padding: 0 1.2rem ;
background:blue;
color: var(--text-clr);
border: 0;
outline: none;
font-size: small;
border-radius: 4px;
cursor: pointer;
box-shadow: 0 5px 5px rgba(0,0,0,0.2);

}




.switch {
    position: relative;
    display: inline-block;
    width: 200px;
    height: 50px;
    border-radius: 25px;
 
}

.switch input {
    appearance: none;
    width: 200px;
    height: 50px;
    border-radius: 25px;
    background-color:white;
    outline: none;
    cursor: pointer;
    transition: background-color 0.25s ease;
}

.switch input::before,
.switch input::after {
    content: "";
    z-index: 2;
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    font-weight: bolder;
    color: white;
    font-size: 10px;
}

.switch input::before {
    content: "Available";
    left: 20px;
}

.switch input::after {
    content: "Booked";
    right: 20px;
}

.switch input:checked {
    background-color: #007BFF;
}

.switch input:checked::before,
.switch input:checked::after {
    color: #007BFF;
    transition: color 0.5s;
}

.switch label {
    z-index: 1;
    position: absolute;
    top: 5px;
    bottom: 5px;
    left: 5px;
    right: 125px;
    border-radius: 20px;
    background-color:#1A4D2E;
    transition: left 0.5s, right 0.4s 0.2s, background-color 0.35s ease;
}

.switch input:checked + label {
    left: 125px;
    right: 5px;
    background-color:#1A4D2E;
    transition: left 0.5s, right 0.4s 0.2s, background-color 0.35s ease;
}

.switch input:not(:checked) {
    background: #1A4D2E;
    transition: background-color 0.4s ease;
}

.switch input:not(:checked)::before {
    color: white;
    transition: color 0.5s;
}

.switch input:not(:checked)::after {
    color:#1A4D2E;
    transition: color 0.5s 0.2s;
}

.switch input:not(:checked) + label {
    left: 5px;
    right: 125px;
    background-color:#007BFF;
    transition: left 0.4s 0.2s, right 0.5s, background-color 0.35s ease;
}

/* menu list filter */
.filter-condition select{
    width: 120px;
    padding:0 0 0 10px;
    border: none;
    outline: none;
    font-weight: bold;
    color: purple;
    background: transparent;
    cursor: pointer;
    

}
/* popup */
   /* Popup Background */
     .popup2{
     background-color:white;
     width: 450px;
     padding:30px 40px ;
     position: absolute;
     transform: translate(-50%,-50%);
     left: 50%;
     top:50%;
     border-radius: 8px;
     font-family: Poppins;
     display: none;
     
     }
    .popup2 button{
    display: block;
    margin: 0 0 20px auto;
    background-color: transparent;
    font-size: 30px;
    color: #76c07d;
    border:none ;
    outline: none;
    cursor: pointer;
    
    
    }
    .popup2 p{
    font-size: 14px;
    text-align: justify;
    margin: 20px 0;
    }
 .popup2 a{
display: block;
width: 150px;
position: relative;
margin: auto;
text-align: center;
background-color: #007BFF;
color: wheat;
text-decoration: none;
padding: 5px 0;

}
/* notifications */







  @media (max-width: 1024px) {
/* dashboard */






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