let totalOwnedValue = document.querySelector("#totalOwnedValue")
let totalOwnedPrice = 0
let ownedPrices = document.getElementsByClassName("itemPriceValue")
let ownedItems = document.getElementsByClassName("ownedItemFrame")
let clickCount = 0

for(i=0;i < ownedPrices.length; i++){
    totalOwnedPrice += Number(ownedPrices[i].innerHTML)
}
totalOwnedValue.innerHTML = Math.round((totalOwnedPrice * 100)/100)

for(i=0;i < ownedItems.length; i++){
    ownedItems[i].addEventListener("click", function(){
        
    })
}

function searchBarHandler(){
    let input, filter, txtValue;
    input = document.getElementById('searchBar');
    filter = input.value.toUpperCase();
  
    for (i = 0; i < ownedItems.length; i++) {
      a = ownedItems[i].getElementsByClassName("ownedItemName")[0];
      txtValue = a.textContent || a.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        ownedItems[i].style.display = "";
      } else {
        ownedItems[i].style.display = "none";
      }
    }
  }


function nameClick(){
    if(clickCount == 0) {
        document.querySelector(".popup").innerHTML = "Delete All NFT's?";
        document.querySelector(".popup").style.display = "flex";
        clickCount++
        document.querySelector(".nameText").onClick = "";
    } else if(clickCount == 1){
        document.querySelector(".popup").innerHTML = "ARE YOU SURE?";
        clickCount++
    } else if(clickCount == 2){
        document.querySelector(".popup").style.display = "none";
        clickCount = 0
        document.querySelector(".nameText").onClick = "nameClick()";
        location.href = 'removeAll.php';
    }
}

function deleteOwned(object){
  console.log(object.parentElement.querySelector(".ownedItemName").getAttribute("ownedid"))
  let id = object.parentElement.querySelector(".ownedItemName").getAttribute("ownedid");
  let href = 'removeOne.php?id=' + id
  location.href = href
}

