/**
 * Sends AJAX request to add or update a post.
 * @param {Input} source The input element which acts as an add button.
 * @param {boolean} isUpdate If set to true, the request will be sent to 
 * update post API. Default is false.
 * @returns {undefined}
 */
function addOrUpdatePost(source,isUpdate=false){
    //first, collect input values.
    var postCanonical = document.getElementById('canonical-input').value;
    var postTitle = document.getElementById('title-input').value;
    var postDesc = document.getElementById('desc-input').value;
    var postContent = document.getElementById('content-input').value;
    //Tell the user that the post is currently being added
    //and disable add button
    source.setAttribute('value','Adding...');
    source.setAttribute('disabled','');
    //create input parameters.
    var params = 'canonical='+encodeURIComponent(postCanonical)+
            '&title='+encodeURIComponent(postTitle)+
            '&description='+encodeURIComponent(postDesc)+
            '&body='+encodeURIComponent(postContent);
    //create XHR object.
    var xhr = new XMLHttpRequest();
    if(isUpdate === true){
        xhr.open('post','http://localhost/webfiori-examples/basic-blog/blog-post-apis/update-blog-post');
    }
    else{
        xhr.open('post','http://localhost/webfiori-examples/basic-blog/blog-post-apis/add-blog-post');
    }
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function(){
        if(this.readyState === 4 && this.status === 200){
            if(isUpdate === true){
                source.setAttribute('value','Post Updated.');
            }
            else{
                source.setAttribute('value','Post Added');
            }
            window.location.href = '/all-posts';
        }
        else if(this.readyState === 4){
            try{
                var json = JSON.parse(this.responseText);
                var message = json['message'];
            }
            catch(e){
                var message = this.responseText;
            }
            source.setAttribute('value','Error: '+message);
            source.removeAttribute('disabled');
        }
    };
    //send AJAX request
    xhr.send(params);
}