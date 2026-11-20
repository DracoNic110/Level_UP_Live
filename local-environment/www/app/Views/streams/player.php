
<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<?php
$creators = [
    ['name' => 'Fene_tm', 'game' => 'Yakuza 0', 'viewers' => '4.20K', 'color' => '#ef4444', 'live' => true],
    ['name' => 'NosBemo', 'game' => 'Minecraft', 'viewers' => '6.7K', 'color' => '#3b82f6', 'live' => true],
    ['name' => 'Franc117', 'game' => 'League of Legends', 'viewers' => '6.9K', 'color' => '#10b981', 'live' => true],
    ['name' => 'Glauja_Plays', 'game' => 'Elden Ring', 'viewers' => '', 'color' => '#8b5cf6', 'live' => false],
    ['name' => 'Billmin232', 'game' => 'Find The Needle', 'viewers' => '', 'color' => '#f59e0b', 'live' => false],
    ['name' => 'Annkomaki', 'game' => 'Valorant', 'viewers' => '', 'color' => '#ec4899', 'live' => false],
    ['name' => 'DracoNic110', 'game' => 'For Honor', 'viewers' => '', 'color' => '#4c00a8', 'live' => false],
];

$messages = [
    ['name' => 'Fene_tm', 'initial' => 'F', 'color' => '#ef4444', 'tag' => 'HOST', 'message' => "Welcome back to the stream! We're doing Majima Everywhere today and I'm taking subscriber questions."],
    ['name' => 'NosBemo', 'initial' => 'N', 'color' => '#3b82f6', 'tag' => '', 'message' => 'That Majima spawn was perfect timing.'],
    ['name' => 'Franc117', 'initial' => 'F', 'color' => '#10b981', 'tag' => 'SUB', 'message' => 'Sub Sunday is always the best Sunday.'],
    ['name' => 'Glauja_Plays', 'initial' => 'G', 'color' => '#8b5cf6', 'tag' => '', 'message' => 'Can you do the dance in front of the arcade?'],
    ['name' => 'Billmin232', 'initial' => 'B', 'color' => '#f59e0b', 'tag' => '', 'message' => 'Love the new stream overlay.'],
    ['name' => 'Annkomaki', 'initial' => 'A', 'color' => '#ec4899', 'tag' => '', 'message' => 'This run is so smooth.'],
    ['name' => 'DracoNic110', 'initial' => 'D', 'color' => '#4c00a8', 'tag' => '', 'message' => 'Keep the Majima clips coming.'],
];
?>

<div class="levelup-player-page">

    <!-- LEFT SIDEBAR: FOLLOWED CREATORS -->
    <aside class="levelup-player-sidebar" id="following">

        <div class="levelup-sidebar-heading">
            <h2>Followed creators</h2>
            <a href="#">Manage</a>
        </div>

        <?php foreach ($creators as $creator): ?>
            <div class="levelup-creator">

                <span class="levelup-avatar"
                      style="background:<?= esc($creator['color']) ?>">
                    <i class="fa fa-play"></i>
                </span>

                <div class="levelup-creator-info">
                    <strong><?= esc($creator['name']) ?></strong>
                    <small>
                        <?= esc($creator['game']) ?>
                        <?php if ($creator['live']): ?>
                            • <?= esc($creator['viewers']) ?> live
                        <?php else: ?>
                            • offline
                        <?php endif; ?>
                    </small>
                </div>

                <?php if ($creator['live']): ?>
                    <span class="levelup-live-badge">LIVE</span>
                <?php endif; ?>

            </div>
        <?php endforeach; ?>

    </aside>

    <!-- CENTER: STREAM PLAYER -->
    <main class="levelup-player-center">

        <!-- Stream heading -->
        <section class="levelup-stream-heading">

            <div class="levelup-stream-title">
                <span class="levelup-brand-mark">
                    <i class="fa fa-video-camera"></i>
                </span>

                <div>
                    <h1>Fene_tm — Yakuza 1: Majima Everywhere</h1>
                    <p>Live • 420K viewers • Level Up</p>
                </div>
            </div>

            <div class="levelup-stream-actions">
                <button type="button" class="levelup-button">
                    <i class="fa fa-users"></i> 4.20K
                </button>
                <button type="button" class="levelup-button">
                    <i class="fa fa-search"></i> 1.2K
                </button>
                <button type="button" class="levelup-button">
                    <i class="fa fa-share"></i> Share
                </button>
            </div>

        </section>

        <!-- Video player -->
        <section class="levelup-player-screen">

            <span class="levelup-live-badge levelup-player-live">
                <i class="fa fa-play-circle"></i> LIVE
            </span>

            <span class="levelup-player-viewers">4.20K viewers</span>

            <video
                id="levelup-live-video"
                controls
                playsinline
                preload="metadata"
                aria-label="Level Up Live - Directo"
            ></video>

            <div
                id="levelup-player-status"
                role="status"
                style="position:absolute;bottom:38px;left:12px;z-index:3;padding:6px 10px;background:rgba(0,0,0,.75);border-radius:5px;color:#fff;font-size:12px;"
            >Conectando con el directo...</div>
            <span class="levelup-player-time">00:18:42</span>

            <div class="levelup-player-controls">
                <i class="fa fa-cog"></i>
                <i class="fa fa-search"></i>
            </div>

        </section>

        <!-- Stream information -->
        <section class="levelup-stream-details">

            <div class="levelup-stream-details-top">
                <div>
                    <h2>Yakuza 1: Majima Everywhere</h2>
                    <p>English • Mature content • 18+ only</p>
                </div>

                <span class="levelup-vod-badge">
                    <i class="fa fa-users"></i> 4.20K
                </span>
            </div>

            <div class="levelup-stream-detail-actions">
                <button type="button" class="levelup-button levelup-button-primary">
                    <i class="fa fa-search"></i> Like
                </button>

                <button type="button" class="levelup-button">
                    <i class="fa fa-share"></i> Share
                </button>

                <button type="button" class="levelup-button">
                    <i class="fa fa-gift"></i> Gift
                </button>
            </div>

            <div class="levelup-stream-description">
                Fene_tm is playing through the Kamurocho streets, reacting to Majima encounters, and answering subscriber questions live.
            </div>

        </section>

    </main>

    <!-- RIGHT: LIVE CHAT -->
    <aside class="levelup-chat">

        <div class="levelup-chat-header">
            <strong><i class="fa fa-comment-o"></i> Live Chat</strong>
            <span><i class="fa fa-users"></i> 142</span>
        </div>

        <div class="levelup-chat-messages">

            <?php foreach ($messages as $message): ?>
                <div class="levelup-chat-message">

                    <div class="levelup-chat-user">

                        <span class="levelup-chat-avatar"
                              style="background:<?= esc($message['color']) ?>">
                            <?= esc($message['initial']) ?>
                        </span>

                        <?= esc($message['name']) ?>

                        <?php if ($message['tag'] !== ''): ?>
                            <span class="levelup-chat-tag <?= $message['tag'] === 'SUB' ? 'sub' : '' ?>">
                                <?= esc($message['tag']) ?>
                            </span>
                        <?php endif; ?>

                    </div>

                    <p><?= esc($message['message']) ?></p>

                </div>
            <?php endforeach; ?>

        </div>

        <div class="levelup-chat-composer">

            <input
                type="text"
                placeholder="Write a message..."
                aria-label="Write a chat message"
                disabled
            >

            <div class="levelup-chat-composer-actions">
                <button type="button" disabled>Emoji</button>
                <button type="button" disabled>Send</button>
            </div>

        </div>

    </aside>

</div>


<script src="https://cdn.jsdelivr.net/npm/hls.js@1.6.15/dist/hls.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const video = document.getElementById('levelup-live-video');
    const status = document.getElementById('levelup-player-status');

    const streamUrl = <?= json_encode(base_url('hls/test.m3u8')) ?>;

    function updateStatus(message) {
        status.textContent = message;
    }

    video.addEventListener('error', function () {
        updateStatus('No se ha podido reproducir el directo.');
    });

    // Safari y navegadores con soporte HLS nativo
    if (video.canPlayType('application/vnd.apple.mpegurl')) {
        video.src = streamUrl;

        video.addEventListener('loadedmetadata', function () {
            updateStatus('Directo disponible. Pulsa reproducir.');
        });

    // Chrome, Firefox y otros navegadores mediante HLS.js
    } else if (window.Hls && Hls.isSupported()) {
        const hls = new Hls({
            enableWorker: true
        });

        hls.loadSource(streamUrl);
        hls.attachMedia(video);

        hls.on(Hls.Events.MANIFEST_PARSED, function () {
            updateStatus('Directo disponible. Pulsa reproducir.');
        });

        hls.on(Hls.Events.ERROR, function (event, data) {
            if (!data.fatal) {
                return;
            }

            if (data.type === Hls.ErrorTypes.NETWORK_ERROR) {
                updateStatus('Reconectando con el directo...');
                hls.startLoad();
            } else if (data.type === Hls.ErrorTypes.MEDIA_ERROR) {
                updateStatus('Recuperando la reproducción...');
                hls.recoverMediaError();
            } else {
                updateStatus('No se ha podido establecer la conexión con el directo.');
                hls.destroy();
            }
        });

    } else {
        updateStatus('Este navegador no es compatible con la reproducción HLS.');
    }
});
</script>

<?= $this->endSection() ?>
