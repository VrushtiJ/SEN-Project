function($){
$("btn ").click(function() {
    var $item = $(this).closest("tr")   // Finds the closest row <tr> 
                       .find(".nr")     // Gets a descendent with class="nr"
                       .text();         // Retrieves the text within <td>

    $("#resultas").append($item);       // Outputs the answer
});
}
