<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1" />

 <title> <?php echo $title;?> </title>

  <link rel="stylesheet" type="text/css" href="styles/theme2.css">

</head>

<?php
include("includes/init.php");

$title = "About Me";
$aboutLine = "class = 'nav-style' ";

$aboutHeader = '"I am nobody! Who are you? Are you a nobody too?"';

$grade = "sophomore";

$showForm = TRUE;

$name = '';
$netid = '';

$nameFeedback = FALSE;
$netidFeedback = FALSE;
$contactFeedback = FALSE;
$dayFeedback = FALSE;


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $validOrder = TRUE;

  $name = trim($_POST['name']);
  $name = filter_var($name, FILTER_SANITIZE_STRING);

  $netid = trim($_POST['netid']);
  $netid = filter_var($netid, FILTER_SANITIZE_STRING);

  if ((empty($name)) && ($_SERVER['REQUEST_METHOD'] == 'POST')){
    $validOrder = FALSE;
    $nameFeedback = TRUE;
  } else {
    $nameFeedback = FALSE;

  }

  if ((empty($netid)) && ($_SERVER['REQUEST_METHOD'] == 'POST')){
    $validOrder = FALSE;
    $netidFeedback = TRUE;
  } else {
    $netidFeedback = FALSE;

  }

  if ((!isset($_POST['contact'])) && ($_SERVER['REQUEST_METHOD'] == 'POST')) {
    $validOrder = FALSE;
    $contactFeedback = TRUE;
  } else {
    $contactFeedback = FALSE;
  }

  if ((!isset($_POST['day'])) && ($_SERVER['REQUEST_METHOD'] == 'POST')) {
    $validOrder = FALSE;
    $dayFeedback = TRUE;
  } else {
    $dayFeedback = FALSE;
  }

  $showForm = !$validOrder;

}
?>

<body>
<header>
    <h1> <?php echo $title;?> </h1>

   <nav> <?php include("includes/navigation.php");?> </nav>

   <blockquote><em><?php include("includes/header-intro.php");?></em>- Emily Dickinson</blockquote>
   <hr/>

</header>

<main>

    <div class = "row">
      <div class = "portrait">
    <!-- Source: (original photo) Hanna Kang -->
    <img src = "images/me.png" alt = "A photo of me" class = "left-align">
      </div>
      <div class = "column">
    <p class = "intro-style"> Hello, my name is Hanna Kang! I'm currently a <?php echo $grade;?> studying UX design and English. Thank you for checking out this site to get to know me at least a little bit better. Hopefully it'll be pretty useful! </p>

    <p class = intro-style>Feel free to contact me via email, at <strong><em>hak63@cornell.edu</em></strong>. If you would like to meet in person, let me know by answering some questions below! </p>
    </div>
  </div>

  <hr/>

  <?php if ($showForm) { ?>
  <form id="hangout-form" method="post" action="index.php" novalidate>

      <!-- name -->
    <?php if ($nameFeedback == TRUE) { ?>
      <p class = "feedback-style">*Please enter your name</p>
    <?php } ?>

    <div class="input-style">
    <div class="row">
    <label for="request-name">
        Name: </label>
    <input id="request-name" type = "text" name = "name" value = "<?php echo htmlspecialchars($name);?>"/>
    </div>
    </div>

    <!-- netid -->
    <?php if ($netidFeedback == TRUE) {  ?>
      <p class = "feedback-style">*Please enter your netID</p>
    <?php } ?>

    <div class = "input-style">
    <div class = "row">
    <label for="request-netid">
      NetID: </label>
    <input id = "request-netid" type = "text" name = "netid" value = "<?php echo htmlspecialchars($netid);?>" />
    </div>
    </div>

    <!-- contact method -->
    <?php if ($contactFeedback == TRUE) { ?>
		  <p class = "feedback-style"> *Please check at least one method of contact </p>
    <?php } ?>

    <div class="input-style">
    <label for = "request-messenger">
        Preferred Contact Method(s):</label>

        <div class = "column">
          <div class = "row">
          <!-- sticky form: if the value = facebook messenger is in the contact array, then make it checked -->
  <input id="request-messenger" type="checkbox" name="contact[]" value = "Facebook Messenger" <?php if (!empty($_POST['contact']) && in_array("Facebook Messenger", $_POST['contact'])) echo "checked"; ?>/>
     <label for="request-messenger">Facebook Messenger</label>
          </div>

          <div class = "row">
    <input id="request-text" type="checkbox" name= "contact[]" value = "Texting" <?php if (!empty($_POST['contact']) && in_array("Texting", $_POST['contact'])) echo "checked"; ?>/>
       <label for="request-text">Texting</label>
            </div>

          <div class = "row">
    <input id="request-groupme" type="checkbox" name="contact[]" value = "GroupMe" <?php if (!empty($_POST['contact']) && in_array("GroupMe", $_POST['contact'])) echo "checked"; ?>/>
       <label for="request-groupme">GroupMe</label>
          </div>

          <div class = "row">
    <input id="request-email" type="checkbox" name="contact[]" value = "Email" <?php if (!empty($_POST['contact']) && in_array("Email", $_POST['contact'])) echo "checked"; ?>/>
      <label for="request-email">Email is fine!</label>
          </div>
        </div>
    </div>

<!-- days -->
    <?php if ($dayFeedback == TRUE) { ?>
      <p class = "feedback-style"> *Please check at least one day </p>
    <?php } ?>

    <div class="input-style">
    <label for = "request-monday">
        What day(s) are you available?</label>

        <div class = "column">
          <div class = "row">
	<input id="request-monday" type="checkbox" name="day[]" value = "Monday" <?php if (!empty($_POST['day']) && in_array("Monday", $_POST['day'])) echo "checked"; ?> />
     <label for="request-tuesday">Monday</label>
          </div>

          <div class = "row">
    <input id="request-tuesday" type="checkbox" name= "day[]" value = "Tuesday" <?php if (!empty($_POST['day']) && in_array("Tuesday", $_POST['day'])) echo "checked"; ?>/>
       <label for="request-tuesday">Tuesday</label>
          </div>

          <div class = "row">
    <input id="request-wednesday" type="checkbox" name="day[]" value = "Wednesday"  <?php if (!empty($_POST['day']) && in_array("Wednesday", $_POST['day'])) echo "checked"; ?> />
       <label for="request-wednesday">Wednesday</label>
            </div>

          <div class = "row">
    <input id="request-thursday" type="checkbox" name="day[]" value = "Thursday" <?php if (!empty($_POST['day']) && in_array("Thursday", $_POST['day'])) echo "checked"; ?>/>
      <label for="request-thursday">Thursday</label>
          </div>


          <div class = "row">
    <input id="request-friday" type="checkbox" name="day[]" value = "Friday" <?php if (!empty($_POST['day']) && in_array("Friday", $_POST['day'])) echo "checked"; ?>/>
      <label for="request-friday">Friday</label>
          </div>

          <div class = "row">
    <input id="request-saturday" type="checkbox" name="day[]" value = "Saturday" <?php if (!empty($_POST['day']) && in_array("Saturday", $_POST['day'])) echo "checked"; ?>/>
      <label for="request-saturday">Saturday</label>
          </div>

          <div class = "row">
    <input id="request-sunday" type="checkbox" name="day[]" value = "Sunday" <?php if (!empty($_POST['day']) && in_array("Sunday", $_POST['day'])) echo "checked"; ?> />
      <label for="request-sunday">Sunday</label>
          </div>

        </div>
    </div>

    <input class = "submit-style" type="submit" value="Submit"/>

  </form>

    <?php } else { ?>

      <h2 class = "confirmation-style"> Thank you, <?php echo htmlspecialchars($name) ?>! </h2>

      <br/>

      <h3 class = "confirmation-style"> NetID: <?php echo htmlspecialchars($netid) ?> </h3>

      <div class = "column">
      <div class = "confirmation-style">
        <div class = "column">
      <h4> Preferred Method(s) of Contact: </h4>
      <?php foreach ($_POST['contact'] as $value){
        echo "<li>".htmlspecialchars($value)."</li>";
        echo "<br/>";
      } ?>
        </div>
        </div>

        <div class = "confirmation-style">
        <div class = "column">
      <h4> Available Day(s): </h4>
      <?php foreach ($_POST['day'] as $value){
        echo "<li>".htmlspecialchars($value)."</li>";
        echo "<br/>";
      } ?>
      </div>
      </div>

    </div>

      <p class = "return-fun"><a href="index.php">New Form</a></p>
    <?php } ?>


</main>
</body>
</html>
