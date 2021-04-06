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