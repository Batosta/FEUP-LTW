let commentForm = document.querySelector('#comments form');
commentForm.addEventListener('submit', submitComment);

function encodeForAjax(data) {
  return Object.keys(data).map(function(k){
    return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
  }).join('&');
}

function submitComment(event) {
	let commentID = document.querySelector('#comments input[name=commentID]').value;
	let postID = document.querySelector('#comments input[name=cpostID]').value;
	let accountID = document.querySelector('#comments input[name=accountID]').value;
	let commentText = document.querySelector('#comments .comment');

	let request = new XMLHttpRequest();
	request.addEventListener('load', receiveComments);
	request.open('POST', 'add_comment.php', true);
	request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	request.sent(encodeForAjax({commentID : commentID, postID : postID, accountID : accountID, commentText : commentText}));

	event.preventDefault();
}

function receiveComments(event) {
  let section = document.querySelector('#comments');
  let comments = JSON.parse(this.responseText);

  for (let i = 0; i < comments.length; i++) {
    let comment = document.createElement('article');
    comment.classList.add('comment');

    comment.innerHTML = '<span class="postID">' +
      comments[i].postID + '</span><span class="accountID">' +
      comments[i].accountID + '</span><p>' +
      comments[i].commentText + '</p>';

    section.insertBefore(comment, commentForm);
  }
}