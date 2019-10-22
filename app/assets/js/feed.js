var detailsButtons = document.getElementsByClassName('feedContainer__box__body__info__details');

for (var i = 0; i<detailsButtons.length; i++){
    detailsButtons[i].onclick = function() {

        document.getElementById('modal-details').style.display='block';

        document.getElementById('posFeed-edit').value=this.value;
        document.getElementById('posFeedDelete').value=this.value;

        document.getElementById('title-edit').value=feed_array[this.value].title;
        document.getElementById('image-edit').value=feed_array[this.value].image;
        document.getElementById('publisher-edit').value=feed_array[this.value].publisher;
        document.getElementById('body-edit').value=feed_array[this.value].body;
        document.getElementById('source-edit').value=feed_array[this.value].source;
        
    };
};