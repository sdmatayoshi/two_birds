var id_c = "r1";

function responder(id_r) {
    const com = document.getElementById(id_r);
    if (id_r) {
        const ex = com.lastElementChild;
        if (ex.tagName == "DIV") {
            com.removeChild(ex);
        }
        else {
            if (document.getElementById("res_con")) {
                document.getElementById(id_c).removeChild(document.getElementById("res_con"));
            }
            id_c = id_r;
            const form = document.createElement("div");
            form.setAttribute("id", "res_con");
            form.setAttribute("style", "width:90%;");
            const textarea = document.createElement("textarea");
            textarea.setAttribute("required", "");
            textarea.setAttribute("class", "form-control");
            textarea.setAttribute("placeholder", "Deja una respuesta!");
            textarea.setAttribute("rows", "3");
            textarea.setAttribute("style", "resize: none;");
            textarea.setAttribute("id", "respuesta");
            form.appendChild(textarea);
            const br = document.createElement("br");
            form.appendChild(br);
            const id = id_r.split("r");
            const hide = document.createElement("input");
            hide.setAttribute("type", "hidden");
            hide.setAttribute("name", "comentid");
            hide.setAttribute("value", id[1]);
            form.appendChild(hide);
            const btn = document.createElement("button");
            const texto = document.createTextNode("Responder");
            btn.appendChild(texto);
            btn.setAttribute("class", "btn btn-primary");
            btn.setAttribute("style", "cursor:pointer; background-color:#7EBC12;");
            form.appendChild(btn);
            com.appendChild(form);
            activate_com();
        }
    }
}

document.getElementById("secom").addEventListener("click", () => {
    $.ajax({
        type: "POST",
        url: 'squeak.php?id='+id,
        data: { "comentario": document.querySelector("#atemp_com textarea").value },
        success: function (response) {
            var jsonData = JSON.parse(response);
            if (jsonData.comentario) {
                document.querySelector("#atemp_com textarea").value = "";
                document.querySelector("#com_con h2 span").innerHTML = parseInt(document.querySelector("#com_con h2 span").innerHTML) + 1;
                const con = document.querySelector("#com_con .comments");
                const newcon = document.createElement("div");
                newcon.setAttribute("id", "rt" + jsonData.comentario_id);
                con.prepend(newcon);
                con.prepend(document.createElement("br"));
                const newcom = document.createElement("div");
                newcom.className = "d-flex";
                newcom.innerHTML = '<div class="flex-shrink-0"><img class="rounded-circle" src="img/usuarios/' + jsonData.usuario_id + '/' + jsonData.foto + '" alt="..." style="width:40px;height:40px;" /></div><div class="ms-1" style="width:100%;" id="r' + jsonData.comentario_id + '"><div class="fw-bold">' + jsonData.user_name + '</div><div class="col-lg-16"><div class="card mb-4" style="border:none; background-color: transparent;"><div class="card-body" style="padding:0; padding-right:10px;"><div class="row"><p class="mb-0">'+jsonData.comentario+'</p></div></div></div></div><input type="button" value="Responder" style="border:none; background-color:transparent; font-weight:bold;" onclick="responder(\'r' + jsonData.comentario_id + '\')"></div>';
                con.prepend(newcom);
                con.prepend(document.createElement("br"));
            }
        }
    });
})

function activate_com() {
    document.querySelector("#res_con button").addEventListener("click", () => {
        if (document.querySelector("#res_con textarea").value && document.querySelector("#res_con input").value) {
            $.ajax({
                type: "POST",
                url: 'squeak.php?id='+id,
                data: { "respuesta": document.querySelector("#res_con textarea").value, "comentid": document.querySelector("#res_con input").value },
                success: function (response) {
                    var jsonData = JSON.parse(response);
                    if (jsonData.comentario) {
                        document.querySelector("#res_con textarea").value = "";
                        document.querySelector("#com_con h2 span").innerHTML = parseInt(document.querySelector("#com_con h2 span").innerHTML) + 1;
                        const con = document.getElementById("rt" + jsonData.comentario_id);
                        con.prepend(document.createElement("br"));
                        const newcom = document.createElement("div");
                        newcom.className = "d-flex";
                        newcom.setAttribute("style", "margin-left:50px;");
                        newcom.innerHTML = '<br><div class="flex-shrink-0"><img class="rounded-circle" src="img/usuarios/' + jsonData.usuario_id + '/' + jsonData.foto + '" alt="..." style="width:40px;height:40px;" /></div><div class="ms-3" style="width:100%;" ><div class="fw-bold">' + jsonData.user_name + '</div><div class="col-lg-16"><div class="card mb-4" style="border:none; background-color: transparent;"><div class="card-body" style="padding:0; padding-right:30px;"><div class="row"><p class="mb-0">'+jsonData.comentario+'</p></div></div></div></div></div>';
                        con.prepend(newcom);
                    }
                }
            });
        }
    })
}

function fav_s() {
    $.ajax({
        type: "POST",
        url: 'squeak.php?id='+id,
        data: { "fav": true },
        success: function (response) {
            var jsonData = JSON.parse(response);
            if (jsonData.star == true) {
                document.querySelector("#fav_send i").className = "fa-solid fa-star";
            }
            else {
                document.querySelector("#fav_send i").className = "fa-regular fa-star";
            }
        }
    });
}

function like_s() {
    $.ajax({
        type: "POST",
        url: 'squeak.php?id='+id,
        data: { "like": true },
        success: function (response) {
            var jsonData = JSON.parse(response);
            if (jsonData.like == true) {
                document.querySelector("#like_send i").className = "fa-solid fa-thumbs-up";
                document.querySelector("#likes span").innerHTML = parseInt(document.querySelector("#likes span").innerHTML) + 1;
            }
            else {
                document.querySelector("#like_send i").className = "fa-regular fa-thumbs-up";
                document.querySelector("#likes span").innerHTML = parseInt(document.querySelector("#likes span").innerHTML) - 1;
            }
        }
    });
}

function dislike_s() {
    $.ajax({
        type: "POST",
        url: 'squeak.php?id='+id,
        data: { "dislike": true },
        success: function (response) {
            var jsonData = JSON.parse(response);
            if (jsonData.dislike == true) {
                document.querySelector("#dislike_send i").className = "fa-solid fa-thumbs-down";
                document.querySelector("#dislikes span").innerHTML = parseInt(document.querySelector("#dislikes span").innerHTML) + 1;
            }
            else {
                document.querySelector("#dislike_send i").className = "fa-regular fa-thumbs-down";
                document.querySelector("#dislikes span").innerHTML = parseInt(document.querySelector("#dislikes span").innerHTML) - 1;
            }
        }
    });
}