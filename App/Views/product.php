<?php require_once 'header.php'; ?>

<?php require_once 'menu.php'; ?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 h-100">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-12" style="font-size: larger;padding: 20px 0 20px 25px;background-color: #e6e6e6;border: 1px solid #dcd8d8;">
                <?=$pageData['title']?>
            </div>
            <div class="col-lg-10"></div>
            <div class="col-lg-2" style="float: right;margin: 10px;">
                <button  data-toggle="modal" data-target="#widget_modal_insert" class="btn btn-primary btn-block">Добавить</button>
            </div>

           <div class="col-lg-12">
               <div class="row prod">

               </div>
           </div>
            <div class="col-lg-12 pagination_count">
                <?php for($i = 1;$i <= $pageData['count']; $i++) :?>
                <div class="pag_page" onclick="pagination(this)"><?=$i;?></div>
                <?php endfor; ?>
            </div>
        </div>
    </div>

</main>



<script>

    var div = document.createElement('div');
    div.innerHTML='1';

    $(document).ready(function () {
        //$(div).addClass('active');
        $('.pag_page').eq(0).addClass('active');
        pagination(div)

    });


    function pagination(el) {

        currentPage = el.innerHTML;
        $(el).addClass('active');
        $(el).siblings().removeClass('active');
        limit = 4;
        $('.prod')[0].innerHTML = '';


        $.post('<?=HOST;?>product/select',{
            currentPage : currentPage,
            from : currentPage * limit - limit,
            limit : limit
        },function (data) {
            if(data)
            {
                console.log(JSON.parse(data));
                dat = JSON.parse(data);
                $(dat.rows).each(function (index, value){
                    $(value).each(function (i, val){
                        $('.prod').append(
                            ` <div class="col-lg-2 product_page" style="margin: 5px;border: 1px solid #ccc;padding-bottom: 20px;"><span class="widget_span">ID:</span>`
                            + val.product_id +
                            `<br><div style="
                                margin: 25px auto;
                                width: 150px;
                                height: 150px;
                                background-size: cover;
                                box-shadow: inset 0 0 1rem 6px rgba(0, 0, 0, 0.39);
                                background: url(/login/App/resource/account/avatars/no_product.png);
                             "></div>`+
                             `<br><span class="widget_span">Наименования :</span><br><span class="wid_span">`
                            + val.product_name +
                            `</span><br><span class="widget_span">Описания:</span><br><span class="wid_span">`
                            + val.product_description +
                            `</span><br><span class="widget_span">Остаток:</span><span class="wid_span>">`
                            + val.product_count +
                            `</span></div>`)
                    });
                })

            }
            else
            {
                console.log('error')

            }
        })
    }



</script>

<?php require_once 'footer.php'; ?>
