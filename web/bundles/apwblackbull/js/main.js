/**
 * Created by fabio on 20/02/15.
 */

$(document).ready(function(){
    $('#categoryTbl').DataTable({
        //options
    });

    $(".listCategoryToMove").click(function() {

        $('.categoriesList > a').remove();
        $.ajax({
            type: 'get',
            url: Routing.generate('apw_blackbull_categories_listcategorytomove',{id:$(this).attr('id')}),
            success: function(data){
                $.each(data.categoriesName, function(key, value) {
                    $('.categoriesList').append('<a href="#" class="list-group-item">' + value + '</a>');
                })
            }
        });
    });
});
