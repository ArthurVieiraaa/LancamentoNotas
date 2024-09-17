const openModalButtons = document.querySelectorAll("#open-modal, #open-modal-classic");
const closeModalButton = document.querySelector("#close-modal");
const modal = document.querySelector("#modal");
const fade = document.querySelector("#fade");

const toggleModal = () => {
  modal.classList.toggle("hide");
  fade.classList.toggle("hide");
};

openModalButtons.forEach((button) => {
  button.addEventListener("click", () => toggleModal());
});


[closeModalButton, fade].forEach((el) => {
  el.addEventListener("click", () => toggleModal());
});