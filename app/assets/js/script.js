var createButton = document.getElementById('button-create');
var closeModalButtons = document.getElementsByClassName('modal__modal-content__header__close-modal');
var modals = document.getElementsByClassName('modal');

createButton.onclick = function(){
    document.getElementById('modal-create').style.display='block';
};

for (var i = 0; i<closeModalButtons.length; i++){
    closeModalButtons[i].onclick = function(){

        for(var m=0; m<modals.length; m++) {
            modals[m].style.display='none';
          }

    };
};