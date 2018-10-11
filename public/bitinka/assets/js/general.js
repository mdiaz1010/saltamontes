/*
 * Reemplazar en un string la ',' por '.'
 * 
 * @param {string} a value del input
 * @returns {string}
 */
function comm_replace(a) {
    ~a.value.indexOf(",") && (a.value = a.value.replace(",", "."));
}

/*
 * Formato numérico
 * 
 * @param {integer} pre cantidad de enteros
 * @param {integer} de cantidad de decimales
 * @param {string} id id del input
 * @returns {string}
 */
function decimal(pre, de, id) {
		 if($('#typeCoin').val() == 1){
    		de=8;
    	}

    	
    $("#" + id).numeric({
        maxPreDecimalPlaces: pre,
        maxDecimalPlaces: de
    });
} 

