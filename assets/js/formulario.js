function enviarDatos() {
    var nombre = document.getElementById('nombre').value;
    var correo = document.getElementById('correo').value;
    var telefono = document.getElementById('telefono').value;
    var comentario = document.getElementById('comentario').value;

    // Crear objeto FormData
    var formData = new FormData();
    formData.append('nombre', nombre);
    formData.append('correo', correo);
    formData.append('telefono', telefono);
    formData.append('comentario', comentario);

    // Realizar una solicitud AJAX con fetch
    fetch('../procesar_formulario.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        alert(data.message);
        // Limpiar los campos del formulario
        document.getElementById('nombre').value = '';
        document.getElementById('correo').value = '';
        document.getElementById('telefono').value = '';
        document.getElementById('comentario').value = '';
    })
    .catch(error => {
        console.error('Error:', error);
    });
}
