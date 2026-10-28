let insertTransaction = document.getElementById('insertTransaction');
let explication = document.getElementById('explication');

// fonction ajaxsend

async function ajaxsend() {
    try{
        // créer un nouvel objet FormData
        let formData = new FormData();
        formData.append('date', '2007-12-24');
        formData.append('amount', 1.2);
        formData.append('catId', 1);
        formData.append('typeId', 2);

        let response = await fetch('medias/php/transaction-create.php', {
            method : "POST",
            body : formData
        });

        let datas = await response.json();

        explication.textContent = datas.message;


    }catch(error){
        explication.textContent = "Erreur:" +error;

    }
    
    
}

insertTransaction.addEventListener("submit", function(e){
    e.preventDefault();
    ajaxsend();

})