$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": "{{ csrf_token() }}",
        Accept: "application/json"
    }
});

const form = document.querySelector("form"); // captura o form e seus elementos
const menuForm = form.attributes.id.value; // captura o nome do menu pelo id do form
const menu = menuForm.replace("Form", ""); // remove o padrão Form, mantendo apenas o nome do menu

const labels = form.getElementsByTagName("label"); // captura as labels dos campos
const fields = [];
for (label of labels) {
    fields.push(label.attributes.for.value); // popula o array fields com os nomes dos campos através do for dos labels
}

const menus = {
    vendor: "fornecedor",
    category: "categoria",
    product: "produto"
};

const endpoint = `/api/${menus[menu]}/`;
const itemID = $("#id").val();

$(`#${menuForm}`).submit(function(e) {
    e.preventDefault();

    const formData = $(this).serialize();

    $.ajax({
        type: itemID ? "put" : "post",
        url: endpoint + itemID,
        data: formData,
        dataType: "json",
        complete: function(xhr, status) {
            // console.log(xhr.responseJSON);
            // alert('Debug')
        },
        success: function(response) {
            alert(
                "Dados " +
                    (itemID ? "atualizados" : "cadastrados") +
                    " com sucesso!"
            );
            location.assign(`/${menus[menu]}`);
        },
        error: function(xhr) {
            let error = xhr.responseJSON.errors;
            let ret = "";

            for (err in error) {
                ret += "* " + error[err] + "\n";
            }

            alert(ret);
        }
    });
});

function loadData(id) {
    $.getJSON(endpoint + id, function(data) {
        for (field of fields) {
            $(`#${field}`).val(data[field]);
        }
    });
}

$(function() {
    loadData(itemID);
});
