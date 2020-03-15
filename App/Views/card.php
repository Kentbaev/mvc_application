<?php require_once 'header.php'; ?>

<?php require_once 'menu.php'; ?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 h-100">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-12" style="font-size: larger;padding: 20px;background-color: #e6e6e6;border: 1px solid #dcd8d8;"><?=$pageData['title']?></div>
            <?php foreach($pageData[ 'clients' ] as $client) : ?>
                <div class="col-lg-4 widget">
                    <div class=" widget_card h-100">
                        <div class="client-avatar" style="<?=$pageData['client_avatar'] ?? 'background: url(/login/App/resource/account/avatars/no_ava.png);';?>">

                        </div>
                        <div class="card_col">
                            <span class="card_header">Фио</span>
                            <div class="card_block">
                                <?=$client[ 'client_full_name' ]?>
                            </div>
                        </div>

                        <div class="card_col">
                            <span class="card_header">Номер телефона</span>
                            <div class="card_block">
                                <?=$client[ 'client_phone_number' ];?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 widget">
                    <div class="widget_card h-100">
                        <div class="card_col">
                            <span class="card_header">Адрес</span>
                            <div class="card_block">
                                    <label for="to">Кому:</label>
                                    <select class="w-100" name="to" id="to">
                                        <option value="<?=$client[ 'client_email' ];?>"><?=$client[ 'client_email' ];?></option>
                                    </select>
                                    <input type="hidden" name="to_name" id="to_name" value="<?=$client[ 'client_full_name' ]?>">
                                    <label for="subject" style="display: block;">Тема<input class="w-100" type="text" name="subject" id="subject" maxlength="255"></label>
                                    <label for="name" style="display: block;">Ваше имя <input class="w-100" type="text" name="name" id="name" maxlength="255"></label>
                                    <textarea class="w-100" cols="30" rows="8" name="text" id="text" placeholder="Сообщение"></textarea><br>
                                    <button class="btn btn-primary btn-block" onclick="sendMail();">Отправить</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 widget">
                    <div class="widget_card h-100">

                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</main>


<script>
    $(document).ready(function(){

        $('.crm-nav-item').eq(0).addClass('active');

    });

    function sendMail() {

        $('.card_block').hide();
        $('.card_header').text('Sending');

        $.post("<?=HOST;?>mail/send",
            {
                to: $('#to').val(),
                to_name: $('#to_name').val(),
                subject: $('#subject').val(),
                name: $('#name').val(),
                text: $('#text').val()

            },
            function (data) {
                if (data.success) {
                    console.log(data);
                    $('.card_block').show();
                    $('.card_header').text('Сообщение успешно отправлено');
                } else {
                    console.log(data);
                }
            },"json"
        )
    }
</script>

<?php require_once 'footer.php'; ?>
