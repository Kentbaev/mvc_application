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

            <div class="table-responsive" style="margin: 20px;height: 500px;">
                <table class="table table-striped table-sm client_table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>ФИО</th>
                        <th>Номер телефона</th>
                        <th>Компания</th>
                        <th>Должность</th>
                        <th>Редактировать</th>
                        <th>Удалить</th>
                    </tr>
                    </thead>
                    <tbody style="overflow-y: scroll;">
                    <?php foreach($pageData['clients'] as $client) : ?>
                        <tr class="client_table_item">
                            <td><?=$client['client_id'];?></td>
                            <td onclick="document.location ='<?=HOST;?>client/index?client_id=<?=$client['client_id'];?>';"><?=$client['client_full_name'];?></td>
                            <td><?=$client['client_phone_number'];?></td>
                            <td><?=$client['company_name'];?></td>
                            <td><?=$client['profession'];?></td>
                            <td onclick="clientUpdate('<?=$client['client_id'];?>','<?=$client['client_full_name'];?>','<?=$client['client_email'];?>','<?=$client['client_phone_number'];?>','<?=$client['profession_id'];?>','<?=$client['company_id'];?>');" data-toggle="modal" data-target="#widget_modal"><i class="far fa-edit"></i></td>
                            <td onclick="document.location ='<?=HOST;?>client/delete?client_id=<?=$client['client_id'];?>';"><i class="far fa-times-circle"></i></td>
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
                        <form action="<?=HOST;?>client/update"  method="post">
                            <div class="modal-body">
                                <input name="client_id" class="client_id" type="hidden" value="">
                                <input name="client_full_name" class="client_full_name w-100" placeholder="ФИО" value="">
                                <input name="client_email" class="client_email w-100" placeholder="Почта">
                                <input name="client_phone_number" class="client_phone_number w-100" placeholder="Номер телефона">
                                <select class="company_id w-100" name="company_id">
                                    <?php foreach($pageData['companies'] as $company) : ?>
                                        <option value="<?=$company['company_id'];?>"><?=$company['company_name'];?></option>
                                    <?php endforeach;?>
                                </select>
                                <select class="profession_id w-100" name="profession_id">
                                    <?php foreach($pageData['professions'] as $profession) : ?>
                                        <option value="<?=$profession['profession_id'];?>"><?=$profession['profession'];?></option>
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
                            <p class="modal-title" id="exampleModalLongTitle">Новый клиент</p>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?=HOST;?>client/insert"  method="post">
                            <div class="modal-body">
                                <input name="client_full_name_ins" class="client_full_name w-100" placeholder="ФИО" value="">
                                <input name="client_email_ins" class="client_email w-100" placeholder="Почта">
                                <input name="client_phone_number_ins" class="client_phone_number w-100" placeholder="Номер телефона">
                                <select class="company_id w-100" name="company_id_ins">
                                    <?php foreach($pageData['companies'] as $company) : ?>
                                        <option value="<?=$company['company_id'];?>"><?=$company['company_name'];?></option>
                                    <?php endforeach;?>
                                </select>
                                <select class="profession_id w-100" name="profession_id_ins">
                                    <?php foreach($pageData['professions'] as $profession) : ?>
                                        <option value="<?=$profession['profession_id'];?>"><?=$profession['profession'];?></option>
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

    function clientUpdate(client_id,client_full_name,client_email,client_phone_number,profession_id,company_id) {
        $('#widget_modal .client_id').val(client_id);
        $('#widget_modal .client_full_name').val(client_full_name);
        $('#widget_modal .client_email').val(client_email);
        $('#widget_modal .client_phone_number').val(client_phone_number);

        $(".profession_id").each(function(){
            $(this).children("option").each(function(){
                if($(this).val() == profession_id)
                {
                    $(this)[0].selected = true;
                }
            });
        });

        $(".company_id").each(function(){
            $(this).children("option").each(function(){
                if($(this).val() == company_id)
                {
                    $(this)[0].selected = true;
                }
            });
        });

    }

</script>

<?php require_once 'footer.php'; ?>
