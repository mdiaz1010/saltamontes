/* global basurl_history */
$( document ).ready(function() {

    //##### Creado por Erick Sulbaran - 18/05/2017 #####
    //valida los checkboxes para asegurar el correcto funcionamiento de los mismos
    var checkboxes = $(document.getElementsByName('id_orden[]'));
    for (i = 0; i < checkboxes.length; i++){
        if (checkboxes[i].type == "checkbox"){
            checkboxes[i].onclick = function() {
                if($('#omitir').is(':checked')){
                    $('#omitir').prop('checked', false);
                }
            };
        }
    }
    //#################################################
});


var token = 0;
function seleccionar_todo(source) {
    checkboxes = document.getElementsByTagName('input'); //obtenemos todos los controles del tipo Input
    for (i = 0; i < checkboxes.length; i++) //recorremos todos los controles
    {
        if (checkboxes[i].type == "checkbox") //solo si es un checkbox entramos
        {
            checkboxes[i].checked = source.checked; //si es un checkbox lo seleccionamos
        }
    }
}
function reloadOrder(url_ajax, data , order) {
    var data_ajax;
    if (data == undefined) {
        data_ajax = {ajax: 'ok'};
    } else {
        data_ajax = data;
        data_ajax.inka_forms = Cookies.get('cookie_forms');
        data_ajax.ajax = 'ok';
    }
    $.ajax({
        url: url_ajax,
        data: data_ajax,
        type: "POST",
        success: function (output)
        {
            $("#loading-circle-overlay").hide();
            $('#'+order).html(output);
        },
        beforeSend: function ()
        {
            $("#loading-circle-overlay").show();
        }
    });
}

function getFilters() {
    var pair = $('#pair_order').val();
    var type = $('#type_order').val();
    var status = $('#status_order').val();
    return {pair: pair, type: type, status: status}
}

//modificado por norbelys naguanagua 12/09/2016

//function cancelarOrdenActive(){//Funcion para cancelar solo una orden activa
$(function () {
    $(window).load(function () {
        $(document).on('click', ".delete", function (e) {

            //para capturar la fila columna donde esta el id en este caso esta como oculto hay que posicionarlos en la tabla
            var id = $(this).parents("tr").find("td").eq(5).html();
            var idselec = $(this).attr('id');
            modal_confirmOrder2(idselec);
            token = 0;

        });


        $(document).on('click', '.pagination a', function (event) {
            event.preventDefault();
            var data = getFilters();
            reloadOrder($(this).attr('href'), data);
        });
        $(document).on('change', '.ajax-order', function (event) {
            event.preventDefault();
            var data = getFilters();
            var old = $('#old').val() == 1 ? '/old' : '';
            reloadOrder(basurl_history + 'bitinka/order_history'+old, data , 'orderhistory');
        });
    //##### Modificado por Erick Sulbaran - 16/05/2017 #####
    //Boton de cancelar ordenes una a una
        $(document).on('click', '#cancelOrderbutton', function (event) {
            var inputs = $('input[type="checkbox"].order_check:checked');
            if (inputs.length > 0) {
                $("#confirmOrder").modal({"backdrop": "static"});
                token = 0;
            } else {
                $('#errorOrder').modal({"backdrop": "static"});
            }
        });
        //Boton de cancelar todas las ordenes
        $(document).on('click', '#cancelOrderBtn', function (event) {            
            $("#confirmCancelAllOrders").modal({"backdrop": "static"});
            token = 0;
        });        

    });

    //Accion de seleccionar todas las ordenes disponibles para cancelarlas
    $('#confirmCancelAllOrders').on('hidden.bs.modal', function () {
        if (token !== 0) {
            var old = $('#old').val() == 1 ? '/old' : '';
            if($('#orderStop').val() == 1){
                urlCancel = basurl_stop +'bitinka/cancel_order_stop';
                urlReload = basurl_stop +'bitinka/order_stop/active';
                order = 'orderstop';
            }else{
                urlCancel = basurl_history +'bitinka/cancel_order_history'+old;
                urlReload = basurl_history + 'bitinka/order_history';
                order = 'orderhistory';
            }
            token = 0;
            var inputs = $('input[type="checkbox"].order_check:checked');
            var orders = $(document.getElementsByName('id_orden[]'));
            for (var i = 0; i < orders.length; i++) {
                if(orders[i].type == "checkbox") {
                    orders[i].checked = true; 
                }
            }
            var data = getFilters();
            $.ajax({
                url: urlCancel,
                data: {id_orden: "All",inka_forms: Cookies.get('cookie_forms')},
                type: "POST",
                success: function ()
                {
                    $("#loading-circle-overlay").hide();
                    reloadOrder(urlReload, data,order);

                },
                beforeSend: function ()
                {
                    $('#cancelOrderBtn').hide();
                    $('#cancelOrderbutton').hide();
                    $("#loading-circle-overlay").show();
                }
            });
        }
    });

    //#################################################

    $('#confirmOrder').on('hidden.bs.modal', function () {
        if (token !== 0) {
            var old = $('#old').val() == 1 ? '/old' : '';
            if($('#orderStop').val() == 1){
                urlCancel = basurl_stop +'bitinka/cancel_order_stop';
                urlReload = basurl_stop +'bitinka/order_stop/active';
                order = 'orderstop';
            }else{
                urlCancel = basurl_history +'bitinka/cancel_order_history'+old;
                urlReload = basurl_history + 'bitinka/order_history';
                order = 'orderhistory';
            }
            var inputs = $('input[type="checkbox"].order_check:checked');
            inputs = inputs.serializeArray();
            inputs.push({name:"inka_forms",value:Cookies.get('cookie_forms')});
            var data = getFilters();
            $.ajax({
                url: urlCancel,
                data: inputs,
                type: "POST",
                success: function ()
                {
                    $("#loading-circle-overlay").hide();
                    reloadOrder(urlReload, data,order);

                },
                beforeSend: function ()
                {
                    $('#cancelOrderBtn').hide();
                    $('#cancelOrderbutton').hide();
                    $("#loading-circle-overlay").show();
                }
            });
        }
    });


    $('#confirmOrder2').on('hidden.bs.modal', function () {
        if (token !== 0) {
            $.ajax({
                url: basurl_history + 'bitinka/close_delete_order/' + token,
                data: {inka_forms: Cookies.get('cookie_forms')},
                beforeSend: function(){
                    $("#loading-circle-overlay").show();
                },
                success: function(){
                    $('#'+token).parents("tr").remove();
                    refresh();
                }
            });
        }
    });

});