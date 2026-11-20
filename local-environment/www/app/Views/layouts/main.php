
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

    <header>
        <div class="levelup-topbar">
            <a href="<?= base_url('/') ?>" class="levelup-brand">
                <span class="levelup-brand-mark">
                    <i class="fa fa-gamepad"></i>
                </span>
                <span>Level Up Live</span>
            </a>

            <div>
                <i class="fa fa-search"></i>
            </div>
        </div>

        <nav class="levelup-nav">
            <a href="<?= base_url('/') ?>" class="active">
                <i class="fa fa-home"></i> Discover
            </a>
            <a href="<?= base_url('streams') ?>">
                <i class="fa fa-video-camera"></i> Live Streams
            </a>
            <a href="#following">
                <i class="fa fa-users"></i> Following
            </a>
            <a href="#games">
                <i class="fa fa-gamepad"></i> Browse Games
            </a>
            <a href="#schedule">
                <i class="fa fa-calendar"></i> Schedule
            </a>
        </nav>
    </header>

    <div class="levelup-toolbar">
        <a href="<?= base_url('/') ?>" class="levelup-toolbar-brand">
            <span class="levelup-brand-mark">
                <i class="fa fa-video-camera"></i>
            </span>
            <span>
                <strong>Level Up</strong>
                <small>Live streams and VODs</small>
            </span>
        </a>

        <input
            type="search"
            class="levelup-search"
            placeholder="Search streams, VODs, or creators"
            aria-label="Search streams, VODs, or creators"
        >

        <div class="levelup-toolbar-actions">
            <button type="button" class="levelup-button levelup-button-primary">
                <i class="fa fa-plus"></i> Go Live
            </button>

            <button type="button" class="levelup-button" aria-label="Notifications">
                <i class="fa fa-bell-o"></i>
            </button>

            <button type="button" class="levelup-button" aria-label="User">
                <i class="fa fa-user-o"></i>
            </button>
        </div>
    </div>

    <main>
        <?= $this->renderSection('content') ?>
    </main>

</body>
</html>
