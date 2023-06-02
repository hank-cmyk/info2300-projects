<!DOCTYPE html>
<html lang="en">


<?php if ($title == "About Me") { ?>
    <?php echo $aboutHeader?>

<?php } else if ($title == "School Facts") {?>
    <div class = "header-intro-style"> <?php echo $schoolHeader?></div>

<?php } else if ($title == "General Facts") {?>
    <div class = "header-intro-style"><?php echo $generalHeader?></div>

<?php } else if ($title == "Fun Facts") {?>
    <div class = "header-intro-style"><?php echo $funHeader?></div>

<?php } else if ($title == "Photos") {?>
    <div class = "header-intro-style"><?php echo $photosHeader?></div>

<?php } else { ?>
    <div class = "header-intro-style"><?php echo $poemHeader?></div>

<?php } ?>


</html>
