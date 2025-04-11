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