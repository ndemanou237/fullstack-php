let typeSwitch = document.getElementById('typeSwitch');
let typeLabel = document.getElementById("typeLabel");

typeSwitch.addEventListener('change', function(){
    typeLabel.textContent = this.checked ? 'investissement' : 'épargne';
})