var $ = require("jquery");

const addForm = document.querySelector("#form_add");
$(document).on('submit', '#form_add', function(e){
  e.preventDefault();
  sendMessage(addForm);
  // const title = document.querySelector('#title-place').value;
  // const city = document.querySelector('#city-place').value;
  // const email = document.querySelector('#email-place').value;
  
})

function sendMessage(addForm) {
  const formData = new FormData(addForm);
  let data = {
    'action': 'telegram_add_action',
    // 'title': title,
    // 'city': city,
    // 'email': email,
    'formData': formData
  };
  $.ajax({
    url: ajaxurl,
    processData: false,
    contentType: false,
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
}