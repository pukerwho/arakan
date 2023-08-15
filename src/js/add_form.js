var $ = require("jquery");

const addForm = document.querySelector("#form_add");
addForm.addEventListener('submit', (e) => {
  e.preventDefault();
  const title = document.querySelector('#title-place').value;
  const city = document.querySelector('#city-place').value;
  const email = document.querySelector('#email-place').value;
  const address = document.querySelector('#address-place').value;
  const menu = document.querySelector('#menu-place').value;
  const price = document.querySelector('#price-place').value;
  const parkingCheckbox = document.querySelector('#parking-checkbox').value;
  const wifiCheckbox = document.querySelector('#wifi-checkbox').value;
  const banketCheckbox = document.querySelector('#banket-checkbox').value;
  const menuCheckbox = document.querySelector('#menu-checkbox').value;
  const summerCheckbox = document.querySelector('#summer-checkbox').value;
  const musicCheckbox = document.querySelector('#music-checkbox').value;
  const hookanCheckbox = document.querySelector('#hookan-checkbox').value;
  const vipCheckbox = document.querySelector('#vip-checkbox').value;
  const biznesCheckbox = document.querySelector('#biznes-checkbox').value;
  const deliveryCheckbox = document.querySelector('#delivery-checkbox').value;
  const kidsCheckbox = document.querySelector('#kids-checkbox').value;
  const corpCheckbox = document.querySelector('#corp-checkbox').value;
  const weddingCheckbox = document.querySelector('#wedding-checkbox').value;
  const cardCheckbox = document.querySelector('#card-checkbox').value;
  let data = {
    'action': 'telegram_add_action',
    'title': title,
    'city': city,
    'email': email,
    'address': address,
    'menu': menu,
    'price': price,
    'parkingCheckbox': parkingCheckbox,
    'wifiCheckbox': wifiCheckbox,
    'banketCheckbox': banketCheckbox,
    'menuCheckbox': menuCheckbox,
    'summerCheckbox': summerCheckbox,
    'musicCheckbox': musicCheckbox,
    'hookanCheckbox': hookanCheckbox,
    'vipCheckbox': vipCheckbox,
    'biznesCheckbox': biznesCheckbox,
    'deliveryCheckbox': deliveryCheckbox,
    'kidsCheckbox': kidsCheckbox,
    'corpCheckbox': corpCheckbox,
    'weddingCheckbox': weddingCheckbox,
    'cardCheckbox': cardCheckbox,
  };
  $.ajax({
    url: ajaxurl,
    data: data,
    type: 'POST',
    beforeSend : function(xhr) {
      console.log('Загружаю')
    },
    success : function(data) {
      if (data) {
        console.log("відправили");
        addForm.reset();       
        document.querySelector(".add-success").classList.remove("hidden");  
      }
    }
  });
  return;
})