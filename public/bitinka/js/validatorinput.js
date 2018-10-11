/*
 * Validaciones para los inputs
 * 
 * Libreria de validaciones de input tipo de texto.
 *   
 * @autor Yeinso Blanco
 * @date 09/09/2016
 *
 * @version 0.1
 */


/* 
 * Valida las teclas de control.
 * 
 * @param string key evento keypres
 * 
 * @return boolean
 */
function keyControl(key){
    var control = [0,8];
    var result;
    if(control.indexOf(key.which) >= 0){
        result = true;
    }else{
        result =  false;
    }
    return result;
}
/* 
 * Valida las  entradas por teclado y las expresiones regulares
 * 
 * @param string key evento keypres
 * 
 * @return boolean
 */
function pathKey(eReg, key){
    var letra = String.fromCharCode(key.which);
    return keyControl(key) || eReg.test(letra);
}

/*
 * Validacion de clases de inputs
 * 
 * @returns boolean
 */
(function($) {
    $(document).ready(function () {
        $(document).on('keypress', '.sololetras', function (key) {
            return pathKey(/^[a-z]| |[ñÑáéíóúÁÉÍÓÚ]$/i, key);
        });
        $(document).on('keypress', '.solonumeros', function (key) {
            return pathKey(/^[0-9]/i, key);
        });
        $(document).on('keypress', '.nospace', function (key) {
            return pathKey(/^\S/i, key);
        });
        $(document).on('keypress', '.cantidades', function (key) {
           return pathKey(/^[0-9]|[.]$/i, key);
        });
        $(document).on('keypress', '.especiales', function (key) {
           return pathKey(/^[-a-zA-Z0-9_.ñÑÁÉÍÓÚáéíóú\s]+$/i, key);
        });
        $(document).on('keypress', '.letrasnumeros', function (key) {
           return pathKey(/^[-a-zA-Z0-9]+$/i, key);
        });
    });
})(jQuery);
$(document).on('contextmenu', '#wholediv, #fund_result input, #fund_result select',function(){ return false; });
