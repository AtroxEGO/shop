let item = document.querySelector(".itemPriceValue");
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
        realPrice = Math.round((price * item.innerHTML) * 100) / 100;
        document.querySelector(".priceUSD").innerHTML = realPrice + "<span class='material-symbols-outlined'> attach_money</span>";
}