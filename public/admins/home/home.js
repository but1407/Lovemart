const container = document.querySelector(".container");

const ansNo = document.querySelector(".ansNo");
const ansYes = document.querySelector(".ansYes");

ansNo.onchange = () => {
    if (ansNo.checked) {
    setTimeout(() => {
        container.classList.add("active");
        setTimeout(() => {
        container.classList.remove("active");
        ansNo.checked = false;
        ansYes.checked = true;
        }, 4000);
    }, 300);
    }
};
