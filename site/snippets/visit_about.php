<div id="myTopSidebar" class="top-sidebar" style="--theme:<?= $site->footer_theme() ?>;display:none">
    <!-- <div id="myTopSidebar" class="top-sidebar" style="display:none"> -->
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">CLOSE</a>
    <?php foreach ($site->modules()->toLayouts() as $layout) : ?>
        <section class="section grid" style="--gutter: 1.5rem" id="<?= esc($layout->id(), 'attr') ?>">
            <?php foreach ($layout->columns() as $column) : ?>
                <div class="column" style="--columns: <?= esc($column->span(), 'css') ?>">
                    <div class="blocks text">
                        <?= $column->blocks() ?>
                    </div>
                </div>
            <?php endforeach ?>
        </section>
    <?php endforeach ?>
</div>