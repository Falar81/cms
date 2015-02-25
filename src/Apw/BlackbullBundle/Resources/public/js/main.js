/**
 * Created by fabio on 20/02/15.
 */

$(document).ready(function(){
    $('#categoryTbl').DataTable({
        //options
    });

    $(".listCategoryToMove").click(function() {

        var id = $(this).attr('id');
        $('.categoriesList > a').remove();
        $.ajax({
            type: 'get',
            url: Routing.generate('apw_blackbull_categories_listcategorytomove',{id: id}),
            success: function(data){
                $.each(data.categoriesName, function(key, value) {
                    $('.categoriesList').append('<a href=\"' + Routing.generate('apw_blackbull_categories_listcategorytomove',{id: id}) + '\" class=\"list-group-item\">' + value + '</a>');
                })
            }
        });
    });
});
