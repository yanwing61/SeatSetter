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

    $(".draggable").draggable({
        start: function(event, ui) {
            // Remember the original parent before dragging starts
            originalParent = $(this).parent();
        }
    });

    $(".droppable").droppable({  
        
        drop: function(event, ui) {
            $(ui.draggable).detach().css({top: 0, left: 0}).appendTo($(this));
            var currentGuestsCount = $(this).find('.draggable').length;
            console.log("currentGuestsCount: "+currentGuestsCount);
        
            var tableGuestLimit = parseInt($(this).data('limit'));
            console.log("Limit: "+tableGuestLimit);

            // Check if the table can accommodate another guest
            if (currentGuestsCount > tableGuestLimit) {
                // If the table's limit is reached, prevent the drop and alert the user
                alert('This table is full!');
                $(ui.draggable).detach().css({top: 0, left: 0}).appendTo(originalParent);
                
            } else {
                $(ui.draggable).detach().css({top: 0, left: 0}).appendTo($(this));

                $(this).addClass("ui-state-highlight");
                $(this).find(".msg").html(" - Assigned");
                
                var guest_id = $(ui.draggable).data("name");
                var table_id = $(this).data("name");
                
                seatingAssignments[guest_id] = table_id;
                console.log('Current Seating Assignments:', seatingAssignments);
        
                updateSeatingInput();
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
