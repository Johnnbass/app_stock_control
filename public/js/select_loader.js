function loadSelect(select) {
  $.getJSON(`/api/${select[1]}`, function(data) {
      for (let i = 0; i < data.length; i++) {
          option = `<option value="${data[i].id}">${data[i].name}</option>`;
          $(`#${select[0]}_id`).append(option);
      }
  });
}