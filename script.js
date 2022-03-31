document.addEventListener("DOMContentLoaded", () => {
    const addReminder = document.querySelector("#addReminder");
    const reminderHistory = document.querySelector("#history");

    document.querySelector("#linkAddReminder").addEventListener("click", e =>{
        e.preventDefault();
        addReminder.classList.add("form--hidden");
        reminderHistory.classList.remove("form--hidden");
    });

    document.querySelector("#linkHistory").addEventListener("click", e =>{
        e.preventDefault();
        addReminder.classList.remove("form--hidden");
        reminderHistory.classList.add("form--hidden");
    });
});
