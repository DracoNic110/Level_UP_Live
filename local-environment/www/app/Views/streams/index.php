
<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="levelup-streams-page">

    <main class="levelup-content">

        <div class="levelup-section-header">
            <div>
                <h1>
                    <?= empty($selectedCategory)
                        ? 'Live Streams'
                        : esc($selectedCategory) ?>
                </h1>

                <p>
                    <?= count($streams) ?> emissions
                    <?php if (!empty($selectedCategory)): ?>
                        in this category
                    <?php else: ?>
                        currently listed
                    <?php endif; ?>
                </p>
            </div>
        </div>

        <nav class="levelup-category-filters" aria-label="Filter streams by category">
            <a href="<?= base_url('streams') ?>"
               class="levelup-category-filter <?= empty($selectedCategory) ? 'active' : '' ?>"
               <?= empty($selectedCategory) ? 'aria-current="page"' : '' ?>>
                <i class="fa fa-th-large" aria-hidden="true"></i>
                <span>All streams</span>
            </a>

            <?php foreach ($categories as $category): ?>
                <a href="<?= base_url('streams') . '?category=' . rawurlencode($category) ?>"
                   class="levelup-category-filter <?= ($selectedCategory ?? '') === $category ? 'active' : '' ?>"
                   <?= ($selectedCategory ?? '') === $category ? 'aria-current="page"' : '' ?>>
                    <i class="fa fa-gamepad" aria-hidden="true"></i>
                    <span><?= esc($category) ?></span>
                </a>
            <?php endforeach; ?>
        </nav>

        <?php if (empty($streams)): ?>

            <div class="levelup-empty-state">
                <i class="fa fa-video-camera"></i>
                <h2>No streams found</h2>
                <p>There are currently no streams in this category.</p>
                <a href="<?= base_url('streams') ?>">View all streams</a>
            </div>

        <?php else: ?>

            <div class="levelup-card-grid">

                <?php foreach ($streams as $stream): ?>

                    <a class="levelup-video-card"
                       href="<?= base_url('streams/' . rawurlencode($stream['id'])) ?>">

                        <div class="levelup-thumbnail"
                             style="background: linear-gradient(135deg, <?= esc($stream['color']) ?>, #171717);">

                            <div class="levelup-thumbnail-content">
                                <i class="fa <?= esc($stream['icon']) ?>"></i>
                                <span><?= esc($stream['category']) ?></span>
                            </div>

                            <?php if ($stream['live']): ?>
                                <span class="levelup-live-badge">LIVE</span>
                            <?php else: ?>
                                <span style="position:absolute;top:10px;left:10px;background:#555;color:white;padding:4px 8px;border-radius:4px;font-size:11px;">
                                    OFFLINE
                                </span>
                            <?php endif; ?>

                        </div>

                        <div class="levelup-video-info">
                            <div class="levelup-video-description">
                                <h3><?= esc($stream['title']) ?></h3>
                                <p><?= esc($stream['creator']) ?></p>
                                <span><?= esc($stream['category']) ?></span>
                            </div>
                        </div>

                    </a>

                <?php endforeach; ?>

            </div>

        <?php endif; ?>

    </main>

</div>

</div>

<?= $this->endSection() ?>
