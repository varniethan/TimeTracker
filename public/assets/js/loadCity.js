<script type='text/javascript'>

    $(document).ready(function(){

    // Country Change
    $('#sel_country').change(function(){

        // Country id
        var id = $(this).val();

        // Empty the dropdown
        $('#sel_city').find('option').not(':first').remove();

        // AJAX request
        $.ajax({
            url: 'getCities/'+id,
            type: 'get',
            dataType: 'json',
            success: function(response){

                var len = 0;
                if(response['data'] != null){
                    len = response['data'].length;
                }

                if(len > 0){
                    // Read data and create <option >
                    for(var i=0; i<len; i++){
                        var id = response['data'][i].id;
                        var name = response['data'][i].name;
                        var option = "<option value='"+id+"'>"+name+"</option>";
                        $("#sel_city").append(option);
                    }
                }

            }
        });
    });

});

</script>
