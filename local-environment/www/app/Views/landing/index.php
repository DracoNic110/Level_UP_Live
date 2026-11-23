
<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="levelup-content">

        <!-- Live Now -->
        <section class="levelup-section">

            <div class="levelup-section-header">
                <div>
                    <h2><i class="fa fa-circle" style="color:#f0444e;font-size:9px;"></i> Live Now</h2>
                    <p>Discover what's happening right now</p>
                </div>
                <a href="<?= base_url('streams') ?>" class="levelup-section-link">
                    View all
                </a>
            </div>

            <?php
            $liveStreams = [
                ['title' => 'Ranked matches', 'creator' => 'Ninja', 'game' => 'Fortnite', 'viewers' => '12.4K'],
                ['title' => 'Road to Global', 'creator' => 'Shroud', 'game' => 'Counter-Strike 2', 'viewers' => '8.2K'],
                ['title' => 'Just Chatting', 'creator' => 'Ibai', 'game' => 'Just Chatting', 'viewers' => '24.1K'],
            ];
            ?>

            <div class="levelup-card-grid">
                <?php foreach ($liveStreams as $stream): ?>
                    <article class="levelup-video-card">
                        <div class="levelup-thumbnail">
                            <span class="levelup-live-badge">LIVE</span>
                        </div>

                        <div class="levelup-video-info">
                            <strong><?= esc($stream['title']) ?></strong>
                            <small>
                                <i class="fa fa-eye"></i>
                                <?= esc($stream['viewers']) ?>
                            </small>
                        </div>

                        <span class="levelup-video-description">
                            <?= esc($stream['creator']) ?> · <?= esc($stream['game']) ?>
                        </span>
                    </article>
                <?php endforeach; ?>
            </div>

        </section>

        <!-- Popular Games VODs -->
        <section class="levelup-section" id="games">

            <div class="levelup-section-header">
                <div>
                    <h2>Popular Games VODs</h2>
                    <p>Watch the most popular gaming moments</p>
                </div>
                <a href="<?= base_url('vod') ?>" class="levelup-section-link">
                    View all
                </a>
            </div>

            <?php
            $gameVods = [
                ['title' => 'Epic Victory', 'game' => 'Fortnite', 'duration' => '42:18'],
                ['title' => 'Best Plays', 'game' => 'Valorant', 'duration' => '35:42'],
                ['title' => 'The Final Round', 'game' => 'Counter-Strike 2', 'duration' => '51:09'],
            ];
            ?>

            <div class="levelup-card-grid">
                <?php foreach ($gameVods as $vod): ?>
                    <article class="levelup-video-card">
                        <div class="levelup-thumbnail">
                            <span class="levelup-vod-badge">
                                <?= esc($vod['duration']) ?>
                            </span>
                        </div>

                        <div class="levelup-video-info">
                            <strong><?= esc($vod['title']) ?></strong>
                        </div>

                        <span class="levelup-video-description">
                            <?= esc($vod['game']) ?>
                        </span>
                    </article>
                <?php endforeach; ?>
            </div>

        </section>

        <!-- Popular Creators VODs -->
        <section class="levelup-section">

            <div class="levelup-section-header">
                <div>
                    <h2>Popular Creators VODs</h2>
                    <p>Catch up with your favourite creators</p>
                </div>
                <a href="<?= base_url('vod') ?>" class="levelup-section-link">
                    View all
                </a>
            </div>

            <?php
            $creatorVods = [
                ['title' => 'A day in the stream', 'creator' => 'Ninja', 'duration' => '1:12:34'],
                ['title' => 'Highlights of the week', 'creator' => 'Shroud', 'duration' => '28:45'],
                ['title' => 'Best moments', 'creator' => 'Ibai', 'duration' => '46:20'],
            ];
            ?>

            <div class="levelup-card-grid">
                <?php foreach ($creatorVods as $vod): ?>
                    <article class="levelup-video-card">
                        <div class="levelup-thumbnail">
                            <span class="levelup-vod-badge">
                                <?= esc($vod['duration']) ?>
                            </span>
                        </div>

                        <div class="levelup-video-info">
                            <strong><?= esc($vod['title']) ?></strong>
                        </div>

                        <span class="levelup-video-description">
                            <?= esc($vod['creator']) ?>
                        </span>
                    </article>
                <?php endforeach; ?>
            </div>

        </section>

</div>

<?= $this->endSection() ?>
