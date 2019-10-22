var createButton = document.getElementById('button-create');
var closeModalButtons = document.getElementsByClassName('modal__modal-content__header__close-modal');
var modals = document.getElementsByClassName('modal');

//Open modal to create feed
createButton.onclick = function(){
    document.getElementById('modal-create').style.display='block';

    document.getElementById('title-create').value="";
    document.getElementById('image-create').value="";
    document.getElementById('publisher-create').value="";
    document.getElementById('body-create').value="";
    document.getElementById('source-create').value="";
    document.getElementById('linkfeed-create').value="";
};

//Open modal to edit or delete feed
var detailsButtons = document.getElementsByClassName('feedContainer__box__body__info__details');

function addClickDetails(detailsButtons){

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
            document.getElementById('linkfeed-edit').value=feed_array[this.value].linkfeed;
            
        };
    };

}

addClickDetails(detailsButtons);

//Close modals
for (var i = 0; i<closeModalButtons.length; i++){
    closeModalButtons[i].onclick = function(){

        for(var m=0; m<modals.length; m++) {
            modals[m].style.display='none';
          }

    };
};

// Form validations

function validateform(title,image,publisher,body,source,form){  

    if(form=="CREATE"){
        for (let index = 0; index < feed_array.length; index++) {
            var element = feed_array[index].title;
            if(element.trim().toLowerCase()==title.trim().toLowerCase()){
                alert('El artículo ya existe en el feed.');
                return false;
            }
        }
    };
    if (title==null || title==""){  
        alert("El campo titular está vacío.");  
        return false;  
    }else if(publisher==null || publisher==""){
        alert("El campo autores está vacío.");  
        return false;  
    }else if(source==null || source==""){
        alert("El campo fuente está vacío.");  
        return false;  
    }

    return true;

}

// Ajax request to create
var createButton = document.getElementById('feed-create-button');

createButton.onclick = function(){

    var title = document.getElementById('title-create').value.trim();
    var image = document.getElementById('image-create').value.trim();
    var publisher = document.getElementById('publisher-create').value.trim();
    var body = document.getElementById('body-create').value.trim();
    var source = document.getElementById('source-create').value.trim();
    var linkfeed = document.getElementById('linkfeed-create').value.trim();

    if(validateform(title, image, publisher, body, source, "CREATE")){

    var http = new XMLHttpRequest();
    var url = 'config/views/feed/create.php';
    var params = 'title='+title+
    '&image='+image+
    '&publisher='+publisher+
    '&body='+body+
    '&source='+source+
    '&linkfeed='+linkfeed+'';
    http.open('POST', url, true);

    http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    http.send(params);

    http.onreadystatechange = function() {
        

        if(http.readyState == 4 && http.status == 200) {

            //Add new feed to the current list
            var feedContainer = document.getElementsByClassName('feedContainer'); 

            feedContainer[0].innerHTML=http.response+feedContainer[0].innerHTML;

            // Create the new object as JavaScript can't read the updated session variable
            var newFeedObject = {
                title: title,
                image: image,
                publisher: publisher,
                body: body,
                source: source,
                linkfeed: linkfeed
            };

            var newFeedDetailsButton = document.getElementsByClassName('feedContainer__box__body__info__details')[0];
            // Insert the object in the array with its position
            feed_array.splice(newFeedDetailsButton.value,0,newFeedObject);

            var detailsButton = document.getElementsByClassName('feedContainer__box__body__info__details');
            addClickDetails(detailsButton);

            document.getElementById('modal-create').style.display='none';

        }
    }

}
    
};

// Ajax request to edit
var editButton = document.getElementById('button-edit');

editButton.onclick = function(){

    var position = document.getElementById('posFeed-edit').value.trim();
    var title = document.getElementById('title-edit').value.trim();
    var image = document.getElementById('image-edit').value.trim();
    var publisher = document.getElementById('publisher-edit').value.trim();
    var body = document.getElementById('body-edit').value.trim();
    var source = document.getElementById('source-edit').value.trim();
    var linkfeed = document.getElementById('linkfeed-edit').value.trim();

    if(validateform(title, image, publisher, body, source, "EDIT")){

    var http = new XMLHttpRequest();
    var url = 'config/views/feed/update.php';
    var params = 'posFeed='+position+
    '&title='+title+
    '&image='+image+
    '&publisher='+publisher+
    '&body='+body+
    '&source='+source+
    '&linkfeed='+linkfeed+'';
    http.open('POST', url, true);

    http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    http.onreadystatechange = function() {
        if(http.readyState == 4 && http.status == 200) {

            //Update feed on the current list

            var feedContainer = document.getElementById('feedContainer__box__'+position+'');

            feedContainer.getElementsByClassName('feedContainer__box__body__title')[0].getElementsByTagName('h3')[0].innerHTML=title;
            feedContainer.getElementsByClassName('feedContainer__box__img')[0].style.backgroundImage="url("+image+")";
            feedContainer.getElementsByClassName('feedContainer__box__body__title_publisher')[0].innerHTML=publisher;
            feedContainer.getElementsByClassName('feedContainer__box__body__description')[0].getElementsByTagName('p')[0].innerHTML=body;
            feedContainer.getElementsByClassName('feedContainer__box__body__description')[0].getElementsByTagName('small')[0].innerHTML=source;
            feedContainer.getElementsByClassName('feedContainer__box__body__description')[0].getElementsByTagName('small')[0].innerHTML+=" | <a href='"+linkfeed+"' target='_blank'>Leer más...</a>";


            // Insert the object in the array with its position
            feed_array[position].title=title;
            feed_array[position].image=image;
            feed_array[position].publisher=publisher;
            feed_array[position].body=body;
            feed_array[position].source=source;
            
            document.getElementById('modal-details').style.display='none';

        }
    }

    http.send(params);

}

};

// Ajax request to delete
var deleteButton = document.getElementById('button-delete');

deleteButton.onclick = function(){

    var position = document.getElementById('posFeedDelete').value;

    var http = new XMLHttpRequest();
    var url = 'config/views/feed/delete.php';
    var params = 'posFeedDelete='+position+'';

    http.open('POST', url, true);

    http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    http.onreadystatechange = function() {
        if(http.readyState == 4 && http.status == 200) {

            //Delete feed from the current list

            var feedContainer = document.getElementById('feedContainer__box__'+position+'');

            feedContainer.remove();

            document.getElementById('modal-details').style.display='none';
            
        }
    }

    http.send(params);
    
};