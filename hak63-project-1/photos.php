<?php include("includes/init.php"); ?>
<!DOCTYPE html>
<html lang="en">

<?php
$title = "Photos";

$photosHeader = "Here are some of the photos I've taken!";


?>

<head>
    <meta charset = "utf-8"/>
    <link rel="stylesheet" type="text/css" href="styles/theme2.css">
    <title> <?php echo $title;?> </title>
</head>

<body>
<header>
    <h1> <?php echo $title;?> </h1>

    <nav> <?php include("includes/navigation.php");?> </nav>

    <p class = "return-fun"> <a href="funfacts.php">Return to Fun Facts</a> </p>

    <hr/>
    <?php include("includes/header-intro.php");?>
</header>

<main>
    <div class="row">
        <div class="box">
    <figure>
        <!-- Source: (original photo) Hanna Kang -->
        <img src="images/arbor.png" alt="Path through some  leaves">
        <figcaption> <em> Oyster Bay, NY </em> </figcaption>
    </figure>
        </div>

        <div class="box">
    <figure>
        <!-- Source: (original photo) Hanna Kang -->
        <img src="images/bird.png" alt="Bird spreading its wings">
        <figcaption> <em> Bay Lake, FL </em> </figcaption>
    </figure>
        </div>
    </div>

    <div class="row">
        <div class="box">
    <figure>
        <!-- Source: (original photo) Hanna Kang -->
        <img src="images/minnesota.png" alt="Sunset over trees">
        <figcaption> <em> Bemidji, MN </em> </figcaption>
    </figure>
        </div>

        <div class="box">
    <figure>
        <!-- Source: (original photo) Hanna Kang -->
        <img src="images/botanybay.png" alt="Path with trees overhanging">
        <figcaption> <em> Botany Bay, SC </em> </figcaption>
    </figure>
        </div>
    </div>

    <div class="row">
        <div class="box">
    <figure>
        <!-- Source: (original photo) Hanna Kang -->
        <img src="images/cinque.png" alt="Colorful town next to the sea">
        <figcaption> <em> Cinque Terre, Italy </em> </figcaption>
    </figure>
        </div>

        <div class="box">
    <figure>
        <!-- Source: (original photo) Hanna Kang -->
        <img src="images/cloud.png" alt="Some wisps of clouds in the sky">
        <figcaption> <em> Bay Lake, FL </em> </figcaption>
    </figure>
        </div>
    </div>

    <div class="row">
        <div class="box">
    <figure>
        <!-- Source: (original photo) Hanna Kang -->
        <img src="images/lake.png" alt="Lake with a broken dock">
        <figcaption> <em> Voyageurs National Park, MN </em> </figcaption>
    </figure>
        </div>

        <div class="box">
    <figure>
        <!-- Source: (original photo) Hanna Kang -->
        <img src="images/ducksun.png" alt="Duck on lake at sunset">
        <figcaption> <em> Hastings-on-Hudson, NY </em> </figcaption>
    </figure>
        </div>
    </div>

    <div class="row">
        <div class="box">
    <figure>
        <!-- Source: (original photo) Hanna Kang -->
        <img src="images/oceanitaly.png" alt="Waves crashing on rocks">
        <figcaption> <em> Cinque Terre, Italy </em> </figcaption>
    </figure>
        </div>

        <div class="box">
    <figure>
        <!-- Source: (original photo) Hanna Kang -->
        <img src="images/epcot.png" alt="Early sunset over a lake">
        <figcaption> <em> Orlando, FL </em> </figcaption>
    </figure>
        </div>
    </div>

    <div class="row">
        <div class="box">
    <figure>
        <!-- Source: (original photo) Hanna Kang -->
        <img src="images/slope.png" alt="Sunset over Libe Slope">
        <figcaption> <em> Ithaca, NY </em> </figcaption>
    </figure>
        </div>

        <div class="box">
    <figure>
        <!-- Source: (original photo) Hanna Kang -->
        <img src="images/reflection.png" alt="Reflection of clouds in the water">
        <figcaption> <em> Itasca State Park, MN </em> </figcaption>
    </figure>
        </div>
    </div>

    <div class="row">
        <div class="box">
    <figure>
        <!-- Source: (original photo) Hanna Kang -->
        <img src="images/umbrella.png" alt="Many umbrellas open in the rain">
        <figcaption> <em> Florence, Italy </em> </figcaption>
    </figure>
        </div>

        <div class="box">
    <figure>
        <!-- Source: (original photo) Hanna Kang -->
        <img src="images/gracefarms.png" alt="Reflective surface of an open tunnel">
        <figcaption> <em> Grace Farms, CT </em> </figcaption>
    </figure>
        </div>
    </div>

    <div class="row">
        <div class="box">
    <figure>
        <!-- Source: (original photo) Hanna Kang -->
        <img src="images/lavender.png" alt="Lavender field">
        <figcaption> <em> East Marion, NY </em> </figcaption>
    </figure>
        </div>

        <div class="box">
    <figure>
        <!-- Source: (original photo) Hanna Kang -->
        <img src="images/winterbridge.png" alt="Bridge covered in snow">
        <figcaption> <em> Ithaca, NY </em> </figcaption>
    </figure>
        </div>
    </div>

</main>
</body>
