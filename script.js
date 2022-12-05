let loginButton = document.querySelector(".login")
let registerButton = document.querySelector(".register")
let buttonsClosePrompt = document.getElementsByClassName("promptClose")
let loginWindow = document.querySelector(".loginContainer")
let registerWindow = document.querySelector(".registerPrompt")
let searchBar = document.querySelector("#searchBar")
let buyButtons = document.getElementsByClassName("buyButton")
let itemFrames = document.getElementsByClassName("itemFrame")
let itemNames = document.getElementsByClassName("itemName")
let itemBottom = document.getElementsByClassName("itemBottom")

function searchBarHandler(){
  let input, filter, txtValue;
  input = document.getElementById('searchBar');
  filter = input.value.toUpperCase();

  for (i = 0; i < itemFrames.length; i++) {
    a = itemFrames[i].getElementsByClassName("itemName")[0];
    txtValue = a.textContent || a.innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      itemFrames[i].style.display = "";
    } else {
      itemFrames[i].style.display = "none";
    }
  }
}