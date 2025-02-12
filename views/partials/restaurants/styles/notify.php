<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications</title>
    <style>
    *{
    padding: 0px;
    margin: 0px;
    
    
    }
    body{
    font-family: sans-serif;
    }
    
    /* .notifications a span{
    background-color: #f00;
    padding: 7px;
    border-radius: 50%;
    color: #fff;
    vertical-align: top;
    margin-left: -25px;
    } */
    
 .notification--content{
/* background-color:var(--accent-clr); */
padding: 2rem;
border-radius: 10px;
display: grid;
grid-template-columns: 1fr 1fr;
}
    
    .notification--card{
/* background-color:#F5EFE6; */
border: radius 10px; ;
padding:1.2rem ;
width: 290px;
height: 150px;
display: flex;
flex-direction: column;
justify-content: space-between;
transition: all 0.5s ease-in-out;
border-radius: 10px;
box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;
}

.notification--card:hover{
transform: translateY(-5px);

}
    </style>
</head>

