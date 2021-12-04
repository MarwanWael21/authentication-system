const form = document.querySelector("form"),
alert = form.querySelector(".alert")

form.onsubmit = e => {
    e.preventDefault();
}

function formSubmit($location, $herf){
    // starting ajax   
    let xhr = new XMLHttpRequest();
    xhr.open("POST", $location, true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                if (data !== "done") {
                    alert.style.display = "block";
                    alert.textContent = data;
                } else {
                    alert.style.display = "none";
                    location.href=$herf;
                }
            }
        }
    }
    let formData = new FormData(form); // Creating new form data object
    xhr.send(formData) // Sending Form Data To PHP
}
