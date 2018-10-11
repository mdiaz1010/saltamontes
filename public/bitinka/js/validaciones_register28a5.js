        $("#error").hide();
        function cancel() {
        window.location.href =BASE + "bitinka/login";
        }
        // funcion para refrescar el captcha
        function refreshCaptcha() {
        var img = document.images['captchaimg'];
        img.src = img.src.substring(0, img.src.lastIndexOf("?")) + "?rand=" + Math.random() * 1000;
        }

/*autor: eacevedo@bq-trading.com
 * 
 *Mostrar pais
 * 
 * Se muestra el pais cuando se seleccione es tipo de usuario
 *   Fecha Creación: 2/12/2016
 * 
 */
function showType() {

var type = $('#usertype').val();
        switch (type) {
case "1":

        $('#pais').val("");
        $('#div_country').fadeIn();
        $('#div_natural').fadeOut();
        $('#div_juridico').fadeOut();
        $('#div_foot_form').fadeOut();
        break;
        case   "2":

        $('#pais').val("");
        $('#div_country').fadeIn();
        $('#div_natural').fadeOut();
        $('#div_juridico').fadeOut();
        $('#div_foot_form').fadeOut();
        break;
        default:
        $('#div_country').fadeOut();
        $('#div_natural').fadeOut();
        $('#div_juridico').fadeOut();
        $('#div_foot_form').fadeOut();
        break;
        }

}

$(document).ready(function () {
        data: {inka_forms: Cookies.get('cookie_forms') };    
    $('#password').strengthMeter('progressBar', {
    container: $('#example-progress-bar-container'),
            hierarchy: {
            0: 'bar bar-danger',
                    25: 'bar bar-warning',
                    50: 'bar bar-success',
            }
    }); 
  
});
        /*autor: eacevedo@bq-trading.com
         * 
         *Mostrar campos persona natural y juridico
         * 
         * Se mnuestra los campos para persona natural y juridico dependiendo de lo seleccionado
         * y cuales son obligatorios
         *   Fecha Creación: 2/12/2016
         * 
         */
                function showValidate(pais, tipo) {
                    
                        $('#recaptcha').val("");
                        $('#password').val("");
                        $('#confirm').val("");
                        $('#namecompany-error').empty();
                        $('#rifcompany-error').empty();
                        $('#username_jur-error').empty();
                        $('#emailid_jur-error').empty();
                        $('#namelegalrepresentative-error').empty();
                        $('#riflegalrepresentative-error').empty();
                        $('#password-error').empty();
                        $('#recaptcha-error').empty();
                        $('#firstname-error').empty();
                        $('#lastname-error').empty();
                        $('#username_nat-error').empty();
                        $('#emailid_nat-error').empty();
                        $('#other-error').empty();
                        $('#recaptcha-error').empty();
                        $('#confirm-error').empty();
                        $('#terms-error').empty();
                        $('#typedocument_id').val("");
                        $('#typesearch').val("");
                        $('#other').val("");
                        mostrarCampo("");SelectTypesearch("");
                        var country = pais;
                        var type = tipo;
                        var csrf = $('input[name="inka_forms"]').val();
                        if (country === "") {
                $('#div_natural').fadeOut();
                        $('#div_juridico').fadeOut();
                        $('#div_foot_form').fadeOut();
                }

                switch (type) {
                case "1":
                       var country_id= $("#pais").val();                                              
                        $.ajax({
                                method: "POST",
                                        url: BASE +  'bitinka/set_country_id',

                                        data:{ "country_id":country_id,                                                        
                                                "inka_forms":csrf,
                                                },                                               
                                        success: function(a) {                                                                                                 
                                                $('#typedocument_id').html(a);
                                        }
                                });
                        //natural
                        //natural

                        document.getElementById("div_juridico").style.display = "none";
                        document.getElementById("div_natural").style.display = "block";
                        document.getElementById("div_foot_form").style.display = "block";
                        break;
                        case "2":


                        document.getElementById("div_juridico").style.display = "block";
                        document.getElementById("div_natural").style.display = "none";
                        document.getElementById("div_foot_form").style.display = "block";
                        $.ajax({
                        method: "POST",
                                url: BASE +  'bitinka/get_fiscal_tax_document_name',
                                dataType: "json",
                                data: {country: country,
                                        "inka_forms":csrf, 
                                        }
                        })
                        .done(function (resultado) {

                        $.each(resultado, function (index, value) {
//si es Fiscal tax document hay que colocarle app_lang, echo $this->lang->line(value);, pero este es un archivo de solo js
                        //seteo cada uno de los valores de los campos

                        if (index === "legal_person") {
                           if (value==="Fiscal tax document"){//si es Fiscal tax document se muestra traducido 
                                $('label#labelriflegalperson').text(name);
                                $('#rifcompany').attr("placeholder", name);
                          }else{
                                valor = app_lang[value+"_"+country+"_E"]

                                $('label#labelriflegalperson').text(valor);
                                $('#rifcompany').attr("placeholder",valor);
                              }
                       }
                        if (index === "legal_representative") {
                                if(country == "44"){
                                     $('#labelriflegalrepresentative').parent().hide();
                                }else{
                                     $('#labelriflegalrepresentative').parent().show();

                                     if (value==="Fiscal tax document"){//si es Fiscal tax document se muestra traducido 

                                    $('label#labelriflegalrepresentative').text(name);
                                    $('#riflegalrepresentative').attr("placeholder", name);
                                    
                                    }else{
                                      valor = app_lang[value+"_"+country+"_RL"]

                                      $('label#labelriflegalrepresentative').text(valor);
                                      $('#riflegalrepresentative').attr("placeholder", valor); 
                                    }
                                }
                               
                               
                        }

                         if (index === "required_legal_person") {

                         if (value == 1) {

                             $("#rifcompany_required").val("true");
                         }
                         else { 
                             $("#rifcompany_required").val("false");
                           }
                        }
                        
                        if (index === "required_legal_representative") {
                               if (value == 1 && country != "44" ) {

                                $("#riflegalrepresentative_required").val("true");
                            
                                }else { 
                                    
                                    $("#riflegalrepresentative_required").val("false");
                                }
                  
                         } 


                        });
                        });
                        break;
                        default:

                        $('#div_natural').fadeOut();
                        $('#div_juridico').fadeOut();
                        $('#div_foot_form').fadeOut();
                        break;
                }

                }


        $(document).ready(function() {
                data: {inka_forms: Cookies.get('cookie_forms') };  
        $("#div_id_number").hide(); 
        var csrf = $('input[name="inka_forms"]').val();
        if($('#pais').val()!=""){
           showValidate($('#pais').val(),$('#usertype').val())
        } 

        
                jQuery.validator.addMethod("lettersonly", function(value, element) {
                return this.optional(element) || /^[a-zA-ZñÑÁÉÍÓÚáéíóú\s]+$/i.test(value);
                }, only_letters);
                /* Validación:
                 * 1 letra minúscula
                 * 1 letra mayúscula
                 * 1 número
                 * 1 Caracter Especial (@#$%*.,)
                 * Minimo 8 caracteres
                 * Máximo 20 caracteres
                 */
                var strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[,@.#\$%\^&\*])(?=.{8,20})");
                $.validator.addMethod("pattern", function (value, element, param) {
                if (this.optional(element)) {
                return true;
                }
                if (typeof param === 'string') {
                param = new RegExp('^(?:' + param + ')$');
                }
                return param.test(value);
                }, password_invalid);
                $('#register').validate({

        rules: {
        rifcompany: {
                   required: function(){return $('#rifcompany_required').val() == "true"},
                   minlength: 3,
                   maxlength: 15,
                   pattern: /^(?=.*[0-9])[a-zA-Z0-9ñÑÁÉÍÓÚáéíóú\s]+$/,//al menos un numero y alguna letra o numero
                   
                    remote: {
                        url: BASE + 'bitinka/validar_rifcompany',
                                type: "post",
                                data:{                                                         
                                "inka_forms":csrf,
                                },     
                        },


         },

         riflegalrepresentative: {
                   required: function(){return $('#riflegalrepresentative_required').val() == "true"},
                   minlength: 3,
                   maxlength: 15,
                 pattern: /^(?=.*[0-9])[a-zA-Z0-9ñÑÁÉÍÓÚáéíóú\s]+$/,//al menos un numero y alguna letra o numero
          },

        namecompany: {
        required: true,
                minlength: 3,
                maxlength: 50,
                pattern: /^(?=.*[a-z]|[A-Z])[a-zA-Z0-9ñÑÁÉÍÓÚáéíóú\s]+$/,//al menos una letra y algun numero o letra
        },
                firstname: {
                required: true,
                        minlength: 3,
                         maxlength: 20,
                        lettersonly: true
                },
                lastname: {
                required: true,
                        minlength: 3,
                         maxlength: 20,
                        lettersonly: true
                },
                username_nat: {
                required: true,
                  pattern: /^(?=.*[a-z]|[A-Z])[a-zA-Z0-9ñÑÁÉÍÓÚáéíóú\s]+$/,//al menos una letra y algun numero o letra
                        remote: {
                        url: BASE + 'bitinka/validar_username',
                                type: "post",
                                data:{                                                         
                                "inka_forms":csrf,
                                },     
                        },
                },
                username_jur: {
                required: true,
                 pattern: /^(?=.*[a-z]|[A-Z])[a-zA-Z0-9ñÑÁÉÍÓÚáéíóú\s]+$/,//al menos una letra y algun numero o letra
                        remote: {
                        url: BASE + 'bitinka/validar_username',
                                type: "post",
                                data:{                                                         
                                "inka_forms":csrf,
                                },  
                        },
                },
                
                  typedocument_id: {
                required: true,
                     
                },               
                idnumber: {
                     required: function(){return $('#idnumber_required').val()=="true" },
                     pattern: function (){
                      
                            var valor=$('#patron_validacion_idnumber').val();
                            var validacion = new RegExp(valor); 
                           return validacion;
                            
                        },
                      remote: {
                        url: BASE + 'bitinka/validar_idnumber',
                        type: "post",
                        data:{                                                         
                                "inka_forms":csrf,
                                },    
                        },
                   
                },
                issuedDate: {
                required: true,
                     
                },
                 expiredDate: {
                required: true,
                     
                },
                emailid_nat: {

                required: true,
                        email: true,
                        pattern: /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/,
                        remote: {
                        url: BASE + 'bitinka/validar_email',
                                type: "post",
                                data:{                                                         
                                        "inka_forms":csrf,
                                        },    

                        },
                },
                emailid_jur: {

                required: true,
                        email: true,
                        pattern: /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/,
                        remote: {
                        url: BASE + 'bitinka/validar_email',
                                type: "post",
                                data:{                                                         
                                        "inka_forms":csrf,
                                        },    
                        },
                },
                password: {
                required: true,
                        minlength: 8,
                        maxlength: 20,
                        pattern: strongRegex,
                },
                confirm: {
                equalTo: "#password",
                required: true,
                },
                namelegalrepresentative: {
                required: true,
                        minlength: 8,
                        maxlength: 50,
                        lettersonly: true

                },
                recaptcha: {
                required: true,
                        remote: {
                        url: BASE +  'bitinka/validar_captcha',
                                type: "post",
                                data:{                                                         
                                        "inka_forms":csrf,
                                        },    
                        },
                },
                terms: {
                required: true
                },
                typesearch: {
                required: true,                     
                },
                other: {
                required: true,
                        maxlength: 200                     
                }

        },
                messages: {
                    
                     typedocument_id: {
                           required:type_document+" "+ required,
                          
                         },
                         idnumber: {
                           required:number_document+" "+ required,
                            pattern:function(){
                               
                                 var valor=$('#patron_validacion_idnumber').val();
                                    if(valor=="^(?=.*[0-9])[a-zA-Z0-9ñÑÁÉÍÓÚáéíóú\s]+$"){

                                        return only_letters_numbers

                                    }
                                    if(valor=="^([0-9])*$"){
                               
                                        
                                        return only_numbers
                                    }
                        
                                
                            },
                            

                         },
                         issuedDate: {
                           required:issued_date+" "+ required,
                          
                         },
                          expiredDate: {
                           required:expired_date+" "+ required,
                          
                         },
                        rifcompany: {
                           required:field+" "+ required,
                           pattern:only_letters_numbers, 
                         },

                        riflegalrepresentative: {
                           required:field+" "+required,
                            pattern:only_letters_numbers, 
                        },
                        firstname: {
                        required: firstname+" "+ required,
                        },
                        lastname: {
                        required: lastname+" "+ required,
                        },
                        password: {
                        required: password,
                        },                  
                        confirm: {
                        required: confirm_password+" "+ required,
                        },
                        recaptcha: {
                        required:  captcha+" "+ required,
                        },
                        username_nat: {
                          
                        required: username+" "+required,
                        pattern:only_alphanumeric_characters,
                        },
                        username_jur: {
                         
                        required: username+" "+required,
                        pattern:only_alphanumeric_characters,
                        },
                        emailid_nat: {
                        required: email+" "+required,
                        pattern: invalid_email,
                        },
                        emailid_jur: {
                        required: email+" "+required,
                        pattern: invalid_email,
                        },
                        terms: {
                        required: terms,
                        },
                        namecompany: {
                        
                        required: namecompany +" "+ required,
                        pattern:only_alphanumeric_characters, 
                        },
                        namelegalrepresentative: {
                        required: namelegalrepresentative +" "+required,
                        },
                        typesearch: {
                        required:typesearch,
                        },
                        other: {
                        required:other,  
                        },
                },
                errorPlacement: function(error, element) {
                    error.appendTo(element.parent().next());
                     $('.error_form_validation').css('color' , '#cc0000');
                     $('#password-error').css('color' , '#cc0000');
                },
                submitHandler: function(form) {                   
                var t2 = $('#password').val();
                var t3 = $('#confirm').val();
                var encryptedt1 = calcMD5(t2);
                var encryptedt2 = calcMD5(t3);
                
                if(t2 != "" && t3 != ""){
                    $('#password').val(encryptedt1);
                    $('#confirm').val(encryptedt2);
                    form.submit();
                }
                
                
                },
        })
        });

 function mostrarCampo(typeid){
    var country_id= $("#pais").val();  
    var csrf = $('input[name="inka_forms"]').val();
     $(".fechas_ocultas").show();
   if((country_id==30)&&(typeid==1)) { //si es diferente de brazil muestro la fecha de emision y fecha de vencimiento
            $('#idnumber').val("");
            $('#issuedDate').val("");
            $('#expiredDate').val("");         
            $(".fechas_ocultas").hide();      
            $(".fechas_ocultas2").hide();
       }
       if((country_id==49)&&(typeid==8)) { //si es diferente de brazil muestro la fecha de emision y fecha de vencimiento
            $('#idnumber').val("");
            $('#expiredDate').val(""); 
            $(".fechas_ocultas2").hide();      
       }
    var valor="";
   if(typeid=="") {
        $("#div_id_number").hide(); 
       $('#idnumber').val("");
       $('#issuedDate').val("");
       $('#expiredDate').val("");
       $('#idnumber-error').empty();
       $('#issuedDate-error').empty();
       $('#expiredDate-error').empty();
   }else{
                     
        $("#div_id_number").show();  
         valor=$("#typedocument_id option:selected").text();
         $('#label_id_number').text(valor);
         $('#idnumber').attr("placeholder", valor);
       $.ajax({
            method: "POST",
            url: BASE +  'bitinka/get_valid_type_document',
            dataType: "json",
            data: {typeid: typeid,
                   "inka_forms":csrf,     
                  } ,
             
            })
            .done(function (resultado) {
               
                //asigno la validacion al campo que contiene el documento
                var required_type_document=resultado[0]['required']== "1" ? "true":"false";//Obtengo si el documento es requerido
                var valid_data_type_document=resultado[0]['typedata'] == "alfanumerico" ? "^(?=.*[0-9])[a-zA-Z0-9ñÑÁÉÍÓÚáéíóú\s]+$":"^([0-9])*$";
                var msj=resultado[0]['typedata'] == "alfanumerico" ? only_alphanumeric_characters:only_numbers;
                
                $("#idnumber_required").val(required_type_document);
                $("#patron_validacion_idnumber").val(valid_data_type_document);   
                $("#msj").val(msj);
                
                

            });
            
           
              
    }
}


/*******************************************Para natural***********************************************************************/
  /*********Asigno a la fecha de emision y fecha de vencimiento la fecha de minima para seleccionar****************************/
         
           /**********Le sumo a la fecha actual un dia**********************/
                     var fecha1 = new Date();
                     fecha1.setHours(fecha1.getHours()+1);
                     fecha1.setDate(fecha1.getDate()+1);//Le sumo 1 dia al dia actual
                     var fecha_actual_mas_un_dia=fecha1.getDate()+  "-" + (fecha1.getMonth() + 1) + "-" + fecha1.getFullYear();
                     
         
               //Para la fecha de expiracion coloco que la fecha mínima de selección es la actual mas un día

              
                  /************Limpio los demas campos*************************************/
            $('#issuedDate').attr('readonly', true);
            $("#issuedDate").val("");  
            $("#issuedDate").datepicker({
                maxDate: new Date(),
            changeMonth: true,
            changeYear: true,
            dateFormat: 'dd-mm-yy', 
            yearRange: "c-70:c+20", 

            onSelect: function (dateText) {
          
                //Validar si el campo fecha de nacimiento esta vacio entonces no permitir seleccionar la fecha de emision
                 $('#expiredDate').datepicker('option', 'minDate',fecha_actual_mas_un_dia); 
                 
            }
        });
            $("#expiredDate").val("");
            
             $("#expiredDate").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'dd-mm-yy', //modificacion formato fecha por @lgarcia
            yearRange: "c-70:c+20", //Modificacion extencion de años rgomez
   
            onSelect: function (dateText) {
                
          //validar si el campo fecha de emision  y fecha de nacimiento esta vacia, no permitir selleciona la fecha de expiracion
         
         }
        });
        
           $('#expiredDate').attr('readonly', true);
      
function SelectTypesearch(typeid){
    $('#other').val("");
    contar();
    if(typeid=="9") {
        $("#div_other").show(); 
    }else {
        $('#other-error').empty();
        $("#div_other").hide();
    }        
    
}
function contar() { 
    var max = "200"; 
    var cadena = document.getElementById("other").value; 
    var longitud = cadena.length; 

        if(longitud <= max) { 
            document.getElementById("contador").value = longitud + "/"+ max; 
        } else { 
            document.getElementById("other").value = cadena.substr(0, max);
        } 
}