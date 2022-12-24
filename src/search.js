$("document").ready(function() {
    $("#poisk").on('keyup', function() {
        let dannie = $(this).serialize();

        $.ajax({
            url: '/poisk.php',         /* Куда отправить запрос */
            method: 'get',             /* Метод запроса (post или get) */
            dataType: 'html',          /* Тип данных в ответе (xml, json, script, html). */
            data: dannie,     /* Данные передаваемые в массиве */
            success: function(data){   /* функция которая будет выполнена после успешного запроса.  */
                $(".dialog_insert").html(data); /* В переменной data содержится ответ от index.php. */
            }
        });
    })

    $("#poisk_mob").on('keyup', function() {
        let dannie = $(this).serialize();

        $.ajax({
            url: '/poisk.php',         /* Куда отправить запрос */
            method: 'get',             /* Метод запроса (post или get) */
            dataType: 'html',          /* Тип данных в ответе (xml, json, script, html). */
            data: dannie,     /* Данные передаваемые в массиве */
            success: function(data){   /* функция которая будет выполнена после успешного запроса.  */
                $(".dialog_insert_mob").html(data); /* В переменной data содержится ответ от index.php. */
            }
        });
    })
})