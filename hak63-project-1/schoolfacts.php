<?php include("includes/init.php"); ?>
<!DOCTYPE html>
<html lang="en">

<?php
$title = "School Facts";
$schoolLine = "class = 'nav-style' ";

$schoolHeader = "Here are some school facts about me!";


?>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title> <?php echo $title;?> </title>

  <link rel="stylesheet" type="text/css" href="styles/theme2.css">

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
        <li>College: Arts and Science
        <li>Major: Information Science, English
        <li>Graduating Year: 2022
    </ul>

    <h4> Clubs </h4>
    <ul>
        <li>Rainy Day Literary Magazine
        <li> Asian American Intervarsity
        <li> Development in Games Association
    </ul>

    <figure>
        <!-- Source: (original photo) Hanna Kang -->
        <img src = "images/schedule.png" alt = "Spring 2020 Semester Schedule">
        <figcaption class = "center-caption"> <em> Spring 2020 Semester Schedule</em>
        <br/>The current year is: <?php echo date("Y");?> </figcaption>
    </figure>

    <hr/>
    <h4> Why I chose Information Science and English:</h4>

    <p>
    Information Science is something that I hadn't heard of until last semester. But, after reading more about the different concentrations I could focus on, I found out about UX Design. This peaked my interest, especially seeing as I'd been wanting to do something more on the creative side with computers. At first, I thought that I was going to minor in creative writing. I grew up reading a lot of books, and began writing for fun towards the end of high school and most of freshman year. It was a way I could create my own worlds and funnel my wayward imagination into a concrete place. However, after taking classes, I realized that I really enjoyed the humanities, and more specifically,English classes that I was taking, and so, I decided that I would double major in both Information Science and English.
    </p>

</main>

</body></html>
