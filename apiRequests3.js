let items = document.getElementsByClassName("ownedItemFrame");
let value = document.querySelector(".ownedRealValue")
let price = 0
// https://api.binance.com/api/v3/avgPrice?symbol=ETHUSDT


const api_url = 
      "https://api.binance.com/api/v3/avgPrice?symbol=ETHUSDT";
  
async function getapi(url) {
    const response = await fetch(url);
    var data = await response.json();
    price = data.price
    if (response) {
        show(data);
    }
    
}
getapi(api_url);
function show(data) {
    for(i = 0; i < items.length; i++){
        realPrice = Math.round((price * items[i].querySelector(".itemPriceValue").innerHTML) * 100) / 100;
        items[i].querySelector(".ownedItemRealPrice").innerHTML = realPrice + "<span class='material-symbols-outlined'> attach_money</span>";
    }
    value.innerHTML = (Math.round((Number(document.querySelector("#totalOwnedValue").innerHTML) * price) *100) / 100) + "<span class='material-symbols-outlined'> attach_money</span>";
}