$(document).ready(function () {

    $("add-villager_form").on("submit", function (){
    var valid_form = true;

    if ($("#name_input").prop("validity").valid) {
      $("#name_feedback").addClass("hidden");
    } else {
      $("#name_feedback").removeClass("hidden");
      valid_form = false;
    }

    if ($("#species_input").prop("validity").valid) {
      $("#species_feedback").addClass("hidden");
    } else {
      $("#species_feedback").removeClass("hidden");
      valid_form = false;
    }
    if ($("#personality_input").prop("validity").valid) {
        $("#personality_feedback").addClass("hidden");
    } else {
      $("#personality_feedback").removeClass("hidden");
      valid_form = false;
    }

    return valid_form;

    })

  });
