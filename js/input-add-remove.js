var MAX_OPTIONS = 5;
var numOptions = 1;
$(document).ready(function(){
    $('#survey_form')
        // add button click handler
        .on('click', '.addButton', function() {
            if(numOptions < MAX_OPTIONS) {
                $('#option' + (numOptions + 1)).attr('name', 'options[' + numOptions + ']');
                var $template = $('#option_template'),
                $clone = $template
                                .clone()
                                .removeClass('hide')
                                .removeAttr('id')
                                .insertBefore($template);
                numOptions++;
            }
        })

        // Remove button click handler
        .on('click', '.removeButton', function() {
            var $row    = $(this).parents('.input-group');

            // Remove element containing the option
            $row.remove();
            numOptions--;
        })
});
