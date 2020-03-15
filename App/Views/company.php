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

            <div class="table-responsive" style="margin: 20px;">
                <table class="table table-striped table-sm company_table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Названия компаний</th>
                        <th>Адрес</th>
                        <th>Город</th>
                        <th>Редактировать</th>
                        <th>Удалить</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($pageData['companies'] as $company) : ?>
                        <tr class="company_table_item">
                            <td><?=$company['company_id'];?></td>
                            <td><?=$company['company_name'];?></td>
                            <td><?=$company['company_address'];?></td>
                            <td><?=$company['city_name'];?></td>
                            <td onclick="companyUpdate('<?=$company['company_id'];?>','<?=$company['company_name'];?>','<?=$company['company_address'];?>','<?=$company['city_id'];?>');" data-toggle="modal" data-target="#widget_modal"><i class="far fa-edit"></i></td>
                            <td onclick="document.location ='<?=HOST;?>company/delete?company_id=<?=$company['company_id'];?>';"><i class="far fa-times-circle"></i></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="widget_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <p class="modal-title" id="exampleModalLongTitle">Редактирование</p>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?=HOST;?>company/update"  method="post">
                            <div class="modal-body">
                                <input name="company_id" class="company_id w-100" type="hidden">
                                <input name="company_name" class="company_name w-100" placeholder="Названия компаний" value="">
                                <input name="company_address" class="company_address w-100" placeholder="Адрес">
                                <select class="city_id w-100" name="city_id">
                                    <?php foreach($pageData['cities'] as $city) : ?>
                                        <option value="<?=$city['city_id'];?>"><?=$city['city_name'];?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                                <button type="submit" class="btn btn-primary">Сохранить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>



            <div class="modal fade" id="widget_modal_insert" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <p class="modal-title" id="exampleModalLongTitle">Новая компания</p>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?=HOST;?>company/insert"  method="post">
                            <div class="modal-body">
                                <input name="company_name_ins" class="company_name w-100" placeholder="Названия компаний">
                                <input name="company_address_ins" class="company_address w-100" placeholder="Адрес">
                                <select class="city_id w-100" name="city_id_ins">
                                    <?php foreach($pageData['cities'] as $city) : ?>
                                        <option value="<?=$city['city_id'];?>"><?=$city['city_name'];?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                                <button type="submit" class="btn btn-primary">Добавить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

</main>
</div>
</div>


<script>

    function companyUpdate(company_id,company_name,company_address,city_id) {
        $('#widget_modal .company_id').val(company_id);
        $('#widget_modal .company_name').val(company_name);
        $('#widget_modal .company_address').val(company_address);
        $('#widget_modal .city_id').val(city_id);

        $(".city_id").each(function(){
            $(this).children("option").each(function(){
                if($(this).val() == profession_id)
                {
                    $(this)[0].selected = true;
                }
            });
        });

    }

</script>

<?php require_once 'footer.php'; ?>
