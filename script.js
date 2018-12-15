let commentsSection = document.getElementsByClassName("comments");
let child;

for(let i = 0; i < commentsSection.length; i++){
  commentsSection[i].addEventListener("submit", function(){
  child = commentsSection[i];

  let pID = commentsSection[i].querySelector('input[name=postID]').value;
  let aID = commentsSection[i].querySelector('input[name=accountID]').value;
  let cText = commentsSection[i].querySelector('textarea[name=text]').value;

  let request = new XMLHttpRequest();
  request.addEventListener("load", receiveComments);
  
  request.open("POST", "add_comment.php", true);
  request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  let encoded = encodeForAjax({postID: pID, accountID: aID, commentText: cText});

  request.send(encoded);
  
  event.preventDefault();
  });
}

function encodeForAjax(data) {
  return Object.keys(data).map(function(k){
    return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
  }).join('&');
}

function receiveComments(event) {
  
  let comments = JSON.parse(this.responseText);

  for (let i = 0; i < comments.length; i++) {
    let comment = document.createElement('article');
    comment.classList.add('comment');

    comment.innerHTML = '<span class="accountID">' +
    comments[i].accountID + '</span><p>' +
    comments[i].commentText + '</p>';

    child.appendChild(comment);
  }
}

// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}