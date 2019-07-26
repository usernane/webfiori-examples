
function sendMessage(){
    
    var title = document.getElementById('title-input').value;
    var reciverName = document.getElementById('reciver-name-input').value;
    var reciverAddr = document.getElementById('reciver-address-input').value;
    var body = document.getElementById('message-content-input').value;
    var params = 'action=send-email'
                +'&title='+encodeURIComponent(title)
                +'&reciver-name='+encodeURIComponent(reciverName)
                +'&reciver-address='+encodeURIComponent(reciverAddr)
                +'&body='+encodeURIComponent(body);
    
    var sendButton = document.getElementById('send-button');
    sendButton.setAttribute('disabled','');
    
    var statusLabel = document.getElementById('status-label');
    
    var xhr = new XMLHttpRequest();
    if(window.SendAPI){
        xhr.open('post',window.SendAPI);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function(){
            if(this.readyState === 4){
                try{
                    var json = JSON.parse(this.responseText);
                    console.log(json);
                    statusLabel.innerHTML = json['message'];
                }
                catch(e){
                    statusLabel.innerHTML = this.responseText;
                }
                sendButton.removeAttribute('disabled');
            }
        };
        xhr.send(params);
    }
    else{
        alert('Send API end point not set.');
        sendButton.removeAttribute('disabled');
    }
    return false;
}