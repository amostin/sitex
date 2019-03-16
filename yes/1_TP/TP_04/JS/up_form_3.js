function verif(file) {

    var acceptTypes = ['jpg', 'jpeg', 'png', 'gif'];

    var ext = file.value.split('.')[1].toLocaleLowerCase();

    var submitButton = document.getElementById('submitButton');

    if (acceptTypes.indexOf(ext) < 0) {
        submitButton.disabled = true;
        document.getElementById("msg").innerText = "L'extension du fichier n'est pas supportée";
    } else {
        submitButton.disabled = false;
        document.getElementById("msg").innerText = 'Taille du fichier : ' + file.files[0].size;
    }

}