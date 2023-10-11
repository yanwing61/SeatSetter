jQuery(window).on("load", function() {
    $(function() {
        // Make the element with class 'draggable' draggable
        $(".draggable").draggable();

        // Make the element with class 'droppable' droppable
        $(".droppable").droppable({
            drop: function(event, ui) {
                $(this).addClass("ui-state-highlight");
                $(this).find(".msg").html(" - Assigned to this table!");

            },
            out: function(event, ui) {
                if (!$(this).has(".draggable").length) {
                    $(this).removeClass("ui-state-highlight");
                    $(this).find(".msg").html("");
                }
            }
        });
    });
});
