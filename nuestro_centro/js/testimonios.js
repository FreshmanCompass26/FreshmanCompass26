const foto = document.getElementById("foto");
const preview = document.getElementById("preview");

foto.addEventListener("change", function(){

    const archivo = this.files[0];

    if(archivo){

        const lector = new FileReader();

        lector.onload = function(e){

            preview.src = e.target.result;

        }

        lector.readAsDataURL(archivo);

    }

});