(function ($) {
    $('.field-item').draggable({
        connectToSortable: '.group-list',
        items: '> div',
        helper: 'clone',
        start: function (event, ui) {
            $(ui).css('width', '313px');
        },
        cursor: "all-scroll"
    });
    $('.group-list').sortable({
        items: '> div',
        helper: 'clone',
        receive: function (event, ui) {
            var cnt = 0;
            $(this).children().each(function (i, e) {
                if ($(ui.item).data('key') == $(e).data('key')) {
                    cnt++;
                    if (cnt > 1) $(e).remove();
                }
            });
        },
        update: function (event, ui) {
            var sender = ui.sender,
                item = $(ui.item);
            var group = item.data('group');
            var label = group.charAt(0).toUpperCase() + group.slice(1) + ' ' + item.find('span').html();
            item.html(label);
            item.append('<input type="hidden" name="fields[' + item.data('key') + ']" value="' + label + '"/>');
            item.append('<button type="button" name="remove_item" onclick="removeItem(this)"><span class="dashicons dashicons-trash"></span></button>')
        }
    });

})(jQuery);

function removeItem(e) {
    jQuery(e).parent('.field-item').remove();
}