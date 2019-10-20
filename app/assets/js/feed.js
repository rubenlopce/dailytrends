var detailsButtons = document.getElementsByClassName('details');

for (var i = 0; i<detailsButtons.length; i++){
    detailsButtons[i].onclick = function() {

        document.getElementById('posFeed').value=this.value;
        document.getElementById('posFeedDelete').value=this.value;

        document.getElementById('title').value=feed_array[this.value].title;
        document.getElementById('image').value=feed_array[this.value].image;
        document.getElementById('publisher').value=feed_array[this.value].publisher;
        document.getElementById('body').value=feed_array[this.value].body;
        document.getElementById('source').value=feed_array[this.value].source;
        
    };
};