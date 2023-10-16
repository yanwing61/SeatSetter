jQuery(window).on("load", function() {
    var seatingAssignments = {}; //empty object to store the seat assignments

    $('.draggable').each(function() {
        var guest_id = $(this).data("name");
        var closest_droppable = $(this).closest('.droppable');
        if (closest_droppable.length) {
            var table_id = closest_droppable.data('name');
            seatingAssignments[guest_id] = table_id;
        }
    });

    $(".draggable").draggable();

    $(".droppable").droppable({
        drop: function(event, ui) {
        // Calculate the current number of guests at the table
        var currentGuestsCount = $(this).find('.draggable').length;
        console.log(currentGuestsCount);

        // Fetch the table's guest limit from its data attribute
        var tableGuestLimit = parseInt($(this).data('limit'));
        console.log(tableGuestLimit);

        // Check if the table can accommodate another guest
        if (currentGuestsCount < tableGuestLimit) {
            $(this).addClass("ui-state-highlight");
            $(this).find(".msg").html(" - Assigned");
            
            var guest_id = $(ui.draggable).data("name");
            var table_id = $(this).data("name");
            
            seatingAssignments[guest_id] = table_id;
            console.log('Current Seating Assignments:', seatingAssignments);
    
            updateSeatingInput();
        } else {
            // If the table's limit is reached, prevent the drop and alert the user
            ui.draggable.draggable('option','revert',true);
            alert('This table is full!');
        }
    },
        
        out: function(event, ui) {
            if (!$(this).has(".draggable").length) {
                $(this).removeClass("ui-state-highlight");
                $(this).find(".msg").html("");
            }
        }
    });

    // Serialize the seatingAssignments object and update the hidden input
    function updateSeatingInput() {
        $('#seating_assignments').val(JSON.stringify(seatingAssignments));
    }

    $('form').on('submit', function(e) {
        // Log the final seatingAssignments object to the console
        // updateSeatingInput();
        // console.log(seatingAssignments);
        // e.preventDefault();

        e.preventDefault();

    // Wait a few milliseconds to ensure all UI events have processed
    setTimeout(() => {
        updateSeatingInput();
        console.log(seatingAssignments);
        $(this).unbind('submit').submit();
    }, 100);
    });

});
