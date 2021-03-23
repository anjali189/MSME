var emailInput;

$("#email-input").on("change", function() {
  emailInput = $(this).val();

  if (validateEmail(emailInput)) {
    $(this).css({
      color: "blue",
     
     
    });
  } else {
    $(this).css({
      color: "red",
      border: "1px solid red"
    });

    // alert("not a valid email address");
  }
});

$("#submit").on("click", function(e) {
  // e.preventDefault();
  if (validateEmail(emailInput)) {
    alert("you did it!");
  } else {
    alert('please check your email');
    return false;
  }
});

function validateEmail(email) {
  var pattern = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;

  return $.trim(email).match(pattern) ? true : false;
}
