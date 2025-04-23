<body>
    <?php if (\Core\Session::has('toast')): ?>
    <div class="toast" style="position: fixed; right: 20px; bottom: 20px; background-color: #333; color: white; padding: 10px 20px; border-radius: 5px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2); opacity: 0; animation: slideIn 3s forwards, fadeOut 3s 4s forwards;">
        <?= \Core\Session::getFlash('toast') ?>
    </div>
    <?php endif; ?>
<style>
    @keyframes slideIn {
        0% {
            right: -300px;
            opacity: 0;
        }
        100% {
            right: 20px;
            opacity: 1;
        }
    }

    @keyframes fadeOut {
        0% {
            opacity: 1;
        }
        100% {
            opacity: 0;
            right: -300px;
        }
    }
</style>
