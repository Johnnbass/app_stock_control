function authenticate(formData) {
    $.ajax({
        type: "POST",
        url: "/api/login",
        data: formData,
        dataType: "json",
        success: function(response) {
            localStorage.setItem('_token', `Bearer ${response.token}`);
            location.assign("/");
        },
        complete: function(xhr, status) {
            if (status === "error") {
                location.replace("/login");
            }
        },
        error: function(xhr, status) {
          let ret = "";
          let error = xhr.responseJSON.errors;

          if (error) {
              for (err in error) {
                  ret += "* " + error[err] + "\n";
              }
          } else {
              ret = xhr.responseJSON.msg;
          }

          alert(ret);
        }
    });
}
