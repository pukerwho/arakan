var $ = require("jquery");

const addForm = document.querySelector("#form_add");
addForm.addEventListener("submit", (e) => {
  e.preventDefault();
  const title = document.querySelector('#title-place').value;
  const city = document.querySelector('#city-place').value;
  const email = document.querySelector('#email-place').value;
  let data = {
    'action': 'telegram_add_action',
    'title': title,
    'city': city,
    'email': email,
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