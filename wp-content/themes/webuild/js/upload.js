jQuery(document).ready(function ($) {

    if ($('.apro_upload_button').length >= 1) {

        window.apro_uploadfield = '';


        $('.apro_upload_button').live('click', function () {

            window.apro_uploadfield = $('.upload_field', $(this).parent());

            tb_show('Upload', 'media-upload.php?type=image&TB_iframe=true', false);


            return false;

        });


        window.apro_send_to_editor_backup = window.send_to_editor;

        window.send_to_editor = function (html) {

            if (window.apro_uploadfield) {

                if ($('img', html).length >= 1) {

                    var image_url = $('img', html).attr('src');

                } else {

                    var image_url = $($(html)[0]).attr('href');

                }

                $(window.apro_uploadfield).val(image_url);

                window.apro_uploadfield = '';


                tb_remove();

            } else {

                window.apro_send_to_editor_backup(html);

            }

        }

    }

});