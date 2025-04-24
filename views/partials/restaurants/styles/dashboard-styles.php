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
            --base-clr: #f0f2f0;
            --line-clr: #76c07d;
            --hover-clr: white;
            --text-clr: black;
            --accent-clr: #76c07d;
            --secondary-text-clr: #1A1A19;
        }

        * {
            margin: 0;
            padding: 0;
        }

        html {
            font-family: Poppins, sans-serif;
        }

        body {
            position: relative;
            background-color: #ffffff;
            color: black;
            display: grid;
            min-height: 100vh;
            min-height: 100dvh;
            grid-template-columns: auto 1fr;
            overflow-x: hidden;
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
            font-family: system-ui, -apple-system, system-ui, "Helvetica Neue", Helvetica, Arial, sans-serif;
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

        .button-6:hover,
        .button-6:focus {
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

        .main--content {
            padding: min(30px, 7%);
        }

        .main--content {

            /* border: 8px solid black; */
            position: relative;
            background-color: var(--hover-clr);
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

        .header--wrapper img {
            width: auto;
            height: 100%;
            cursor: pointer;
            border-radius: 50%;


        }

        .header--wrapper {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            /* max-width: 1400px; */
            background: white;

            border-radius: 0 10px 10px 0;
            padding: 10px 2rem;
            margin-bottom: 1rem;

            border: 1px solid #ccc;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);



        }



        .header--title {
            color: var(--text-clr);

            padding: 10px;
            border-radius: 10px 0 0 10px;

        }

        .user--info {
            display: flex;
            align-items: center;
            gap: 10px;



        }

        .info {
            display: flex;
            align-items: center;
            height: 50px;

            /* border: 1px solid var(--line-clr); */
            /* background-color:var(--base-clr); */
            border-radius: 10px;

        }



        /* dashboard */

        .main-card--container {

            display: grid;
            grid-row: 1fr 1fr;
            gap: 10px;


        }



        .card--container {
            max-width: 100%;
            padding: 2rem;
            border-radius: 10px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            /* dynamic columns */
            justify-content: center;
            gap: 2rem;
            box-sizing: border-box;


        }

        .card--wrapper {
            display: flex;
            flex-wrap: wrap;
            /* gap: 1rem; */

        }

        .card--wrapper--starthere {
            display: flex;
            flex-wrap: wrap;


        }


        .starthere--card {
            /* background-color:#F5EFE6; */
            border: radius 10px;
            ;
            padding: 1.2rem;
            width: 700px;
            height: 400px;

            transition: all 0.5s ease-in-out;
            border-radius: 10px;
            box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;
        }


        .card--wrapper--profile {
            display: flex;
            flex-wrap: wrap;


        }


        .starthere--profile {
            /* background-color:#F5EFE6; */
            border: radius 10px;
            ;
            padding: 1.2rem;
            width: 700px;
            height: 440px;

            transition: all 0.5s ease-in-out;
            border-radius: 10px;
            box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;
            display: grid;
            grid-template-rows: 1fr 1fr;
            gap: 1rem;

        }





        .main--title {
            color: var(--secondary-text-clr);
            padding-bottom: 10px;
            font-size: 15px;

        }


        .payment--card {
            /* background-color:#F5EFE6; */
            border: radius 10px;
            ;
            padding: 1.2rem;
            width: 300px;
            height: 150px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: all 0.5s ease-in-out;
            border-radius: 10px;
            box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;



        }

        .card--wrapper a {
            color: black;
            text-decoration: none;
        }


        .payment--card:hover {
            transform: translateY(-5px);

        }

        .card--header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;

        }

        .amount {
            display: flex;
            flex-direction: column;

        }

        .title {
            font-size: 20px;
            font-weight: 200;


        }

        .amount--value {
            font-size: 20px;
            font-family: Poppins;
            font-weight: 600;
        }

        .icon {
            color: #fff;
            padding: 1rem;
            height: 60px;
            width: 60px;
            text-align: center;
            border-radius: 50%;
            font-size: 1.5rem;
            background-color: #ffdc83;

        }

        .card--detail {
            font-size: 18px;
            color: var(--text-clr);
            letter-spacing: 2px;
            font-family: Poppins;
        }

        .light-red {
            background-color: rgb(254, 233, 254);

        }


        .location--wrapper {
            display: flex;
            flex-wrap: wrap;


        }

        .location--title {

            color: #1A1A19;
        }

        .location--card {
            /* background-color:#F5EFE6; */
            border-radius: 10px;
            padding: 1.2rem;
            width: 700px;
            height: 600px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: all 0.5s ease-in-out;
            border-radius: 10px;
            box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;

        }

        .location--card .button {
            color: #1A1A19;
        }

        .location--card:hover {
            transform: translateY(-5px);

        }

        /* daily offers small cards */
        .daily--container {
            padding: 1rem;
            border-radius: 10px;

        }

        .daily--wrapper {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;

        }

        .daily--card {
            background-color: white;
            border-radius: 10px;
            padding: 1.2rem;
            width: 100%;
            max-width: 600px;
            height: 100px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: all 0.5s ease-in-out;
            border-radius: 10px;
            box-shadow: rgba(0, 0, 0, 0.05) 0px 0px 0px 1px, rgb(209, 213, 219) 0px 0px 0px 1px inset;
        }

        .daily--header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;

        }

        .daily--card:hover {
            transform: translateY(-5px);

        }

        .daily-amount {
            display: flex;
            flex-direction: column;
        }

        .daily-title {
            font-size: small;
            color: #1A1A19;
            font-weight: 600;
        }

        .daily-des {
            font-size: small;
            color: #1A1A19;
        }










     @media screen and (max-width: 1024px) {
      body {
           grid-template-columns: auto 1fr;
        
        
      }

      .header--wrapper {
        flex-direction: row;
        justify-content: space-between;
        gap: 1rem;
      }

      .card--container,
      .card--wrapper,
      .location--wrapper,
      .daily--wrapper {
        grid-template-columns: 1fr ;
        flex-direction: column;
        align-items: stretch;
      }

      .starthere--card,
      .starthere--profile,
      .location--card {
        width: 90% !important;
        height: auto !important;
      }

      .payment--card {
        width: 90% !important;
      }
      .location--card{
         width: 90%;
      }
      .daily--card{
       width: 90%;
      }

      .main--content {
        margin: 10px;
        padding: 1em;
      }
    }

    @media screen and (max-width: 600px) {
      .header--wrapper {
        padding: 1rem;
      }

      .button-6 {
        font-size: 14px;
        padding: 0.5rem 1rem;
      }

      .amount--value {
        font-size: 16px;
      }

      .icon {
        height: 50px;
        width: 50px;
        font-size: 1.2rem;
      }
    }
    </style>

</head>