
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
	tinymce.init({
		selector: 'textarea.editor',
		plugins: 'a11ychecker advcode casechange formatpainter linkchecker lists media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinydrive tinymcespellchecker advlist autolink link media table charmap paste print preview code imagetools textcolor anchor',
		toolbar: 'tools tc| undo redo| removeformat| fontsizeselect fontselect | insertfile | forecolor backcolor  bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link | print preview fullpage',
		language : "pt_BR",
		statusbar: false,
		menubar: false,
		browser_spellcheck : false,
		paste_as_text: true,
		image_caption: false,
		image_title: false,
		automatic_uploads: false,

		file_picker_types: 'image',

		file_picker_callback: function (cb, value, meta) {
			var input = document.createElement('input');
			input.setAttribute('type', 'file');
			input.setAttribute('accept', 'image/*');

			input.onchange = function () {
				var file = this.files[0];

				var reader = new FileReader();
				reader.onload = function () {
					
					var id = 'blobid' + (new Date()).getTime();
					var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
					var base64 = reader.result.split(',')[1];
					var blobInfo = blobCache.create(id, file, base64);
					blobCache.add(blobInfo);

					cb(blobInfo.blobUri(), { title: file.name });
				};
				reader.readAsDataURL(file);
			};

			input.click();
		},

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