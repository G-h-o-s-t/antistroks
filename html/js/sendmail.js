/**
 * Created by ghost on 02/10/16.
 */
// form ..
var $form = $('#wf-form-Signup'),
  $email= $('#email'),
  email, type;

function sendEmail() {
  $.get('emailCollector.php', {
    'email': email,
    'type': type
  }, function (data) {
    if (data.result == 'success') {
      $('.error').addClass('hide');
      $('.success-message').removeClass('hide');
      window.setTimeout(function() { $('.close-bttn').trigger('click'); }, 3000);
    } else {
      $('.error').removeClass('hide').val('Введите e-mail');
    }
  }, 'json');
}

$form.submit(function(event) {
  event.preventDefault();
  email = $email.val();
  type = $('input[name=User-status]:checked', '#wf-form-Signup').val();

  if (email.length == 0) {
    $('.error').removeClass('hide').val('Введите e-mail');
  } else {
    sendEmail();
  }
});