$(function() {
  // Modern Wizard
  // --------------------------------------------------------------------

  var bsStepper = document.querySelectorAll('.bs-stepper'),
    select = $('.select2'),
    modernWizard = document.querySelector('.modern-wizard-example'),
    form = $('#wizard-form');

    form.validate({
      rules: {
        first_name: {
          required: true
        },
        last_name: {
          required: true
        },
        email: {
          required: true
        },
        last_name: {
          required: true
        },
      }
    });

  if (typeof modernWizard !== undefined && modernWizard !== null) {
    var modernStepper = new Stepper(modernWizard, {
      linear: false
    });
    $(modernWizard)
      .find('.btn-next')
      .on('click', function () {
        var isValid = form.valid();
        if (isValid) {
          modernStepper.next();
        } else {
          e.preventDefault();
        }
      });
    $(modernWizard)
      .find('.btn-prev')
      .on('click', function () {
        modernStepper.previous();
      });

    $(modernWizard)
      .find('.btn-submit')
      .on('click', function () {
        alert('Submitted..!!');
      });
  }
});
