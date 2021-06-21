// buttun uchun funksiya
$(function(){
  // get the clic
  $('#modalButton').click(function (){
    $('#modal').modal('show')
    .find('#modalContent')
    .load($(this).attr('value'));
  });
});

// $('.grid-view tbody tr').on('click', function(){
// var data = $(this).data();
// $('#modal-info').modal('show');
// $('#modal-info').find('.modal-title').text('id:'+data.key);
// $('#modal-info').find('.modal-body').load('/admin/en/category/update?id=' + data.key);
// });

$(function () {
  $('[data-toggle="popover"]').popover()
})