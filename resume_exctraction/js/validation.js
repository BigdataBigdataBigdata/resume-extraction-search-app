function validate_registration()
{
    var email = $('#email').val();
    var atpos=email.indexOf("@");
var dotpos=email.lastIndexOf(".");
if (atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length)
  {
  alert("Not a valid e-mail address");
  $('#email').focus();
  return false;
  }
}

