// Get User Data via PHP
let userData = sessionHelper.getItem("user");
if(!userData){
    $.ajax({
        type: "GET",
        url: "/php/Helpers/sessionHelper.php",
        data: {
            action: "fullname"
        },
        beforeSend: function() {
            // jQuery("#instagram .section-title").addClass("section-title--loading");
        },
        complete: function(){
            // jQuery("#instagram .section-title").removeClass("section-title--loading");
        },
        success: function(response){
            // Populate 
            let jsonResponse = JSON.parse(response);
            if(jsonResponse){
                sessionHelper.setItem("user",jsonResponse)
                popuplateUserData(jsonResponse);
            }else{
                console.log("Unable to retrieve user Data");
            }
        },
        error: function(response){
            console.log("Unable to retrieve user Data");
        }
    });
}else{
    popuplateUserData(userData);
}

// Populate results, callback to run next function if available
function popuplateUserData(data){
    jQuery("#userName")[0].innerHTML = " - " + data["firstName"] + " " + data["lastName"];
}
