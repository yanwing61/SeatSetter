jQuery(window).on("load",function(){
    $( function() {
    // Make the element with ID 'draggable' draggable
        $(".draggable").draggable();

    // Make the element with ID 'droppable' droppable
    $(".droppable").droppable({
        drop: function(event, ui) {
            // console.log('drop!');
            $(this).addClass("ui-state-highlight");
            $(this).find(".msg").html("Assigned to this table!");
        }
    });
});        

});
