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
    $.getJSON(endpoint, function(data) {
        for (let i = 0; i < data.length; i++) {
            let line = mountLine(data[i]);
            $(`#${menuTable}>tbody`).append(line);
        }
    });
}

function deleteData(id) {
    let res = confirm(
        `Este(a) ${menus[menu]} será excluído, esta ação não pode ser revertida. Deseja prosseguir?`
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

                console.log("Ocorreu um erro inesperado: " + error);
            }
        });
    }
}

function editData(id) {
    location.assign(`/${menus[menu]}/editar/${id}`);
}

$(function() {
    loadData();
});
