<style>
      .text-color-active {
          color: #76c07d; /* Active color */
      }
      .text-color-default {
          color: #000000; /* Default color */
      }

      .left-logo-traveLK {
          position: absolute;
          top: 20px;
          left: 20px;
          z-index: 100;
          width: 200px;
          max-width: 40vw;
          cursor: pointer;
      }

      .right-logo-traveLK {
          position: absolute;
          top: 20px;
          right: 20px;
          z-index: 100;
          width: 200px;
          max-width: 40vw;
          cursor: pointer;
      }

      /* Responsive tweaks for smaller screens */
      @media (max-width: 768px) {
          .left-logo-traveLK,
          .right-logo-traveLK {
              width: 120px;
              top: 10px;
          }
      }

      @media (max-width: 480px) {
          .left-logo-traveLK,
          .right-logo-traveLK {
              width: 100px;
              top: 8px;
          }
      }

      /* Home Page */
      .logo {
          width: 250px;
          cursor: pointer;
      }

      html{
          scroll-behavior: smooth;
          height: 100%;
      }
      body {
          font-family: Poppins, sans-serif;
          position: relative;
          background-color: #ffffff;
          color: black;
          padding: 5px 5px;
          margin: 25px 25px 0px 25px;
      }

        .center-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80vh;
            gap: 20px;
            flex-wrap: wrap;
        }

        .action-btn {
            padding: 15px 25px;
            font-weight: bold;
            border: 2px solid black;
            background-color: white;
            border-radius: 25px;
            cursor: pointer;
            display: flex;
            align-items: center;
            transition: all 0.3s ease;
            font-size: 1em;
            text-decoration: none;
            color: black;
        }

        .action-btn:hover {
            background-color: #e6f4ea;
            transform: scale(1.05);
        }

        .arrow-icon {
            margin-left: 10px;
            width: 20px;
            transition: transform 0.3s ease;
        }

        .action-btn:hover .arrow-icon {
            transform: translateX(5px);
        }

       

        .welcome-text {
          display: flex;
            text-align: center;
            margin: 40px;
            font-size: 1.2em;
            color: #333;
        }

        .no-places-watermark {
          display: flex;
          flex-direction: row;
          align-items: center;
          justify-content: center;
          text-align: center;
          padding: 50px;
          background-color: #f8f8f8;
          color: #666;
          font-size: 1em;
        }
        
    </style>
</head>