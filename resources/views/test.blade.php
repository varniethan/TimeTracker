<!DOCTYPE html>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>

<!-- Country Dropdown -->
Country : <select id='sel_country' name='sel_country'>
    <option value='0'>-- Select Country --</option>

    <!-- Read Countries -->
    @foreach($countryData['data'] as $country)
        <option value='{{ $country->id }}'>{{ $country->name }}</option>
    @endforeach

</select>

<br><br>
<!-- Country Cities Dropdown -->
Cities : <select id='sel_city' name='sel_city'>
    <option value='0'>-- Select City --</option>
</select>

<!-- Script -->
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
</body>
</html>
