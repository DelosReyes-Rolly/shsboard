
    // numbers only
    function onlyNumberKey(evt) {
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
    }
    
    // letters only
    function alphaOnly(event) { var key = event.keyCode; return ((key >= 65 && key <= 90) || key == 8 || key==32 || key==13 || key==190); } 