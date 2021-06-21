$(function(){
    // $(".weditor").parent().append("<div class='wysiwyg-editor'>"+$(".weditor").html()+"</div>");
    // $(".weditor").hide();
    // $(".wysiwyg-editor").css("margin-bottom","25px");
    // $("body").on('DOMSubtreeModified', ".wysiwyg-editor", function() {
    //     $(this).parent().children(".weditor").val($(this).html());
    // });
    // function showErrorAlert (reason, detail) {
    //     var msg='';
    //     if (reason==='unsupported-file-type') { msg = "Unsupported format " +detail; }
    //     else {
    //         //console.log("error uploading file", reason, detail);
    //     }
    //     $('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>'+ 
    //      '<strong>File upload error</strong> '+msg+' </div>').prependTo('#alerts');
    // }
    // $('.wysiwyg-editor').ace_wysiwyg({
    //     toolbar:
    //     [
    //         'font',
    //         null,
    //         'fontSize',
    //         null,
    //         {name:'bold', className:'btn-info'},
    //         {name:'italic', className:'btn-info'},
    //         {name:'strikethrough', className:'btn-info'},
    //         {name:'underline', className:'btn-info'},
    //         null,
    //         {name:'insertunorderedlist', className:'btn-success'},
    //         {name:'insertorderedlist', className:'btn-success'},
    //         {name:'outdent', className:'btn-purple'},
    //         {name:'indent', className:'btn-purple'},
    //         null,
    //         {name:'justifyleft', className:'btn-primary'},
    //         {name:'justifycenter', className:'btn-primary'},
    //         {name:'justifyright', className:'btn-primary'},
    //         {name:'justifyfull', className:'btn-inverse'},
    //         null,
    //         {name:'createLink', className:'btn-pink'},
    //         {name:'unlink', className:'btn-pink'},
    //         null,
    //         {name:'insertImage', className:'btn-success imagesave'},
    //         {name:'saveImage', className:'btn-success imagesave'},
    //         null,
    //         'foreColor',
    //         null,
    //         {name:'undo', className:'btn-grey'},
    //         {name:'redo', className:'btn-grey'}
    //     ],
    //     'wysiwyg': {
    //         fileUploadError: showErrorAlert
    //     }
    // });
    $('.weditor').froalaEditor({
        // toolbarButtons: ['bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', '|', 'fontFamily', 'fontSize', 'color', 'inlineStyle', 'inlineClass', 'clearFormatting', '|', 'emoticons', 'fontAwesome', 'specialCharacters', '-', 'paragraphFormat', 'lineHeight', 'paragraphStyle', 'align', 'formatOL', 'formatUL', 'outdent', 'indent', 'quote', '|', 'insertLink', 'insertImage', 'insertVideo', 'insertFile', 'insertTable', '-', 'insertHR', 'selectAll', 'getPDF', 'print', 'help', 'html', 'fullscreen', '|', 'undo', 'redo'],
        imageUploadParam: 'file',
        imageUploadURL: $("meta[name='upload']").attr('content'),
        // imageUploadParams: {id: 'my_editor'},
        imageUploadMethod: 'POST',
        // toolbarButtons: ['insertImage'],
        // Set max image size to 5MB.
        imageMaxSize: 5 * 1024 * 1024,
 
        // Allow to upload PNG and JPG.
        imageAllowedTypes: ['jpeg', 'jpg', 'png', 'gif', 'bmp'],
        videoUploadURL: $("meta[name='upload']").attr('content'),
        // Set max video size to 25MB.
        videoMaxSize: 55 * 1024 * 1024,
        fileUploadURL: $("meta[name='upload']").attr('content'),
        fileMaxSize: 1024 * 1024 * 10,
        imageManagerLoadURL: $("meta[name='manager']").attr('content'),
        videoResponsive: true,
        theme: 'gray',
        zIndex: 2002,
        inlineStyles: {
            'Big Red': 'font-size: 20px; color: red;',
            'Small Blue': 'font-size: 14px; color: blue;'
        },
        inlineClasses: {
            'fr-class-code': 'Code',
            'fr-class-highlighted': 'Highlighted',
            'fr-class-transparency': 'Transparent'
        },
        enter: $.FroalaEditor.ENTER_BR,
        // documentReady: true,
        // charCounterMax: 3000,
        placeholderText: 'Start typing something...',
        pastePlain: true,
        language: 'ru',
        heightMin: 100,
        heightMax: 300,
        // dragInline: false,
        // quickInsertButtons: ['image', 'table', 'ol', 'ul', 'myButton'],
        // fontFamilySelection: true,
        // fontSizeSelection: true,
        // paragraphFormatSelection: true,
        // tabSpaces: 4
    });
    $('.form-field-tags').tagsInput({
        'unique': true,
        'minChars': 2,
        'maxChars': 70,
        'limit': 20,
        // 'validationPattern': new RegExp('^[a-zA-Zа-зА-З0-9]+$'),
        // 'autocomplete': {
        //     source: [
        //         'apple',
        //         'banana',
        //         'orange',
        //         'pizza'
        //     ]
        // },
        'delimiter': [',', ';', '|'],
        'placeholder': 'Teg yozish uchun | yoki , va ; klavishlarni bosing'
    });
    $('.date-timepicker').datetimepicker({
     // format: 'MM/DD/YYYY hh:mm:ss',//use this option to display seconds
        icons: {
            time: 'fa fa-clock-o',
            date: 'fa fa-calendar',
            up: 'fa fa-chevron-up',
            down: 'fa fa-chevron-down',
            previous: 'fa fa-chevron-left',
            next: 'fa fa-chevron-right',
            today: 'fa fa-arrows ',
            clear: 'fa fa-trash',
            close: 'fa fa-times'
        },
     // enabledHours: [9, 10, 11, 12, 13, 14, 15, 16],
        // minDate: new Date(),
        // inline: true,
        format: 'YYYY-MM-DD HH:mm A',
        showTodayButton: true,
        sideBySide : true,     
        showClose: true,
        showClear: true,
        toolbarPlacement: 'top',
        format: 'YYYY-MM-DD HH:mm',
        widgetPositioning: {
            horizontal: 'auto',
            vertical: 'bottom'
         }
    });
    $('.iconka').froalaEditor({
        toolbarButtons: ['fontAwesome','html'],
        enter: $.FroalaEditor.ENTER_BR,
    });
    $("#post-title").keyup(function(){
        $("#post-slug").val(toLatin($("#post-title").val().replace(/\s{2,}/g, ' ').replace(/ /g, '-')).toLowerCase());
    });
    // $('input').froalaEditor({
    //   editInPopup: true,
    //   toolbarButtons: ['bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', '|', 'fontFamily', 'fontSize', 'color', 'inlineStyle', 'inlineClass', 'clearFormatting', '|', 'emoticons', 'fontAwesome', 'specialCharacters', '-', 'paragraphFormat', 'lineHeight', 'paragraphStyle', 'align', 'formatOL', 'formatUL', 'outdent', 'indent', 'quote', '|', 'insertLink', 'insertImage', 'insertVideo', 'insertFile', 'insertTable', '-', 'insertHR', 'selectAll', 'getPDF', 'print', 'help', 'html', 'fullscreen', '|', 'undo', 'redo']
    // })
    // $("label.block input[type=file]").remove();
    // $(".newimage").focus(function(){
    //     $("#my-modal").modal();
    // })
    // var tag_input = $('.form-field-tags');
    // try{
    //     tag_input.tag(
    //       {
    //         placeholder:tag_input.attr('placeholder'),
    //         //enable typeahead by specifying the source array
    //         source: ace.vars['US_STATES'],//defined in ace.js >> ace.enable_search_ahead
    //         *
    //         //or fetch data from database, fetch those that match "query"
    //         source: function(query, process) {
    //           $.ajax({url: 'remote_source.php?q='+encodeURIComponent(query)})
    //           .done(function(result_items){
    //             process(result_items);
    //           });
    //         }
            
    //       }
    //     )

    //     //programmatically add/remove a tag
    //     var $tag_obj = $('.form-field-tags').data('tag');
    //     $tag_obj.add('Programmatically Added');
        
    //     var index = $tag_obj.inValues('some tag');
    //     $tag_obj.remove(index);
    // }
    // catch(e) {
    //     //display a textarea for old IE, because it doesn't support this plugin or another one I tried!
    //     tag_input.before('<textarea id="'+tag_input.attr('id')+'" name="'+tag_input.attr('name')+'" rows="3">'+tag_input.val()+'</textarea>').remove();
    //     //autosize($('#form-field-tags'));
    // }
    $(".accordion-toggle").click(function(e){
        e.preventDefault();
        if ($(this).attr("aria-expanded")=="true") {
            $(this).parent().parent().next().addClass("in").attr("aria-expanded","true").attr("style","");
            $(this).attr("aria-expanded","false");
        }else{
            $(this).parent().parent().next().removeClass("in").attr("aria-expanded","false").css("height","0px");
            $(this).attr("aria-expanded","true");
        }
    })
});