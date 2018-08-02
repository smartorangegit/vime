$('form input[name="btn-send"]').bind('click', function(tid) {
    var form = this.form;
    var contentType = 'application/x-www-form-urlencoded';
    var processData = true;

    $( ".btn" ).prop( "disabled", true );

    if(typeof files != 'undefined' ){
        var data = new FormData();

        // заполняем объект данных файлами в подходящем для отправки формате
        $.each( files, function( key, value ){
            data.append( key, value );
        });

        // добавим переменную для идентификации запроса
        data.append( 'datatyp', $(this).data('typ') );

        $.each( $(form)[0], function( key, value ){
            data.append($(value).attr('id'), $(value).val());
        });
        processData =contentType = false;
    }
    else{
        var data=$(form).serialize();
        if($(this).data('typ')!==undefined){
            data+='&datatyp='+$(this).data('typ');
        }
    }
    console.log(data)
    $.ajax({
        url         : $(form).attr('action'),
        type        : 'POST', // важно!
        data        : data,
        // отключаем обработку передаваемых данных, пусть передаются как есть
        processData : processData,
        // отключаем установку заголовка типа запроса. Так jQuery скажет серверу что это строковой запрос
        contentType : contentType,
        // функция успешного ответа сервера
        success     : function( data){
            console.log (data);
            $( ".btn" ).prop( "disabled", false );

            data= $.parseJSON(data);

            if (data.result){
                 console.log(data);
                if (data.page !== undefined) {
                    window.location = data.page;
                }
            }
            if (data. placeholder){
                console.log(data);
                $('.text-info').remove();
                $('.required').removeClass("success");
                $.each(data.error, function( key, value ){

                    $('#'+value[0]).addClass("success");
                    $('<span class="text-info">'+value[1]+'</span>').insertAfter('#'+value[0]);
                  //  setTimeout(function(){$('.text-info').remove()},2000)

                });
            }

            if(data.message){

                $('.text-info').remove();
                $('.success').removeClass("success");
                $('.text-info-success').fadeIn();
                $('.text-info-success').html(data.message);
                setTimeout(function(){$('.text-info-success').fadeOut();},20000)
            }

            if (data.reset){
                form.reset();
            }
        },
        // функция ошибки ответа сервера
        error: function( jqXHR, status, errorThrown ){
            console.log( 'ОШИБКА AJAX запроса: ' + status, jqXHR );
            $( ".btn" ).prop( "disabled", false );
        }

    });
});

var ct = 0;
var addCount = document.createElement('input');
addCount.type = "hidden";
addCount.id = "count";
addCount.name = "count";
addCount.value = "0";
function countme(form) { var form;
    document.getElementById(form).appendChild(addCount);
    document.getElementById('count').value = ++ct;
}