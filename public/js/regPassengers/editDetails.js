$(document).ready(function() {
    // Show the edit button initially
    $('.btn-info').show();


    // Edit button click event
    $('#editButton').click(function() {
        // Show/hide elements to switch from displaying details to editable fields
        $('.text-secondary').each(function() {
            var text = $(this).text().trim();
            $(this).html('<input type="text" class="form-control" value="' + text + '">');
        });

    // Show the save/cancel buttons and hide the edit button
        $('#editButton').hide();
        $('#saveButton').show();
        $('#cancelButton').show();
    });

    $('#cancelButton').click(function() {
        
        // Revert back to displaying details and hide the save/cancel buttons
        $('.text-secondary').each(function() {
            var fieldClass = $(this).prev().find('h6').text(); // Get the field name from the previous h6 element
            var originalText = originalTexts[fieldClass.trim()]; // Retrieve the original text based on the field name
            $(this).text(originalText);
        });
      
        $('#editButton').show();
        $('#saveButton').hide();
        $('#cancelButton').hide();
      });

      $('#saveButton').click(function() {
        // Gather updated data from the input fields
        var updatedData = {}; // Create an object to store updated data
      
        // Extract updated data from input fields and store it in the updatedData object
        $('.text-secondary input').each(function() {
          var fieldName = $(this).closest('.row').find('h6').text().trim(); // Get the field name from the previous h6 element
          var updatedValue = $(this).val(); // Get the updated value from the input field
          updatedData[fieldName] = updatedValue; // Store the updated value in the updatedData object
        });

        
      
        // Perform AJAX request to send updated data to the server
        $.ajax({
          type: 'POST',
          url: 'http://localhost/SeamlessBus/regPassengers/profile', // Replace with your server-side script URL to handle the update
          data: updatedData, // Send the updated data to the server
          success: function(response) {
            // Update the UI with the new details without reloading the page
            // Assuming 'response' contains updated data from the server or use 'updatedData' object
      
            $('.text-secondary').each(function() {
              var fieldName = $(this).prev().find('h6').text().trim(); // Get the field name
              var updatedValue = response[fieldName]; // Use the field name to get updated value from the response
      
              // Update the UI with the new value
              $(this).text(updatedValue);
            });
            
            // Show success message
            $('#successMessage').show(); // Show the success message

            // Hide success message after a few seconds (optional)
            setTimeout(function() {
                $('#successMessage').hide();
            }, 3000); // Hide after 3 seconds (adjust as needed)
            
            
      
            // Once the update is successful, perform these actions:
            // Show the edit button, hide the save/cancel buttons
            $('#editButton').show();
            $('#saveButton').hide();
            $('#cancelButton').hide();
          },
          error: function(err) {
            // Handle error if the update fails
          }
        });
      });


});
