$('form').submit(function(e) {
    e.preventDefault();

    $.ajax({
        url: '/theloai/search',
        type: 'POST',
        data: {
            _token: $('input[name=_token]').val(),
            title: $('input[name=tentheloai]').val()
        }, success: function(res) {
          

        }, error: function(error) {
            console.log(error);
        }
    })
})