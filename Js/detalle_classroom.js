document.addEventListener("DOMContentLoaded", () => {

    const sections = document.querySelectorAll(
        ".descripcion, .video-classroom, .card-info, .recurso-card"
    );

    const observer = new IntersectionObserver((entries) => {

        entries.forEach(entry => {

            if(entry.isIntersecting){

                entry.target.classList.add("show");

            }

        });

    },{

        threshold:0.15

    });

    sections.forEach(section=>{

        section.classList.add("hidden");

        observer.observe(section);

    });

});

window.addEventListener("scroll",()=>{

    const hero=document.querySelector(".hero-banner");

    if(hero){

        hero.style.transform=`translateY(${window.scrollY*0.35}px)`;

    }

});

const btnTop=document.createElement("button");

btnTop.innerHTML='<i class="fa-solid fa-arrow-up"></i>';

btnTop.className="btn-top";

document.body.appendChild(btnTop);

window.addEventListener("scroll",()=>{

    if(window.scrollY>400){

        btnTop.classList.add("active");

    }else{

        btnTop.classList.remove("active");

    }

});

btnTop.addEventListener("click",()=>{

    window.scrollTo({

        top:0,

        behavior:"smooth"

    });

});

document.querySelectorAll(".recurso-card").forEach(card=>{

    card.addEventListener("mouseenter",()=>{

        card.style.transform="translateY(-12px) scale(1.02)";

    });

    card.addEventListener("mouseleave",()=>{

        card.style.transform="";

    });

});

const video=document.querySelector("video");

if(video){

    const observerVideo=new IntersectionObserver((entries)=>{

        entries.forEach(entry=>{

            if(entry.isIntersecting){

                video.classList.add("video-show");

            }

        });

    });

    observerVideo.observe(video);

}

const counters=document.querySelectorAll(".counter");

counters.forEach(counter=>{

    const update=()=>{

        const target=+counter.dataset.target;

        let count=+counter.innerText;

        const increment=Math.ceil(target/40);

        if(count<target){

            counter.innerText=count+increment;

            requestAnimationFrame(update);

        }else{

            counter.innerText=target;

        }

    };

    update();

});

document.querySelectorAll('a[href^="#"]').forEach(anchor=>{

    anchor.addEventListener("click",function(e){

        e.preventDefault();

        document.querySelector(this.getAttribute("href")).scrollIntoView({

            behavior:"smooth"

        });

    });

});