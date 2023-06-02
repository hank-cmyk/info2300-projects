<?php include("includes/init.php"); ?>
<!DOCTYPE html>
<html lang="en">

<?php
$title = "Fun Facts";
$funLine = "class = 'nav-style' ";

$funHeader = "Here are some fun facts about me!";


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
    <h4> Hobbies </h4>
    <ul>
        <li> Writing
        <li> <a href = "photos.php"> Photography </a>
        <li> Reading
        <li> Video games
        <li> Listening to music
        <li> Origami
        <li> Stargazing
    </ul>

    <p> Click <a href="poems.php">here</a> to read some of the poems I have written!</p>

    <h4> Favorites </h4>
    <ul>
        <li> Food: Soup
        <li> Drink: Tea
        <li> Animal: Goats
        <li> Color: Yellow
        <li> Weather: Breezy
        <li> Time of Day: Dusk
        </ul>
    <hr/>

    <h4> Quote Collection</h4>

    <div class="quotelist">
    <ul>
        <li> <em> "Though we travel the world over to find the beautiful, we must carry it with us or we find it not."</em> -Ralph Waldo Emerson

        <li><em> "Hope is the thing with feathers that perches in the soul - and sings the tunes without the words - and never stops at all."</em> -Emily Dickinson

        <li><em> "The soul should always stand ajar, ready to welcome the ecstatic experience." </em> -Emily Dickinson

        <li><em> “Looking at these stars suddenly dwarfed my own troubles and all the gravities of terrestrial life.” </em>-H.G. Wells

        <li><em> “Home is behind, the world ahead, and there are many paths to tread through shadows to the edge of night, until the stars are all alight.” </em> -J.R.R. Tolkien

        <li><em> “It is a far, far better thing that I do, than I have ever done; it is a far, far better rest that I go to than I have ever known.” </em> -Charles Dickens

        <li><em> "So look at the fleeting stars with fleeting eyes, and feel how the earth beneath you gives.”</em> -Joseph Fink
    </ul>
    </div>

</main>
</body>
