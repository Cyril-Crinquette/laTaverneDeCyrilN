// Fichier javascript général


// Déclaration de constantes
const addRemark = document.getElementById('addRemark');
const modal = document.getElementById('modal');
const closeModal = document.getElementById('close');


// Ouverture de la modale lors du clic sur "connexion/inscription"
addRemark.addEventListener('click', ()=> {
    modal.style.display="block";
})

// Fermeture de la modale lors du clic sur la croix
closeModal.addEventListener('click', ()=>{
    modal.style.display='none';
})

// Fermeture de la modale lors d'un clic à l'extèrieur de la modale
window.onclick = function(event){
    if (event.target== modal) {
        modal.style.display='none';
    }
}




