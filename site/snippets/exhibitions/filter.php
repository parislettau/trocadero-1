<?php $pluck = $page->index(); ?>

<div class="filter-pane filter" style="">

    <div class="filter-pane-inner">

        <!-- artists -->
        <?php
        $artist = param('artist');
        if ($artist == "") {
            $toggle = "display:none";
            $rotate = "";
        } else {
            $toggle = "";
            $rotate = "rotate";
        }
        ?>
        <div style="margin-top:var(--small);">
            <div class="tag-filter filter-trigger" style="">
                <div class="">Artist</div>
                <div class="filter-trigger-icon <?= $rotate ?>"></div>
            </div>
            <div class="filters filters-artists" style="list-style:none;<?= $toggle ?>">
                <!-- artists -->
                <div class="tag-filter">
                    <!--fetch all artists -->
                    <?php $artists = $page->children()->listed()->pluck('artists', ',', true); ?>
                    <?php $activeTag = urlencode(urldecode(param('artist'))); ?>
                    <?php sort($artists); ?>
                    <?php foreach ($artists as $artist) : ?>
                        <a id="<?= urlencode($artist) ?>" class="tag <?= $activeTag === urlencode($artist)  ? ' active' : '' ?>" href="<?= $activeTag === urlencode($artist)  ? url($page->url()) : url($page->url(), ['params' => ['artist' => urlencode($artist)]]) ?> " style="display:block"><span class="underline" data-filter="<?= str::slug($artist) ?>"><?= html($artist) ?></span></a>
                    <?php endforeach ?>
                </div>

            </div>
        </div>

        <!-- year -->
        <?php
        $year = param('year');
        if ($year == "") {
            $toggle = "display:none";
            $rotate = "";
        } else {
            $toggle = "";
            $rotate = "rotate";
        }
        ?>
        <div style="margin-top:var(--small);">
            <div class="tag-filter filter-trigger" style="">
                <div class="">Year</div>
                <div class="filter-trigger-icon <?= $rotate ?>"></div>
            </div>
            <div class="filters filters-artists" style="list-style:none;<?= $toggle ?>">
                <!-- years -->
                <div class="tag-filter">
                    <!--fetch all years -->
                    <?php
                    $events = $page->children()->listed()->map(function ($event) {
                        $event->year = $event->startDate()->toDate('Y');
                        return $event;
                    });
                    $years = $events->pluck('year', ',', true);
                    ?>
                    <?php $activeTag = urlencode(urldecode(param('year'))); ?>
                    <?php sort($years); ?>
                    <?php foreach ($years as $year) : ?>
                        <a class="tag <?= $activeTag === urlencode($year)  ? ' active' : '' ?>" href="<?= $activeTag === urlencode($year)  ? url($page->url()) : url($page->url(), ['params' => ['year' => urlencode($year)]]) ?>" style="display:block"><span class="underline" data-filter="<?= str::slug($year) ?>"><?= html($year) ?></span></a>
                    <?php endforeach ?>
                </div>

            </div>
        </div>

        <!-- category -->
        <?php
        $category = param('category');
        if ($category == "") {
            $toggle = "display:none";
            $rotate = "";
        } else {
            $toggle = "";
            $rotate = "rotate";
        }
        ?>
        <div style="margin-top:var(--small);">
            <div class="tag-filter filter-trigger" style="">
                <div class="">Category</div>
                <div class="filter-trigger-icon <?= $rotate ?>"></div>
            </div>
            <div class="filters filters-artists" style="list-style:none;<?= $toggle ?>">
                <!-- category -->
                <div class="tag-filter">
                    <!--fetch all categories -->
                    <?php $category = $page->children()->listed()->pluck('category', ',', true); ?>
                    <?php $activeTag = urlencode(urldecode(param('category'))); ?>
                    <?php sort($category); ?>
                    <?php foreach ($category as $category) : ?>


                        <a class="tag <?= $activeTag === urlencode($category)  ? ' active' : '' ?>" href=" <?= $activeTag === urlencode($category) ? $page->url() : url($page->url(), ['params' => ['category' => urlencode($category)]]) ?>" style="display:block"><span class="underline" data-filter="<?= str::slug($category) ?>"><?= html($category) ?></span></a>
                    <?php endforeach ?>
                </div>

            </div>
        </div>


        <script>
            $(document).ready(function() {
                $(".filter-trigger").click(function() {
                    $(this).parent().find(".filters-artists").slideToggle("fast");
                    $(this).find(".filter-trigger-icon").toggleClass("rotate").slide
                });
            });
        </script>


    </div>