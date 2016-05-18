window.onload = function () {

    (function($) {
        $('.remove-pp-img').click(function (event) {
            var removeId = $(this).data('pp-id');

            $.post('/wp-content/plugins/pp-gallery/', {removeId: removeId}, function (response) {
                location.reload();
            });
        });

        $(function(){

            var progressbar = $("#progressbar"),
                bar         = progressbar.find('.uk-progress-bar'),
                postID      = $('#postID').val(),
                settings    = {

                    action: '/wp-content/plugins/pp-gallery/?postID=' + postID, // upload url

                    allow : '*.(jpg|jpeg|gif|png)', // allow only images

                    loadstart: function() {
                        bar.css("width", "0%").text("0%");
                        progressbar.removeClass("uk-hidden");
                    },

                    progress: function(percent) {
                        percent = Math.ceil(percent);
                        bar.css("width", percent+"%").text(percent+"%");
                    },

                    allcomplete: function(response) {

                        bar.css("width", "100%").text("100%");

                        setTimeout(function(){
                            progressbar.addClass("uk-hidden");
                        }, 250);

                        location.reload();
                    }
                };

            var select = UIkit.uploadSelect($("#upload-select"), settings),
                drop   = UIkit.uploadDrop($("#upload-drop"), settings);
        });
    })(jQuery);
};