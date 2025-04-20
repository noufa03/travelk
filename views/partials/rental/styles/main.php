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

