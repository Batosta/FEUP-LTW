let likeButton = document.querySelector("#points form");
likeButton.addEventListener("submit", submitPoint);

function encodeForAjax(data) {
  return Object.keys(data).map(function(k){
    return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
  }).join('&');
}

function submitPoint(event) {
  let pID = document.querySelector('#points input[name=postID]').value;
  console.log(pID);

  let aID = document.querySelector('#points input[name=accountID]').value;
  console.log(aID);

  let points = document.querySelector('#points input[name=post_points]').value;

  console.log(likeButton);

  points++;
  console.log(points);

  let request = new XMLHttpRequest();
  request.addEventListener("load", receivePoints);
  
	request.open("POST", "add_point.php", true);
	request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  let encoded = encodeForAjax({postID: pID, accountID: aID, points: points});
  console.log("Encoded string: " + encoded);
  request.send(encoded);
  
  event.preventDefault();
}

function receivePoints(event) {
  let section = document.querySelector('#points .points');
  let points = JSON.parse(this.responseText);
  console.log(points);
  
  section.innerHTML = '<span class="points">Points: ' + points[0] + '</span>';
}