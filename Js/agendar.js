console.log("JS OK");

window.seleccionar = function(nombre, card){

    document.getElementById("psicologa").value = nombre;

    document.querySelectorAll(".card").forEach(c=>{
        c.classList.remove("active");
    });

    card.classList.add("active");

};

document.addEventListener("DOMContentLoaded",()=>{
    document.querySelectorAll(".hora-btn").forEach(btn=>{

    btn.addEventListener("click",()=>{

        if(btn.classList.contains("ocupada")) return;

        document.querySelectorAll(".hora-btn").forEach(b=>{

            b.classList.remove("active");

        });

        btn.classList.add("active");

        document.getElementById("hora").value=btn.dataset.hora;

    });

});

    flatpickr("#fecha",{
        dateFormat:"Y-m-d",
        minDate:"today"
    });

    document.getElementById("citaForm").addEventListener("submit",function(e){

        e.preventDefault();

        const psicologa=document.getElementById("psicologa").value;
        const fecha=document.getElementById("fecha").value;
        const hora=document.getElementById("hora").value;
        const motivo=document.getElementById("motivo").value;

        const mensaje=document.getElementById("mensaje");

        if(psicologa=="" || fecha=="" || hora==""){

            mensaje.innerHTML="<div class='msg error'>Completa todos los campos.</div>";
            return;

        }

        fetch("../php/guardar_cita.php",{

            method:"POST",

            headers:{
                "Content-Type":"application/x-www-form-urlencoded"
            },

            body:
            "psicologa="+encodeURIComponent(psicologa)+
            "&fecha="+encodeURIComponent(fecha)+
            "&hora="+encodeURIComponent(hora)+
            "&motivo="+encodeURIComponent(motivo)

        })

        .then(res=>res.text())

        .then(res=>{

            console.log(res);

            if(res.trim()=="ok"){

                document.getElementById("modal").classList.add("show");

                document.getElementById("textoConfirmacion").innerHTML=
                `
                Psicóloga: <b>${psicologa}</b><br>
                Fecha: ${fecha}<br>
                Hora: ${hora}
                `;

                document.getElementById("citaForm").reset();

                document.getElementById("psicologa").value="";

                document.querySelectorAll(".card").forEach(c=>{
                    c.classList.remove("active");
                });

                mensaje.innerHTML="";

            }else{

                mensaje.innerHTML="<div class='msg error'>"+res+"</div>";

            }

        })

        .catch(error=>{

            console.log(error);

            mensaje.innerHTML="<div class='msg error'>Error de conexión.</div>";

        });

    });

});

function cerrarModal(){

    document.getElementById("modal").classList.remove("show");

}