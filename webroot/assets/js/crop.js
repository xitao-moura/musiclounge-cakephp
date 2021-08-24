//window.addEventListener('DOMContentLoaded', function () {
	var cropBoxData;
	var canvasData;
	var cropper;

	$('#modal-foto-avatar').on('shown.bs.modal', function () {
		console.log('modal');
		var Cropper = window.Cropper;
		var container = document.querySelector('.img-container.img-avatar');
		var imageAvatar = container.getElementsByTagName('img').item(0);
		var download = document.getElementById('download');
		var actions = document.getElementById('actions');
		var dataX = document.getElementById('dataX');
		var dataY = document.getElementById('dataY');
		var dataHeight = document.getElementById('dataHeight');
		var dataWidth = document.getElementById('dataWidth');
		var dataRotate = document.getElementById('dataRotate');
		var dataScaleX = document.getElementById('dataScaleX');
		var dataScaleY = document.getElementById('dataScaleY');

		var options = {
	        aspectRatio: 1 / 1,
	        preview: '.img-preview',
	        ready: function (e) {
	          console.log(e.type);
	        },
	        cropstart: function (e) {
	          console.log(e.type, e.detail.action);
	        },
	        cropmove: function (e) {
	          console.log(e.type, e.detail.action);
	        },
	        cropend: function (e) {
	          console.log(e.type, e.detail.action);
	        },
	        crop: function (e) {
	          var data = e.detail;

	          console.log(data);
	        },
	        zoom: function (e) {
	          console.log(e.type, e.detail.ratio);
	        }
	    };
		var cropper = new Cropper(imageAvatar, options);

		// Import image
		var inputImage = document.getElementById('inputImage');
		var URL = window.URL || window.webkitURL;
		var blobURL;

		if (URL) {
			inputImage.onchange = function () {
			  var files = this.files;
			  var file;

			  if (cropper && files && files.length) {
			    file = files[0];

			    if (/^image\/\w+/.test(file.type)) {
			      blobURL = URL.createObjectURL(file);
			      cropper.reset().replace(blobURL);
			      inputImage.value = null;
			    } else {
			      window.alert('Please choose an image file.');
			    }
			  }
			};
		} else {
			inputImage.disabled = true;
			inputImage.parentNode.className += ' disabled';
		}

		$('#btn-salvar-foto-avatar').click(function(){

			cropper.getCroppedCanvas().toBlob(function (blob) {
			  var formData = new FormData();

			  formData.append('avatar', blob);
			  formData.append('_csrfToken', $("input[name=_csrfToken]").val());
			  	$('.loading.avatar').addClass('active');
				$.ajax({
			        type: 'POST',
			        url: base_url + 'users/upload',
			        data: formData,
			        processData: false,
			        contentType: false,
			        success: function(data){
			        	$('.img-avatar').attr('src', 'https://musiclounge.com.br' + '/assets/images/users/' + data);
			        	$('.loading.avatar').removeClass('active');
				    	$('#modal-foto-avatar').modal('hide');
			  		}
			    })
			  	.done(function (data) {
			        console.log(data);
			    });
			});
		});
	}).on('hidden.bs.modal', function () {
		cropBoxData = cropper.getCropBoxData();
		canvasData = cropper.getCanvasData();
		cropper.destroy();
	});
//});