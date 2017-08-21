<?php
$image = "image/logo.png";
$facebook ="image/facebook_r.png";
$twitter = "image/twitter_r.png";
$courriel = "image/mail_r.png";
$librairie ="image/bouton-la librairie.png";
$cafe = "image/bouton-le cafe.png";
$salon = "image/bouton-salon lecture.png";
$cinema = "image/cinema.jpg";
$jeuxsociete = "image/jeuxsociete.jpg";
$ateliers = "image/ateliers.jpg";
$cours1 = "image/cours japonais 1.jpg";
$cartemembre ="image/carte avantages.png";
$cartecadeau = "image/certificat cadeau.jpg";
?>

    <style>

        /*carrousel*/
        /*
        #carrousel{
            vertical-align: top;
            overflow: hidden;
        }
        */
        main{
            margin-top: 3%;
        }

        #index #slides{
            width: 100% !important;
        }

        #index #overflow{
            width: 100% !important;
        }

        #index #overflow{
            width: 100% !important;
            overflow: hidden;

        }

        #index article img{
            width: 100%;
        }

        #index #slides .inner{
            width: 500% !important;
        }

        #index #slides .inner article{
            width: 22%;
            float: left;
            position: relative;
            margin: 0;
        }

        #index .info{
            position: absolute;
            top: 4%;
            left: 4%;
            background-color: transparent;
        }

        #index .info h3{
            font-size: 150%;
            background-color: darkred;
        }

        #index label{
            width: 10px;
            height: 10px;
            background-color: red;
            margin: 5% 0 0;
            display: inline-block;
            border-radius: 50%;
        }

        #index label:hover{
            background-color: lightgray;
            border: 1px solid gray;
        }

        #index div#active{
            width: 100px;
            margin-right: auto;
            margin-left: auto;
            text-align: center;
        }

        /* cacher boutons radio */
        #index input{
            display: none;
        }

        /* fonctionnement slider */
        #index #slide1:checked ~ #slides .inner{
            margin-left: 0;
        }

        #index #slide2:checked ~ #slides .inner{
            margin-left: -100%;
        }

        #index #slide3:checked ~ #slides .inner{
            margin-left: -200%;
        }

        #index #slide4:checked ~ #slides .inner{
            margin-left: -300%;
        }


        /* animation */
        #index #slides .inner{
            -webkit-transition: margin-left 800ms ease-in-out;
            -moz-transition: margin-left 800ms ease-in-out;
            transition: margin-left 800ms ease-in-out;
        }



        /* fin carrousel */

        /* page top ==> intro/carrousel */

        #index section:first-child div{
            display: inline-block;
            width: 46%;
            margin: 0;
            background-color: transparent;
            color: antiquewhite;
        }

        #index section:first-child div img{
            max-width: 100%;
        }

        #index .top p{
            text-align: justify;
        }

        #index .top div p{
            width: 100%;
        }

        #index article{
            display: inline-block;
            /* border: solid red 1px; */
            margin: 4px;
            margin-bottom: 20px;
            width: 30%;
            //background-image: url("../images/header-footer.jpg");
            overflow: hidden;
        }

        #index article img{
            max-width: 120%;
            max-height: 250px;
            width: auto;
            height: auto;
        }

        #index article h3{
            text-align: center;
        }

        #index article p{
            text-align: justify;
        }

        #index article div{       /* aligner avec le reste */
            width: 100%;
            background-color: antiquewhite;
            color: darkred;
            text-align: center;
        }

        /* fin index */

    </style>
  <meta charset="UTF-8">
  <title></title>
</head>
<body>
<div>
<header>
    <main id="index">
        <section class="top">
            <div id="carrousel">
                <section id="slider">
                    <input type="radio" name="" id="slide1">
                    <input type="radio" name="" id="slide2">
                    <input type="radio" name="" id="slide3">
                    <input type="radio" name="" id="slide4">

                    <div id="slides">
                        <div id="overflow">
                            <div class="inner">

                                <article>
                                    <div class="">
                                        <h3></h3>
                                    </div>
                                    <img src="image/cinema.jpg" alt="">
                                </article>

                                <article>
                                    <div class="info">
                                        <h3></h3>
                                    </div>
                                    <img src="image/jeuxsociete.jpg" alt="">
                                </article>

                                <article>
                                    <div class="info">
                                        <h3></h3>
                                    </div>
                                    <img src="image/ateliers.jpg" alt="">
                                </article>

                                <article>
                                    <div class="info">
                                        <h3> </h3>
                                    </div>
                                    <img src="image/logo.png" alt="">
                                </article>

                            </div>

                        </div>
                    </div
                        <div id="controle">
                            <label for="slide1"></label>
                            <label for="slide2"></label>
                            <label for="slide3"></label>
                            <label for="slide4"></label>
                        </div>
            </div>
        </section>
    </main>
<?php
echo '<a href="http://www.index.php/"><img src= "'.$image.'" alt="" />';
require_once 'menu.php';

        
   
        
        
?>