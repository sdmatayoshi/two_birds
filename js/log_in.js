function eye(a, b) {
    if (document.getElementById(a).type == "text") {
        document.getElementById(a).type = "password"
    } else {
        document.getElementById(a).type = "text"
    }
    if (document.getElementById(b).className == "bi bi-eye-slash-fill form-control") {
        document.getElementById(b).className = "bi bi-eye-fill form-control"
    } else {
        document.getElementById(b).className = "bi bi-eye-slash-fill form-control"
    }
}
function a_send(event) {
    if (event.key == "Enter") {
        document.getElementById("send").click();
    }
}
document.getElementById("send").addEventListener("click", () => {
    if (document.getElementById("exampleInputEmail1").value && document.getElementById("username").value) {
        $.ajax({
            type: "POST",
            url: 'log_in.php',
            data: { "password": document.getElementById("exampleInputEmail1").value, "username": document.getElementById("username").value, "cierto": document.getElementById("cierto").checked },
            success: function (response) {
                var jsonData = JSON.parse(response);
                if (jsonData.error) {
                    document.getElementById("error").removeAttribute("hidden")
                }
                else if (jsonData.exito) {
                    location.href = "my_profile.php";
                }
            }
        });
    }
})