<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($pageTitle ?? 'Level Up Live') ?></title>

    <link rel="stylesheet" href="<?= base_url('assets/css/levelup-streaming.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="levelup-body">

    <?php
        // Detectamos la sección actual, incluyendo las páginas secundarias.
        $currentPath = trim(service('uri')->getPath(), '/');

        $isHomeActive = ($currentPath === '');
        $isStreamsActive = (
            $currentPath === 'streams'
            || strpos($currentPath, 'streams/') === 0
        );
        $isVodActive = (
            $currentPath === 'vod'
            || strpos($currentPath, 'vod/') === 0
        );
    ?>

    <header class="levelup-header">
        <div class="levelup-topbar">
            <a href="<?= base_url('/') ?>" class="levelup-brand" aria-label="Level Up Live - Home">
                <img
                    src="<?= base_url('assets/img/Level Up Live Logo.png') ?>"
                    class="levelup-brand-logo"
                    alt="Level Up Live"
                >
            </a>

            <input
                type="search"
                class="levelup-search"
                placeholder="Search streams, VODs, or creators"
                aria-label="Search streams, VODs, or creators"
            >

            <div class="levelup-toolbar-actions">
                <button type="button" class="levelup-button levelup-button-primary">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                    <span>Go Live</span>
                </button>

                <button type="button" class="levelup-button" aria-label="Notifications">
                    <i class="fa fa-bell-o" aria-hidden="true"></i>
                </button>

                <button type="button" class="levelup-button" aria-label="User profile">
                    <i class="fa fa-user-o" aria-hidden="true"></i>
                </button>
            </div>
        </div>

        <nav class="levelup-nav" aria-label="Main navigation">
            <button
                type="button"
                class="levelup-sidebar-toggle"
                id="levelupSidebarToggle"
                aria-label="Collapse sidebar"
                aria-controls="levelupFollowingSidebar"
                aria-expanded="true"
            >
                <i class="fa fa-bars" aria-hidden="true"></i>
            </button>

            <a
                href="<?= base_url('/') ?>"
                class="<?= $isHomeActive ? 'active' : '' ?>"
                <?= $isHomeActive ? 'aria-current="page"' : '' ?>
            >
                <i class="fa fa-home" aria-hidden="true"></i>
                <span>Discover</span>
            </a>

            <a
                href="<?= base_url('streams') ?>"
                class="<?= $isStreamsActive ? 'active' : '' ?>"
                <?= $isStreamsActive ? 'aria-current="page"' : '' ?>
            >
                <i class="fa fa-video-camera" aria-hidden="true"></i>
                <span>Live Streams</span>
            </a>

            <a
                href="<?= base_url('vod') ?>"
                class="<?= $isVodActive ? 'active' : '' ?>"
                <?= $isVodActive ? 'aria-current="page"' : '' ?>
            >
                <i class="fa fa-play-circle" aria-hidden="true"></i>
                <span>Video on Demand</span>
            </a>
        </nav>
    </header>

    <div class="levelup-workspace">
        <aside class="levelup-sidebar" id="levelupFollowingSidebar" aria-label="Following creators">
            <div class="levelup-sidebar-heading">
                <h2>Following</h2>
                <a href="<?= base_url('streams') ?>">View all</a>
            </div>

            <?php
                $creators = [
                    ['name' => 'Ninja', 'game' => 'Fortnite', 'status' => 'LIVE', 'initial' => 'N'],
                    ['name' => 'Shroud', 'game' => 'Counter-Strike 2', 'status' => 'LIVE', 'initial' => 'S'],
                    ['name' => 'Ibai', 'game' => 'Just Chatting', 'status' => 'LIVE', 'initial' => 'I'],
                    ['name' => 'Pokimane', 'game' => 'Valorant', 'status' => 'OFF', 'initial' => 'P'],
                    ['name' => 'Rubius', 'game' => 'Minecraft', 'status' => 'OFF', 'initial' => 'R'],
                ];
            ?>

            <?php foreach ($creators as $creator): ?>
                <div class="levelup-creator">
                    <span class="levelup-avatar" aria-hidden="true"><?= esc($creator['initial']) ?></span>
                    <div class="levelup-creator-info">
                        <strong><?= esc($creator['name']) ?></strong>
                        <small><?= esc($creator['game']) ?></small>
                    </div>
                    <?php if ($creator['status'] === 'LIVE'): ?>
                        <span class="levelup-live-badge">LIVE</span>
                    <?php else: ?>
                        <span class="levelup-vod-badge">OFF</span>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </aside>

        <button type="button" class="levelup-sidebar-backdrop" id="levelupSidebarBackdrop" aria-label="Close sidebar"></button>

        <main class="levelup-page-content">
            <?= $this->renderSection('content') ?>
        </main>
    </div>

    <script>
        (() => {
            const body = document.body;
            const toggle = document.getElementById('levelupSidebarToggle');
            const backdrop = document.getElementById('levelupSidebarBackdrop');
            const sidebar = document.getElementById('levelupFollowingSidebar');
            const mobileQuery = window.matchMedia('(max-width: 650px)');

            if (!toggle || !backdrop || !sidebar) return;

            const isMobile = () => mobileQuery.matches;
            const setMobileOpen = (open) => {
                body.classList.toggle('levelup-sidebar-open', open);
                toggle.setAttribute('aria-expanded', String(open));
                toggle.setAttribute('aria-label', open ? 'Close sidebar' : 'Open sidebar');
            };

            toggle.addEventListener('click', () => {
                if (isMobile()) {
                    setMobileOpen(!body.classList.contains('levelup-sidebar-open'));
                } else {
                    const collapsed = body.classList.toggle('levelup-sidebar-collapsed');
                    toggle.setAttribute('aria-expanded', String(!collapsed));
                    toggle.setAttribute('aria-label', collapsed ? 'Expand sidebar' : 'Collapse sidebar');
                }
            });

            backdrop.addEventListener('click', () => setMobileOpen(false));
            document.addEventListener('keydown', (event) => {
                if (event.key === 'Escape') setMobileOpen(false);
            });

            const handleBreakpoint = () => {
                setMobileOpen(false);
                body.classList.remove('levelup-sidebar-collapsed');
                toggle.setAttribute('aria-expanded', 'true');
                toggle.setAttribute('aria-label', isMobile() ? 'Open sidebar' : 'Collapse sidebar');
            };
            mobileQuery.addEventListener?.('change', handleBreakpoint);
        })();
    </script>

</body>
</html>
