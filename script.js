
    const btnAdd = documentgetElementById('btnAddReminder');
    const btnHistory = documentgetElementById('btnReminderHistory');

    btnAdd.addEventListener('click',  () => {
        var form = document.getElementById("addReminder");
        if (form.style.display === "none") {
            form.style.display = "block";
        } else {
            form.style.display = "none";
        }
    }

    Function formDisplay()
    {
        var form = document.getElementById("addReminder");
        if (form.style.display === "none") {
            form.style.display = "block";
        } else {
            form.style.display = "none";
        }
    }



});
