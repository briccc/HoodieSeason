

function obtenerValorCategoria() {

    let selectElement = document.getElementById("categoria");

    let valorSeleccionado = selectElement.value;

    console.log("Valor seleccionado: " + valorSeleccionado);


}

function urlCategoria() {

    let selectElement = document.getElementById("categoria");

    let valorSeleccionado = selectElement.value;

    let url = "http://localhost/miproyecto/productos?categoria=" + valorSeleccionado;

    window.location.href = url;
}

function obtenerValorColor() {

    let selectElement = document.getElementById("color");

    let valorSeleccionado = selectElement.value;

    console.log("Valor seleccionado: " + valorSeleccionado);
}

function urlColor() {
    
        let selectElement = document.getElementById("color");
    
        let valorSeleccionado = selectElement.value;
    
        let url = "http://localhost/miproyecto/productos?color=" + valorSeleccionado;
    
        window.location.href = url;
    }

    function generarUrl() {
        let categoria = document.getElementById("categoria").value;
        let color = document.getElementById("color").value;
    
        if (categoria === "" && color === "") {
            window.location.href = 'http://localhost/miproyecto/productos?';
            return;
        }

        let url = 'http://localhost/miproyecto/productos?';
        if (categoria !== "") {
            url += 'categoria=' + categoria;
        }
        if (color !== "") {
            url += '&color=' + color;
        }

        window.location.href = url;
    }