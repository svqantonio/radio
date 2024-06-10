function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}

function getFolderName() {
    var absoluteUrl = window.location.href;
    var url = new URL(absoluteUrl);
    var directoryPath = url.pathname.substring(0, url.pathname.lastIndexOf('/'));
    return directoryPath;
}

function noSpaces(event) {
    if (event.key === ' ') {
        event.preventDefault();
        return false;
    }
}

document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');

    function searchAndRedirect() {
        const searchText = searchInput.value.trim();
        
        // Expresión regular para verificar si el formato es MM/YYYY o MM-YYYY con guiones o barras
        const regexDate = /^(0[1-9]|1[0-2])[-\/]\d{4}$/;
        
        // Expresión regular para verificar si el formato es solo YYYY
        const regexYear = /^\d{4}$/;
        
        // Verificar si searchText tiene al menos 6 dígitos y dos guiones o barras
        const regexDigits = /\d/g;
        const regexDelimiters = /[-\/]/g;
        
        const digitMatches = searchText.match(regexDigits);
        const delimiterMatches = searchText.match(regexDelimiters);
        
        const hasSixDigits = digitMatches && digitMatches.length >= 6;
        const hasTwoDelimiters = delimiterMatches && delimiterMatches.length >= 2;
        
        var dataConverted = null;
        if (regexDate.test(searchText)) {
            dataConverted = dateConversion(searchText);
            //console.log("Formato de fecha MM/YYYY o MM-YYYY detectado.");
        } else if (hasSixDigits && hasTwoDelimiters) {
            dataConverted = dateConversion(searchText);
            //console.log("Texto con al menos 6 dígitos y dos guiones o barras detectado.");
        } else if (regexYear.test(searchText)) {
            dataConverted = dateConversion(searchText);
            //console.log("Formato de año YYYY detectado.");
        } 
        //console.log("Fecha devuelta: ", dataConverted)
        if (dataConverted == null)
            window.location.href = `table_search.html?table=${encodeURIComponent(table)}&search=${encodeURIComponent(searchText)}&page=${encodeURIComponent(0)}`;
        else    
            window.location.href = `table_search.html?table=${encodeURIComponent(table)}&search=${encodeURIComponent(dataConverted)}&page=${encodeURIComponent(0)}&searchParameter=date`;
    }    

    // Manejar la pulsación de tecla "Enter" en el campo de búsqueda
    searchInput.addEventListener('keyup', function(event) {
        if (event.key === 'Enter') {
            searchAndRedirect();
        }
    });
});


function dateConversion(date) {
    console.log("Fecha que recibo: ", date);

    // Determinar el separador utilizado en la fecha
    let separator = date.includes('-') ? '-' : '/';

    // Dividir la fecha en partes utilizando el separador adecuado
    let parts = date.split(separator);

    // Caso 1: Solo año (1 parte)
    if (parts.length === 1 && parts[0].length === 4) {
        return date; // No hacer nada, devolver la entrada original
    }

    // Caso 2: Mes y año (2 partes)
    if (parts.length === 2 && parts[0].length === 2 && parts[1].length === 4) {
        let month = parts[0];
        let year = parts[1];

        // Retornar la fecha en formato YYYY-MM
        return `${year}-${month}`;
    }

    // Caso 3: Día, mes y año (3 partes)
    if (parts.length === 3) {
        let day = parts[0];
        let month = parts[1];
        let year = parts[2];

        // Retornar la fecha en formato americano YYYY-MM-DD
        return `${year}-${month}-${day}`;
    }

    // Si el formato no es reconocido, retornar la entrada original
    return date;
}