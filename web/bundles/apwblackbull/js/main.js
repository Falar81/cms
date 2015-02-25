/**
 * Created by fabio on 20/02/15.
 */

$(document).ready(function(){
    $('#categoryTbl').DataTable({
        //options
    });

    $(".listCategoryToMove").click(function() {

        var id = $(this).attr('id');

        $.ajax({
            type: 'get',
            url: Routing.generate('apw_blackbull_categories_listcategorytomove',{id: id}),
            beforeSend: function(){
                $('.categoriesList').html('<i class="fa fa-spinner fa-spin fa-5x fa-fw"></i>');
            },
            success: function(data){
                $('.categoriesList > a').remove();
                $('.categoriesList').append(
                    '<a href=\"' +
                        Routing.generate('apw_blackbull_categories_movecategory',{fromId: id, toId: 0}) +
                        '\" class=\"list-group-item\"><i class="fa fa-home fa-2x"></i> Radice</a>'
                );
                $('#exampleModalLabel').text(data.categoryNameToMove);
                $.each(data.categoriesName, function(key, value) {
                    $('.categoriesList').append(
                        '<a href=\"' +
                            Routing.generate('apw_blackbull_categories_movecategory',{fromId: id, toId: key}) +
                            '\" class=\"list-group-item\"><i class="fa fa-folder-open-o"></i> ' +
                            value +
                            '</a>'
                    );
                });
                $('.categoriesList > i').remove();
            }
        });
    });
});
