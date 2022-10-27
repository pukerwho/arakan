$(".city-filter-submit-js").on("click", function () {
  let city_id = $(".city-filter-id").val();
  let keyArray = [];
  let checkedInputs = document.querySelectorAll(".filter-checkbox:checked");
  for (checkedInput of checkedInputs) {
    let checkedKey = checkedInput.dataset.key;
    keyArray.push(checkedKey);
  }
  $.ajax({
    type: "POST",
    url: "/wp-admin/admin-ajax.php",
    dataType: "html",
    data: {
      action: "filter_places_click_action",
      city_id: city_id,
      keyArray: keyArray,
    },
    success: function (res) {
      $("#response").html(res);
      closeModal();
    },
  });
});
