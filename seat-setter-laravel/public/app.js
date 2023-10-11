jQuery(window).on("load", function() {
    var seatingAssignments = {}; //empty object to store the assignment

    $(".draggable").draggable({
        revert: "invalid",  // Make the guest snap back if not dropped on a table
        stop: function() {  // This triggers when dragging stops
            // Remove the guest ID from the assignments if it's not assigned to any table
            var guest_id = $(this).data("name");
            if (!$(this).closest(".droppable").length) {
                delete seatingAssignments[guest_id];
                updateSeatingInput();
            }
        }
    });

    $(".droppable").droppable({
        drop: function(event, ui) {
            $(this).addClass("ui-state-highlight");
            $(this).find(".msg").html(" - Assigned to this table!");

            // Update the seatingAssignments object
            var guest_id = $(ui.draggable).data("name");
            var table_id = $(this).data("name");
            console.log(guest_id+' & '+table_id);
            seatingAssignments[guest_id] = table_id;
            updateSeatingInput();
        },
        out: function(event, ui) {
            if (!$(this).has(".draggable").length) {
                $(this).removeClass("ui-state-highlight");
                $(this).find(".msg").html("");
            }
        }
    });

    // This function will serialize the seatingAssignments object and update the hidden input
    function updateSeatingInput() {
        $('#seating_assignments').val(JSON.stringify(seatingAssignments));
    }
});
