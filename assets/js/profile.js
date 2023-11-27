alert("jQuery version: " + $.fn.jquery);
$(document).ready(function () {
    $("#profileForm").submit(function (event) {
        event.preventDefault();
        var name = $("#name").val();
        var dob = $("#dob").val();
        var number = $("#number").val();
        var age = $("#age").val();
        var location = $("#location").val();
        if (!name.trim() || !dob.trim() || !number.trim() || !age.trim() || !location.trim()) {
            showAlert("Please fill in all required fields");
            return;
        }
        var formData = {
            name: name,
            dob: dob,
            number: number,
            age: age,
            location: location,
        };
        $.ajax({
            type: "POST",
            url: "profile.php",
            data: formData,
            dataType: "json",
            success: function (response) {
                if (response.status === "success") {
                    $("#successMessage").text(response.message).show();
          $("#profileForm input, #profileForm select").prop("disabled", true);
          $("#saveButton").hide();
          $("#editButton").prop("disabled", false).show();
                } else {
                    showAlert("Failed to save profile: " + response.message);
                }
            },
            error: function (error) {
                console.error("Error:", error);
            },
        });
    });
});
