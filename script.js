let commentForm = document.querySelector("#comments form");
commentForm.addEventListener("submit", submitComment);

function encodeForAjax(data) {
  return Object.keys(data).map(function(k){
    return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
  }).join('&');
}

function submitComment(event) {
	let pID = document.querySelector('#comments input[name=postID]').value;
  console.log(pID);
	let aID = document.querySelector('#comments input[name=accountID]').value;
  console.log(aID);
	let cText = document.querySelector('#comments textarea[name=text]').value;
  console.log(cText);

  let request = new XMLHttpRequest();
  request.addEventListener("load", receiveComments);
  
	request.open("POST", "add_comment.php", true);
	request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  let encoded = encodeForAjax({postID: pID, accountID: aID, commentText: cText});
  console.log("Encoded string: " + encoded);
  request.send(encoded);
  
  event.preventDefault();
}

function receiveComments(event) {
  let section = document.querySelector('#comments');
  let comments = JSON.parse(this.responseText);
  console.log(this.responseText);

  for (let i = 0; i < comments.length; i++) {
    let comment = document.createElement('article');
    comment.classList.add('comment');

    comment.innerHTML = '<span class="accountID">' +
    comments[i].accountID + '</span><p>' +
    comments[i].commentText + '</p>';

    section.insertBefore(comment, commentForm);
  }
}