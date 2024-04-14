function changeStatus(modelRequest, flow, require_reason, request_type)
{
    var confirmMessage = "¿Estás seguro de cambiar de estado?";
    if (confirm(confirmMessage))
    {
        var comments = null;
        if(require_reason)
        {
            comments = prompt("Ingrese un motivo:");
        }
        if (comments !== null || !require_reason)
        {
            var url = "/requests/change-status" + "/" + modelRequest + "/" + flow;
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                data: {comments:comments},
                success: function(data) {
                    if(typeof getRequests === 'function')
                    {
                        getRequests(request_type);
                    }
                    else
                    {
                        window.location.reload();
                    }
                },
                error: function(error) {
                    var errorMessage = 'Ha ocurrido un error en la petición AJAX.';
                    if (error.responseJSON && error.responseJSON.errors)
                    {
                        errorMessage = '';
                        var errors = error.responseJSON.errors;
                        for (var key in errors)
                        {
                            if (errors.hasOwnProperty(key))
                            {
                                errorMessage += key + ': ' + errors[key][0] + '\n';
                            }
                        }
                    }
                    else if (error.responseJSON && error.responseJSON.message)
                    {
                        errorMessage = error.responseJSON.message;
                    }

                    alert(errorMessage);
                }
            });
        }
    }
}

function modelAction(type, request_id)
{
    var token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url: '/requests/action/' + type,
        type: 'POST',
        data: {
            _token: token,
            request_ids: [request_id]
        },
        success: function(data) {
            console.log(data);
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}