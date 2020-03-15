<nav class="navbar navbar-dark fixed-top flex-md-nowrap shadow" style="background-color: #4a76a8;">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#"></a>
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="<?=HOST;?>user/logout"><i class="fas fa-power-off"></i></a>
        </li>
    </ul>
</nav>

<div class="container-fluid" style="margin-top: 16px;">
    <div class="row">
        <nav class="sidebar_dashboard col-md-2 d-none d-md-block sidebar bg-dark h-100" style="position: fixed;top: 56px;z-index: 1030;">

            <a href="<?=HOST;?>dashboard/index"><div class="account-avatar"></div></a>

            <div class="sidebar-sticky" style="padding: 20px 0;">
                <ul class="accordeon">
                    <?php foreach ($pageData['menu'] as $item) : ?>
                        <li class="nav-item crm-nav-item  <?=$item['main_menu_item_href'] == $pageData['active'] ? 'active' : ''; ?>">
                            <a class="nav-link" style="padding-left: 30px;" href="<?=HOST . $item['main_menu_item_href']; ?>">
                                <span style="padding-right: 10px;"><?=$item['main_menu_item_icon']; ?></span>
                                <?=$item['main_menu_item']; ?>
                                <span class="sr-only"></span>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </nav>