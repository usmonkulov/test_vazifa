//Удаление одной картинки
$('.delFoto').on('click', function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    var img = $(this).data('img');
    //alert(id);

    $.ajax({
        url: '/admin/product/del-img', // отпровляем в контролер Entry
        data: {id: id, img: img}, // передаём id
        type: 'GET',   // отпровляем методом get
        // если хорошо то какийты действия
        success: function (res) {
            //alert(res);
            // если пользователь попытался подменить id то выводем в сообщение
            if (res == 'ok'){
                $('.del_'+img).remove();
            }
            //$('.has-success').html('');


        },
        // если ошибка то выведем ошибку
        error: function (res) {

        }

    });
});