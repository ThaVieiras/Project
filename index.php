<?php include 'layouts/header.php'; ?>

<main class="w-100 m-auto form-container">
    <form action="show_zodiac_sign.php" method="POST">
        <h1 class="h3 mb-3 fw-normal text-center">Qual é o seu Signo?</h1>
        <div class="form-floating mb-3">
            <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" required>
            <label for="data_nascimento">Data de Nascimento</label>
        </div>
        <button class="btn btn-primary w-100 py-2" type="submit">Descobrir Signo</button>
        <p class="mt-5 mb-3 text-body-secondary text-center">&copy; 2025</p>
    </form>
</main>

</body>
</html>