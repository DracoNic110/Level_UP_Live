
<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="levelup-main">

    <aside class="levelup-sidebar">
        <div class="levelup-sidebar-heading">
            <h2>Live categories</h2>
        </div>

        <div class="levelup-creator">
            <span class="levelup-avatar">F</span>
            <div class="levelup-creator-info">
                <strong>Fortnite</strong>
                <small>Battle Royale</small>
            </div>
        </div>

        <div class="levelup-creator">
            <span class="levelup-avatar">V</span>
            <div class="levelup-creator-info">
                <strong>Valorant</strong>
                <small>FPS</small>
            </div>
        </div>

        <div class="levelup-creator">
            <span class="levelup-avatar">C</span>
            <div class="levelup-creator-info">
                <strong>Counter-Strike 2</strong>
                <small>FPS</small>
            </div>
        </div>

        <div class="levelup-creator">
            <span class="levelup-avatar">J</span>
            <div class="levelup-creator-info">
                <strong>Just Chatting</strong>
                <small>Community</small>
            </div>
        </div>
    </aside>

    <div class="levelup-content">

        <section class="levelup-section">

            <div class="levelup-section-header">
                <div>
                    <h2><i class="fa fa-circle" style="color:#f0444e;font-size:9px;"></i> Live Streams</h2>
                    <p>Explore all currently active broadcasts</p>
                </div>
            </div>

            <?php
            $streams = [
                ['id' => '1', 'title' => 'Ranked matches', 'creator' => 'Ninja', 'game' => 'Fortnite', 'viewers' => '12.4K'],
                ['id' => '2', 'title' => 'Road to Global', 'creator' => 'Shroud', 'game' => 'Counter-Strike 2', 'viewers' => '8.2K'],
                ['id' => '3', 'title' => 'Just Chatting', 'creator' => 'Ibai', 'game' => 'Just Chatting', 'viewers' => '24.1K'],
                ['id' => '4', 'title' => 'Competitive gameplay', 'creator' => 'Pokimane', 'game' => 'Valorant', 'viewers' => '5.3K'],
                ['id' => '5', 'title' => 'Survival adventure', 'creator' => 'Rubius', 'game' => 'Minecraft', 'viewers' => '9.7K'],
            ];
            ?>

            <div class="levelup-card-grid">

                <?php foreach ($streams as $stream): ?>
                    <a href="<?= base_url('streams/' . $stream['id']) ?>" class="levelup-video-card">

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

                    </a>
                <?php endforeach; ?>

            </div>

        </section>

    </div>

</div>

<?= $this->endSection() ?>
