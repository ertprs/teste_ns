<script src="js/funcoes.js"></script>
<script src="tinymce/tinymce.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.3.8/plugins/imagetools/plugin.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.3.8/plugins/image/plugin.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="plugins/bootstrap/js/tether.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="js/jquery.slimscroll.js"></script>
<!--Wave Effects -->
<script src="js/waves.js"></script>
<!--calendario -->
<script src="js/calender.js"></script>
<script src="calendario/moment.min.js"></script>
<script src="calendario/fullcalendar.min.js"></script>
<!--Menu sidebar -->
<script src="js/sidebarmenu.js"></script>
<!--stickey kit -->
<script src="plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
<!--Custom JavaScript -->
<script src="js/custom.js"></script>

<script src="js/jquery-clockpicker.min.js"></script>
<!-- ============================================================== -->
<script type="text/javascript" src="js/jquery.mask.min.js"></script>
<script type="text/javascript" src="js/setup.js"></script>


<script>

    $(document).ready(function() {
     tinymce.init({
        selector: 'textarea.editor',
        language : "pt_BR",
        content_css: 'https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css',
        noneditable_noneditable_class: 'fa',
        plugins : 'fontawesome noneditable advlist autolink link image media lists table charmap paste print preview code imagetools textcolor',
        extended_valid_elements: 'span[*]',
        statusbar: true,
        menubar: true,
        toolbar: 'styleselect | removeformat | undo | redo | bold | italic | code | link | image | media | table | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | fontawesome | forecolor backcolor',
        browser_spellcheck : true,
        paste_as_text: true,
        image_caption: true,
        file_browser_callback: function(field, url, type, win) {
            tinyMCE.activeEditor.windowManager.open({
                file: '../kcfinder/browse.php?opener=tinymce4&lang=pt-br&field=' + field + '&type=' + type,
                title: 'KCFinder',
                width: 700,
                height: 600,
                inline: false,
                close_previous: false
            }, {
                window: win,
                input: field
            });
            return false;
        }
    });
 });

    $("textarea.editor").bind("input", function(e) {
        while($(this).outerHeight() < this.scrollHeight + parseFloat($(this).css("borderTopWidth")) + parseFloat($(this).css("borderBottomWidth")) &&
          $(this).height() < 500
          ) {
            $(this).height($(this).height()+1);
    };
});


</script>





</body>
</html>