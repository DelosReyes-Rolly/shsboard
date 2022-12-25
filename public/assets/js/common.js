$(document).ready(function(){
    purposeDisplay();
    proofNeeded();
});

function purposeDisplay(){
    $(".purposes").click(function(){
		$(".purposeText").hide();
	});
	$(".others").click(function(){
		$(".purposeText").show();
	});
}

function proofNeeded(){
    $("#document_type").change(function () {
        var proof_needed = $(this).children(':selected').data('proof');
        console.log(proof_needed);
        
        $("#proof").val(proof_needed);  
    });
}