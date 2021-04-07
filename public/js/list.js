const table = document.querySelector("table"); // captura a tabela e seus elementos
const menuTable = table.attributes.id.value; // captura o nome do menu pelo id da tabela
const menu = menuTable.replace("Table", ""); // remove o padrão Table, mantendo apenas o nome do menu

const menus = {
    vendor: "fornecedor",
    category: "categoria",
    product: "produto"
};

const endpoint = `/api/${menus[menu]}/`;
const itemID = $("#id").val();

function loadData() {
    $.ajax({
        type: "GET",
        url: endpoint,
        dataType: "json",
        beforeSend: function(request) {
            request.setRequestHeader("Authorization", localStorage.getItem('_token'));
        },
        success: function (data) {
            for (let i = 0; i < data.length; i++) {
                let line = mountLine(data[i]);
                $(`#${menuTable}>tbody`).append(line);
            }
        },
        complete: function (xhr, status) {
            if (status === 'error') {
                location.replace('/login');
            }
        },
        error: function (xhr, status) {

        }
    });
}

function deleteData(id) {
    let res = confirm(
        `Este item será excluído, esta ação não pode ser revertida. Deseja prosseguir?`
    );

    if (res) {
        $.ajax({
            method: "DELETE",
            url: endpoint + id,
            success: function(res) {
                alert(res.msg);
                location.assign(`/${menus[menu]}`);
            },
            error: function(xhr) {
                const error = xhr.responseJSON;
                console.error("Ocorreu um erro inesperado: " + error);
                location.replace('/');
            }
        });
    }
}

function editData(id) {
    location.assign(`/${menus[menu]}/editar/${id}`);
}

function getDateTime($date) {
    let date = new Date($date);
    let time = null;

    time =
        (date.getHours() < 10 ? "0" + date.getHours() : date.getHours()) +
        ":" +
        (date.getMinutes() < 10 ? "0" + date.getMinutes() : date.getMinutes());
    date =
        (date.getDate() < 10 ? "0" + date.getDate() : date.getDate()) +
        "/" +
        (date.getMonth() < 10 ? "0" + date.getMonth() : date.getMonth()) +
        "/" +
        date.getFullYear();

    return { date, time };
}

$(function() {
    loadData();
});
