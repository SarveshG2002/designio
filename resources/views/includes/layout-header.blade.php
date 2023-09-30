<head>

<link href="https://fonts.googleapis.com/css2?family=Croissant+One&family=Ubuntu&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <style>
        *{
            margin: 0px;
        }
        body{
            background-color: #d8d8d8
        }
        .navbox{
            width: 100%;
            height: 50px;
            background-color: #ffffff
        }
        .navbox .row{
            display: grid;
            grid-template-columns: 15% 70% 15%
        }

        .logo{
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            font-family: 'Croissant One', cursive;
            /* font-family: 'Ubuntu', sans-serif; */
            font-size: 35px;
            color: #673ab7;
        }

         .search {
            width: 100%;
            position: relative;
            display: flex;
            }

        .search .searchTerm {
            width: 100%;
            border: none;
            border-right: none;
            padding: 5px;
            height: 26px;
            border-radius: 15px 0 0 15px;
            outline: none;
            color: #9DBFAF;
            background-color: #eeeeee
        }

        .search .searchTerm:focus{
             color: #673ab7;
        }

        .search .searchButton {
            width: 40px;
            height: 36px;
            border: 1px solid #eeeeee;
            background: #eeeeee;
            text-align: center;
            color: #949494;
            border-radius: 0 15px 15px 0;
            cursor: pointer;
            font-size: 20px;
        }

        /*Resize the wrap to see the search bar change!*/
        .search .wrap{
            width: 100%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        .logout{
            text-align: center;
        }
        /* .logout a{
            text-decoration: none;
            background-color: rgb(244,67,54);
            color: #d8d8d8;
            border-radius: 10px 10px 10px 10px;
            font-size: 15px;
            width: 50%;
            padding
            margin-top: 10px;
            font-family: 'Croissant One', cursive;
            color: white;
        } */
        .logout div{
            width: 30%;
            background-color: rgb(244,67,54);
            color: white;
            padding: 7px;
            font-size: 15px;
            margin: 7.5px auto 7.5px auto;
            border-radius: 10px;
            font-family: 'Croissant One', cursive;
        }

        .container{
            display: grid;
            grid-template-columns: 20% 70% 10%;
        }
        .sidebardiv{
            width: 100%;
        }
        
                    

    </style>
</head>