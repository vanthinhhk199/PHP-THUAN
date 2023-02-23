$(document).ready(function () {
    
    $(document).on('click', '.delete_product_btn', function (e) {
      
        e.preventDefault();
        
        var id = $(this).val();

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              $.ajax({
                method: "POST",
                url: "code.php",
                data: {
                    'product_id':id,
                    'delete_product_btn': true
                },
                success: function (response){
                    if (response == 200)
                    {
                        swal("Success!", "Product deleted Successfully!", "success");
                        $('#products_table').load(location.href + "#products_table");

                    }else if(response == 200)
                    {
                      swal("Error!", "Something went wrong!", "error");
                    }
                }
              });
            }
          });
    });

});