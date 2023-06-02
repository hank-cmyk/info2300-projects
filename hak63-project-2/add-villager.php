<?php include("includes/init.php"); ?>
<!DOCTYPE html>
<html lang="en">

<?php

$name_input = '';
$species_input = '';
$personality_input = '';
$birthday_input = '';

$name_feedback = FALSE;
$species_feedback = FALSE;
$personality_feedback = FALSE;

$db = open_sqlite_db("secure/catalog.sqlite");

$show_confirmation = FALSE;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name_feedback = FALSE;
  $species_feedback = FALSE;
  $personality_feedback = FALSE;

  $name_input = $_POST['name_input'];
  $name_input = trim(
    str_replace(' ', '', ucfirst(strtolower($name_input))));
  if ( (!empty($name_input))){

    $name_feedback = FALSE;
  } else {
    $name_feedback = TRUE;

  }

  $species_input = $_POST['species_input'];
  $species_input = trim(
    str_replace(' ', '', ucfirst(strtolower($species_input))));
  if ( (!empty($species_input))){

    $species_feedback = FALSE;
  } else {
    $species_feedback = TRUE;

  }

  $personality_input = $_POST['personality_input'];
  $personality_input = trim(
    str_replace(' ', '', ucfirst(strtolower($personality_input))));
  if ( (!empty($personality_input))){

    $personality_feedback = FALSE;
  } else{
    $personality_feedback = TRUE;

  }

  $birthday_input = $_POST['birthday_input'];
  $birthday_input = trim(
      str_replace(' ', '' ,ucfirst(strtolower($birthday_input))));

  if ( ($name_feedback == FALSE) && ($species_feedback == FALSE) && ($personality_feedback == FALSE) ){
      $show_confirmation = TRUE;
  }

}else {
  $name_feedback = FALSE;
  $species_feedback = FALSE;
  $personality_feedback = FALSE;
}

?>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="styles/site.css">
  <script type="text/javascript" src="scripts/jquery-3.4.1.min.js"></script>
  <script src="scripts/validation.js" type="text/javascript"> </script>
  <title>Animal Crossing Villagers</title>
</head>

<body>
<main>

<div class = "title-style">
  <div class = "row">
  <h1> Animal Crossing</h1>
      <!-- Source: https://www.stickpng.com/img/games/animal-crossing/animal-crossing-leaf -->
      <?php display_sprite('logo', 'https://www.stickpng.com/img/games/animal-crossing/animal-crossing-leaf', 'Animal Crossing Logo', 'stickpng');?>
  </div>
</div>

<div class = "row">
  <div class = "headerimg-container">
    <!-- Source: https://animalcrossing.fandom.com/wiki/Isabelle -->
    <?php display_sprite('isabelle', 'https://animalcrossing.fandom.com/wiki/Isabelle', 'Isabelle', 'AC Wiki' ); ?>
</div>

  <div class = "header-style">
  <h2> Villager Database </h2>
  <form action="index.php" method="post">
    <button class = "back-style" type="submit"><strong>Back to all villagers</strong></button>
  </form>
    </div>
</div>

<hr/>

<?php if ($show_confirmation) {

    $sql_check_name = "SELECT name FROM villagers;";
    $params_check_name = array(
      ':name' => $name_input
    );

    $result = exec_sql_query($db, $sql_check_name)->fetchAll(PDO::FETCH_COLUMN);

    if(!in_array($name_input, $result)){
      $sql =  "INSERT INTO villagers (name, species, personality, birthday)
      VALUES (:name, :species, :personality, :birthday);";
      $params = array(
      ':name' => $name_input,
      ':species' => $species_input,
      ':personality' => $personality_input,
      ':birthday' => $birthday_input
      );
      exec_sql_query($db, $sql, $params); ?>
      <p class = "sorry-style"> You have added <?php echo htmlspecialchars($name_input)?> to the database!</p>
    <?php } else {?>
    <p class = "sorry-style">Sorry! <?php echo htmlspecialchars($name_input)?> is already in the database.</p>
    <?php }

    ?>

<?php } else { ?>

<form id="add-villager_form" action = "add-villager.php" method = "post" novalidate>

    <div class = "add-input-style">

    <div class = "input-style">
      <div class = "column">
    <label>Name:</label>
    <p id ="name_feedback" class ="feedback-style <?php echo ($name_feedback) ? '' : 'hidden'; ?>">Please enter the villager's name</p>
    <input class = "text-style" type ="text" name ="name_input" id = "name_input" placeholder = "Enter new villager's name" value = <?php echo htmlspecialchars($name_input);?> >
      </div>
    </div>

    <div class = "input-style">
      <div class = "column">
    <label>Species:</label>
    <p id ="species_feedback" class = "feedback-style <?php echo ($species_feedback) ? '' : 'hidden'; ?>">Please enter the villager's species</p>
    <input class = "text-style" type ="text" name ="species_input" id = "species_input" placeholder = "Enter new villager's species" value = <?php echo htmlspecialchars($species_input);?> >
      </div>
    </div>

    <div class = "input-style">
      <div class = "column">
    <label>Personality:</label>
    <p id ="personality_feedback" class="feedback-style <?php echo ($personality_feedback) ? '' : 'hidden'; ?>">Please enter the villager's personality</p>
    <input class = "text-style" type ="text" name = "personality_input" id = "personality_input" placeholder = "Enter new villager's personality" value = <?php echo htmlspecialchars($personality_input);?> >
      </div>
    </div>

    <div class = "input-style">
      <div class = "column">
    <label>Birthday month:</label>
    <input class = "text-style" type = "text" name = "birthday_input" placeholder = "Enter new villager's birthday month (optional)" value = <?php echo htmlspecialchars($birthday_input);?> >
      </div>
    </div>

    </div>

<button class = "submit-style" type ="submit"><strong>Add to database</strong></button>
</form>
<?php } ?>

</main>
</body>
</html>
