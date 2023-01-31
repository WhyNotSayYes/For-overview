jQuery(function($) {
    //adding to favorite
    $('body').on('click', '.add-favorite', function() {
        var post_id = $(this).data('post_id');
        $.ajax({
            url: "/wp-admin/admin-ajax.php",
            type: 'POST',
            data: {
                'action': 'favorite',
                'post_id': post_id,
            },
            success: function(data) {
                $('.fv_' + post_id).addClass('delete-favorite');
                $('.fv_' + post_id).removeClass('add-favorite');
            },
        });
    });
    //deleting from favorite
    $('body').on('click', '.delete-favorite', function() {
        var post_id = $(this).data('post_id');
        $.ajax({
            url: "/wp-admin/admin-ajax.php",
            type: 'POST',
            data: {
                'action': 'delfavorite',
                'post_id': post_id,
            },
            success: function(data) {
                $('.fv_' + post_id).addClass('add-favorite');
                $('.fv_' + post_id).removeClass('delete-favorite');
            },
        });
    });
});