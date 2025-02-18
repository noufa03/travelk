<style>

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
color:var(--base-clr);

padding: 10px;
border-radius: 20px 0 0 10px;

}

.user--info{
    display: flex;
    align-items: center;
    gap: 10px;
    


}
.info{
  display: flex;
  flex-direction: row;
  justify-content: space-between;
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
</style>