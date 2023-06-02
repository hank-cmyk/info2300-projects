<?php include("includes/init.php"); ?>
<!DOCTYPE html>
<html lang="en">

<?php
$title = "General Facts";
$generalLine = "class = 'nav-style' ";

$generalHeader = "Here are some general facts about me!";


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

    <hr/>
    <?php include("includes/header-intro.php");?>
</header>

<main>
    <ul>
        <li> Full name: Hanna Audrey Kang
        <li> Current age: 19
        <li> Birthday: October 12, 2000
        <li> Home: Syosset, NY
    </ul>

    <h4> Quick Stats! </h4>
    <ul>
        <li> Height: 4'11"
        <li> Speed: 6
        <li> Strength: 4
        <li> Memory: 3
        <li> Rhythm: 5
        <li> Pun capacity: 7
        <li> Sleepiness: 8
    </ul>


    <h4> I also have 2 brothers! </h4>
    <ol>
        <li> My older brother, Ian, is a senior at Johns Hopkins University.
        <li> My younger brother, Euan, is in 10th grade at Syosset High School.
    </ol>

    <!-- Source: (original photo) Hanna Kang -->
    <figure>
        <img src="images/brothers.png" alt="A photo of me with my brothers.">
        <figcaption class = "center-caption"> <em> From left to right: Euan, Hanna, Ian </em> </figcaption>
    </figure>


</main>
</body>
