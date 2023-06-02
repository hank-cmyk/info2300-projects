<?php include("includes/init.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="styles/site.css">

  <title>Animal Crossing Villagers</title>
</head>

<?php

$search_input = '';

$db = open_sqlite_db("secure/catalog.sqlite");

$show_user_search = FALSE;
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  $search_input = $_GET['search_bar'];
  $search_input = trim(
    str_replace(' ', '', ucfirst(strtolower($search_input))));


  if (!empty($search_input)) {
    $show_user_search = TRUE;
  }
}

function print_record($record){
?>
  <tr>
    <td><?php echo htmlspecialchars($record["name"]); ?></td>
    <td><?php echo htmlspecialchars($record["species"]); ?></td>
    <td><?php echo htmlspecialchars($record["personality"]); ?></td>
    <td><?php echo htmlspecialchars($record["birthday"]); ?></td>
  </tr>
<?php
}

?>

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

<?php if ($show_user_search) {?>
  <div class = "header-style">
  <h2> Villager Database </h2>
  <form action="index.php" method="get">
    <button class = "back-style" type="submit"><strong>Back to all villagers</strong></button>
  </form>
    </div>
</div>

<hr/>

<?php
$sql = "SELECT * FROM villagers WHERE ( (name LIKE '%'||:search||'%') || (species LIKE '%'||:search||'%') || (personality LIKE '%'||:search||'%') || (birthday LIKE '%'||:search||'%')  );";
$params = array(
  ':search' => $search_input
);
$records = exec_sql_query($db, $sql, $params)->fetchAll();
if (count($records) > 0) { ?>
<div class = "row">
  <table>
    <tr>
      <th>Name</th>
      <th>Species</th>
      <th>Personality</th>
      <th>Birthday</th>
    </tr>
    <?php

    foreach ($records as $record) {
      print_record($record);
    } ?>
  </table>
  </div>

  <?php
  } else { ?>

  <p class = "sorry-style">Sorry! We couldn't find what you were looking for.</p>

  <?php
  }
} else { ?>

<div class = "header-style">
  <h2> Villager Database </h2>
<div class = "row">
  <form action="index.php" method="get">
      <div class = "row">
      <div class = "column">
    <label class = "label-index-style">Search for a villager by: <em>name, species, personality, </em><strong>OR</strong> <em>birthday month</em></label>
    <input class = "input-index-style" type="text" name="search_bar" placeholder = "Enter villager name, species, personality, or birthday month">
      </div>
    <button class = "search-button-style" type="submit"><strong>Search</strong></button>
      </div>
  </form>

  <form action = "add-villager.php" method = "get">
    <button class = "add-index-style" type = "submit"><strong>Add a new villager!</strong></button>
  </form>
</div>
    </div>
</div>

<hr/>
<?php
  $sql = "SELECT * FROM villagers;";
  $result = exec_sql_query($db, $sql);
?>

<table>
      <tr>
        <th>Name</th>
        <th>Species</th>
        <th>Personality</th>
        <th>Birthday</th>
      </tr>
      <?php
      $records = $result->fetchAll();
      foreach($records as $record) {
        print_record($record);
      }
      ?>
</table>

<?php } ?>

</main>
</body>
</html>
