$(function(){
	$("body").delegate("input.upload-image", "change", function(){
	    var a = $(this).parent();
	    var b = a.parent();
		if (this.files[0]) {
		    	var fr = new FileReader();

		    fr.addEventListener("load", function () {
		      	a.css("background-image","url(" + fr.result + ")");
		    }, false);
		    fr.readAsDataURL(this.files[0]);
		    b.children("input[name='"+$(this).attr('udalit')+"[]']").attr('name','remove[]');
		}
	});
	$(".addInput").click(function(e){
		e.preventDefault();
		$(this).prev().after('<div class="form-group floatLeft field-service-image"><label class="upload-label"><input type="file" class="upload-image" name="'+$(this).attr('model')+'"><span class="btn btn-app btn-danger btn-xs udalit"><i class="ace-icon fa fa-trash-o bigger-200"></i></span></label></div>');
		
	});
	$(document).on('click', ".udalit", function(e){
		e.preventDefault();
		if($("label.upload-label .udalit").length!=1){
			$(this).parent().parent().children("input[name='"+$(this).attr('udalit')+"[]']").attr('name','remove[]');
			$(this).parent().remove();
		}
		else{
			$(this).css("background","lime");
		}
	});
	// $("label.upload-label .udalit").eq(0).remove();
	function remove(url,son){
		$.ajax({
          url: url,
          type: 'POST',
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          data: {
            remove: son
          },
        })
        .done(function(list) {
        	console.log(list);
        })
        .fail(function() {
            alert("Errorr");
        });
	}
})