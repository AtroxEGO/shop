let items = document.getElementsByClassName("itemFrame");
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
        items[i].querySelector(".itemRealPrice").innerHTML = realPrice + "<span class='material-symbols-outlined'> attach_money</span>";
    }
}