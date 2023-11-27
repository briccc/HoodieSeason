

function obtenerValorSelect() {

    let selectElement = document.getElementById("categoria");

    let valorSeleccionado = selectElement.value;

    console.log("Valor seleccionado: " + valorSeleccionado);


}

function generarUrl() {

    let selectElement = document.getElementById("categoria");

    let valorSeleccionado = selectElement.value;

    let url = "http://localhost/miproyecto/productos?categoria=" + valorSeleccionado;

    window.location.href = url;
}