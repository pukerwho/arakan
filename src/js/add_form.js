const addForm = document.querySelector("#form_add");
addForm.addEventListener("submit", (e) => {
  e.preventDefault();
  sendMessage(addForm);
})

async function sendMessage(addForm) {
  const formData = new FormData(addForm);
  if (formData) {
    const response = await fetch(ajaxurl, {
      method: "POST",
      body: formData
    });
    if (response.ok) {
      addForm.reset();
    }
  }
}