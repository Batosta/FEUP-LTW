let upvoteSection = document.getElementsByClassName("upvote");
let currentPoints;
let likeFlag = 0;

for(let i = 0; i < upvoteSection.length; i++){
  upvoteSection[i].addEventListener("click", function(){

  currentPoints = upvoteSection[i]["previousElementSibling"];
  let points = currentPoints.getAttribute("value");
  points++;
  likeFlag = 1;
  currentPoints.setAttribute("value",points);

  let accountData = upvoteSection[i]["nextElementSibling"];
  let postData = upvoteSection[i]["nextElementSibling"]["nextElementSibling"];

  let pID = postData.getAttribute("value");
  let aID = accountData.getAttribute("value");

  let request = new XMLHttpRequest();
  request.addEventListener("load", receivePoints);
  
  request.open("POST", "add_point.php", true);
  request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  let encoded = encodeForAjax({postID: pID, accountID: aID, points: points});

  request.send(encoded);
  event.preventDefault();

  });
}

let downvoteSection = document.getElementsByClassName("downvote");

for(let i = 0; i < downvoteSection.length; i++){
  downvoteSection[i].addEventListener("click", function(){

  currentPoints = downvoteSection[i]["previousElementSibling"]["previousElementSibling"]["previousElementSibling"]["previousElementSibling"];
  let points = currentPoints.getAttribute("value");

  if(likeFlag==0) points--;
  else points=points-2;
  currentPoints.setAttribute("value",points);
  likeFlag = 0;

  let accountData = downvoteSection[i]["previousElementSibling"]["previousElementSibling"];
  let postData = downvoteSection[i]["previousElementSibling"];

  let pID = postData.getAttribute("value");
  let aID = accountData.getAttribute("value");

  let request = new XMLHttpRequest();
  request.addEventListener("load", receivePoints);
  
  request.open("POST", "subtract_point.php", true);
  request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  let encoded = encodeForAjax({postID: pID, accountID: aID, points: points});

  request.send(encoded);
  event.preventDefault();
  });
}

function encodeForAjax(data) {
  return Object.keys(data).map(function(k){
    return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
  }).join('&');
}

function receivePoints(event) {
  let points = JSON.parse(this.responseText);
  currentPoints.innerHTML = '<span class="points">Points: ' + points[0] + '</span>';
}

// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("createChannel");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal 
btn.onclick = function() {
  console.log("botao");
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  console.log("x");
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
