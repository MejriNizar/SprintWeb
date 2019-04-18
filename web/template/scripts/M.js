$("Document").ready(function ()
{
    $("#title").keyup(function ()
    {
        if ($(this).val().length > 0)
        {

            $.ajax
            (
                {
                    type: 'get',
                    url: 'http://127.0.0.1:8000/json/' + $(this).val(),
                    async: false,

                    success:function(response)
                    {
                        $("#test").html(response);

                    }
                }
            )
        }
    });
});