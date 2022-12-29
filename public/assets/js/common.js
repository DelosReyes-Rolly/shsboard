$(document).ready(function(){
    proofNeeded();
});


function proofNeeded(){
    $("#purpose").change(function () {
        var proof_needed = $(this).children(':selected').data('proof');
        console.log(proof_needed);
        
        $("#proof").val(proof_needed);  
    });
}