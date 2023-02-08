   // Example starter JavaScript for disabling form submissions if there are invalid fields
   (function () {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
        .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                } else {
                    event.preventDefault();  // event.default or form submit
                    formPost();  // call function whatever you want
                }
                form.classList.add('was-validated')
            }, false)
        })
})()
    // numbers only
    function onlyNumberKey(evt) {
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
    }

    function CKupdate() {
        for (instance in CKEDITOR.instances)
            CKEDITOR.instances[instance].updateElement();
      }

    // letters only
    function alphaOnly(event) { var key = event.keyCode; return ((key >= 65 && key <= 90) || key == 8 || key==32 || key==13 || key==190); } 