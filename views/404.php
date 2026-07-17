<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found</title>
</head>

<body style="
    margin: 0;
    background-color: #111827;
    color: white;
    font-family: Arial, sans-serif;
">

<div style="
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        padding: 20px;
        box-sizing: border-box;
    ">

    <h1 style="font-size: 60px; margin: 0 0 15px;">
        404
    </h1>

    <h2 style="font-size: 28px; margin: 0 0 20px;">
        Page Not Found
    </h2>

    <?php if (!empty($_SESSION['flash_error'])): ?>

        <p style="font-size: 18px; color: white;">
            <?= htmlspecialchars($_SESSION['flash_error']) ?>
        </p>

        <?php unset($_SESSION['flash_error']); ?>

    <?php else: ?>

        <p style="font-size: 18px; color: white;">
            Sorry, the page you are looking for does not exist.
        </p>

    <?php endif; ?>

    <a href="<?= BASE_URL ?>/"
       style="
               margin-top: 25px;
               padding: 12px 24px;
               border: 2px solid white;
               border-radius: 6px;
               color: white;
               text-decoration: none;
               font-size: 16px;
           ">
        Return Home
    </a>

</div>

</body>
</html>