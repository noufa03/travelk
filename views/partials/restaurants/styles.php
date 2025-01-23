<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');
    @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');

:root {
    --base-clr:#1A4D2E;
    --line-clr: #76c07d ;
    --hover-clr: white;
    --text-clr: #F6FCDF;
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

#sidebar{
box-sizing: border-box;
height: 100vh;
width: 250px;
padding: 5px 1em;
background-color: var(--base-clr);
border-right: 1px solid var(--line-clr);

position: sticky;
top: 0; 
align-self: start;
transition: 300ms ease-in-out;
overflow: hidden;
text-wrap: nowrap;
}

#sidebar.close{
padding: 5px;
width: 60px;

}
#sidebar ul{
list-style: none;
}

#sidebar >ul >li:first-child{


display: flex;
justify-content: flex-end;
margin-bottom: 16px;
.logo{
 font-weight: 600;
};

}

#sidebar ul li.active  a{

color: var(--accent-clr);
svg{
    
    fill: var(--accent-clr);
}
}

#sidebar a, #sidebar .dropdown-btn ,#sidebar .logo{
border-radius: .5em;
padding: .85em;
text-decoration: none;
color: var(--text-clr);
display: flex;
align-items: center;
gap:1em;

}

.dropdown-btn
{
width: 100%;
text-align: left;
background: none;
border: none;
font: inherit;
cursor: pointer;

}

#sidebar svg{
flex-shrink: 0;
fill: var(--text-clr );


}

#sidebar a span ,#sidebar .dropdown-btn span{

flex-grow: 1 ;

}

#sidebar a:hover ,#sidebar .dropdown-btn:hover{

background-color: var(--hover-clr );
color: #1A1A19;


}

#sidebar .sub-menu{
 display: grid;
 grid-template-rows: 0fr;
transition: 300ms ease-in-out;

> div{
    overflow: hidden;
}

}

#sidebar .sub-menu.show{
    grid-template-rows: 1fr;
    
}

.dropdown-btn svg{
transition: 200ms ease;

}
.rotate svg:last-child{
    rotate: 180deg;
}

#sidebar .sub-menu a{
    padding-left: 2em;

}

#toggle-btn{
margin-left: auto;
padding: 1em;
border: none;
border-radius: .5em;
background: none;
cursor: pointer;

svg{
    transition: rotate 150ms ease;
}

}

#toggle-btn:hover{
background-color: var(--hover-clr);
}


@media(max-width:800px){
    
body{

grid-template-columns: 1fr;

}

#sidebar{
height: 60px;
width: 100%;
border-right: none;
border-top: 1px solid var(--line-clr);
padding: 0;

position: fixed;
top: unset;
bottom: 0;

> ul{
padding: 0;
display: grid;
grid-auto-columns: 60px;
grid-auto-flow: column;
align-items: center;
overflow-x: scroll;
}

ul li{

height: 100%;}

ul a, ul .dropdown-btn{
width: 60px;
height: 60px;
padding: 0;
border-radius: 0;
justify-content: center;

}

ul li span,ul li:first-child, .dropdown-btn svg:last-child{
    display: none;
}

ul li .sub-menu.show {
position: fixed;
bottom: 60px;
left: 0;
box-sizing: border-box;
height: 60px;
width: 100%;
background-color: var(--hover-clr);
border-top: 1px solid var(--line-clr);
display: flex;
justify-content: center;
}

> div{
overflow-x: auto;
}
li{
display: inline-flex;

}

a{
box-sizing: border-box;
padding: 1em;
width: auto;
justify-content: center;
padding: 1rem;


}


}

}


/* main body */

.main--content{
position: relative;
background-color:var(--hover-clr) ;
width: 100%;

padding: 1rem;
}

.header--wrapper img{
 width: auto;
height: 100%;
cursor: pointer;
border-radius: 0 10px 10px 0;


}
.header--wrapper{
display: flex;
justify-content: space-between;
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
background-color:var(--base-clr);
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


.card--container{
/* background-color:var(--accent-clr); */
padding: 2rem;
border-radius: 10px;
}

.card--wrapper{
display: flex;
flex-wrap: wrap;
gap: 1rem;

}
.main--title{
    color:var(--secondary-text-clr);
    padding-bottom: 10px;
    font-size: 15px;
    
    }

    
.payment--card{
background-color:#F5EFE6;
border: radius 10px; ;
padding:1.2rem ;
width: 290px;
height: 150px;
display: flex;
flex-direction: column;
justify-content: space-between;
transition: all 0.5s ease-in-out;
border-radius: 10px;
}
.card--wrapper a {
    color: black;
    text-decoration: none;
}


.payment--card:hover{
transform: translateY(-5px);

}
.card--header{
display: flex;
justify-content: space-between;
align-items: center;
margin-bottom: 20px;

}
.amount{
display: flex;
flex-direction: column;

}
.title{
font-size:20px;
font-weight: 200;


}
.amount--value{
font-size: 20px;
font-family:Poppins;
font-weight: 600;
}
.icon{
color: #fff;
padding: 1rem;
height: 60px;
width: 60px;
text-align: center;
border-radius: 50%;
font-size: 1.5rem;
background-color:#ffdc83;

}
.card--detail{
font-size: 18px;
color:var(--text-clr);
letter-spacing: 2px;
font-family:Poppins;
}
.light-red{
background-color: rgb(254,233,254);

}


.location--wrapper{
display: flex;
flex-wrap: wrap;
gap: 1rem;

}

.location--title{

color: #1A1A19;
}

.location--card{
background-color:#F5EFE6;
border-radius: 10px; 
padding:1.2rem ;
width: 600px;
height: 600px;
display: flex;
flex-direction: column;
justify-content:space-between;
transition: all 0.5s ease-in-out;
border-radius: 10px;
}

.location--card .button{
color: #1A1A19;
}
.location--card:hover{
transform: translateY(-5px);

}

/* daily offers small cards */
.daily--container{
padding: 1rem;
border-radius: 10px;

}
.daily--wrapper{
display: flex;
flex-wrap: wrap;
gap: 1rem;

}
.daily--card{
background-color:white;
border-radius :10px;
padding:1.2rem ;
width: 100%;
max-width: 600px;
height: 100px;
display: flex;
flex-direction: column;
justify-content: space-between;
transition: all 0.5s ease-in-out;
border-radius: 10px;

}

.daily--header{
display: flex;
justify-content: space-between;
align-items: center;
margin-bottom: 20px;

}
.daily--card:hover{
transform: translateY(-5px);

}
.daily-amount{
display: flex;
flex-direction: column;
}
.daily-title{
font-size: small;
color: #1A1A19;
font-weight: 600;
}
.daily-des{
font-size: small;
color: #1A1A19;
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

    </style>
 
</head>