<!DOCTYPE html>
<html>
    <head>
        <title>ZOON1</title>
        <link href="style.css" rel="stylesheet">
        <style>
            * {
                margin: 0;
                padding: 0;
            }

            body{
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
            }
            h1,h2,h3,h4,h5,p,a,span,li{
                font-family: Verdana;
            }
            a {
                text-decoration: none;
                color: white;
            }

            .wrapper{
                width: 100%;
            }

            .block{
                position: relative;
                width: 100%;
                padding: 30px 0px;
            }

            .container{
                left: 25%;
                width: 50%;
                position: relative;
            }

            #one {
                background-color: #791292;
            }

            .logo img {
                width: 45px;
                float: left;
            }

            .logo {
                position: relative;
                float: left;
                text-align: left;
            }

            .logo p {
                padding: 0 5px;
                top: 15px;
                position: relative;
            }

            .logo div{
                float: left;
            }

            .logo p:last-child {
                font-size: 10px;
            }

            .navigation {
                float: right;
                text-align: right;
                position: relative;
                top: 10px;
            }

            .navigation li:hover {
                background-color: yellow;
                cursor: pointer;
            }

            .navigation li {
                display: inline-block;
                color: white;
                border: 3px solid #a48aa9;
                padding: 3px 16px;
                font-size: 21px;
                border-radius: 5px;
                margin: 01px;
                font-weight: bold;

            }

            .active {
                background-color: yellow;
                border: 0px
            }

            .active::after{
                display: none;
                content: "";
                position: absolute;
                left: 54.5%;
                bottom: 3px;
                border-left: 10px solid transparent;
                border-top: 10px solid yellow;
                border-right: 10px solid transparent;
            }

            .header {
                margin: 30px 0px;
            }

            .title {
                text-align: center;
                margin: 50px 0px;
            }

            .title hr {
                margin: 30px 0px;
                border: 1px solid #a48aa9;
            }

            .title h1 {
                color: white;
                font-size: 90px;
            }

            .title h1 b {
                color: #c28dc0;
            }

            .title h3 {
                color: white;
                font-size: 25px;
            }

            .title p {
                color: #c0a5c5;
                font-size: 19px;
            }

            .pagenation {
                position: relative;
                text-align: center;
                width: 100%;
                margin: 35px 0px;
            }

            .pagenation li {
                display: inline-block;
                width: 10px;
                height: 10px;
                border-radius: 100px;
                background-color: white;
            }

            .pagenation li:hover{
                background-color: black;
                cursor: pointer;
            }

            button {
                cursor: pointer;
                display: inline-block;
                background-color: transparent;
                border: 3px solid #a48aa9;
                border-radius: 5px;
                padding: 5px 20px;
                font-size: 17px;
                margin: 01px;
                font-weight: bold;
                color: white;
            }
            button:hover {
                background-color: rgba(22, 34, 255, 0.69);
            }

            #two {
                background-color: rgba(184, 119, 182, 0.6);
            }

            .articles {
                text-align: center;
            }
            .article img {
                width: 100%;
            }

            .article {
                display: inline-block;
                background-color: white;
                padding: 10px;
                width: 250px;
                margin: 15px;
            }

            .border {
                overflow: hidden;
                position: relative;
                height: 150px;
                width: 100%;
                overflow: hidden;
            }

            .article p {
                color: black;
                padding: 15px;
            }
        </style>
    </head>
    <body>
    <div class="wrapper">
        <div class="block" id="one">
            <div class="container">
                <div class="header">
                    <a href="/" class="logo">
                        <img src="ZOON1logo.png"/>
                        <div>
                            <p>ZOON1.com</p>
                            <p>time to come</p>
                        </div>
                    </a>
                    <ul class="navigation">
                        <li>about
                        </li>
                        <li>works</li>
                        <li>hire us</li>
                        <li>contact</li>
                    </ul>
                    <div style="clear: both"></div>
                </div>
                <div class="title">
                    <h1>WE ARE <b>THE BEST</b></h1>
                    <h3>every day and every night,every day and every night</h3>
                        <?php
                        echo '<h1>ебал твою мама по русский</h1>';
                        ?>
                    <hr/>
                    <p>Join us and become the best,join us and become the best,join us and become the best,join us and become the best,<br/>join us and become the best,join us and become the best</p>
                    <ul class="pagenation">
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                    <div>
                        <button>JOIN US</button>
                        <button>SIGN IN</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="block" id="two">
            <div class="container">
                <div class="articles">
                    <div class="article">
                        <div class="border">
                            <img src="winner.jpg">
                        </div>
                        <p>IT CAN BE YOU</p>
                    </div>
                    <div class="article">
                        <div class="border">
                            <img src="winner.jpg">
                        </div>
                        <p>IT CAN BE YOU</p>
                    </div>
                    <div class="article">
                        <div class="border">
                            <img src="winner.jpg">
                        </div>
                        <p>IT CAN BE YOU</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>