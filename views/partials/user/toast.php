<body>
<?php if (\Core\Session::has('toast')): ?>

<div>
<!--    Toast-->
    <div style="position: fixed;
    right: 0; bottom: 0;
    background-color:black; color: white; padding-inline: 1rem; padding-block: 0.5rem;
    margin: 10px;
    border-radius: 5px;
">
        <?= \Core\Session::getFlash('toast') ?>
    </div>
</div>
<?php endif; ?>