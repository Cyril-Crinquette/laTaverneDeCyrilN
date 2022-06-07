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

// Fonctions permettant d'avertir l'utilisateur avant suppression 
function deleteConfirm(link){
    if (window.confirm('Etes-vous sûr de vouloir supprimer le profil ?')) {
        window.location.replace(link);
    }
}

function deleteArticleConfirm(link){
    if (window.confirm('Etes-vous sûr de vouloir supprimer l\'article ?')) {
        window.location.replace(link);
    }
}

function deleteRemarkConfirm(link){
    if (window.confirm('Etes-vous sûr de vouloir supprimer le commentaire ?')) {
        window.location.replace(link);
    }
}



