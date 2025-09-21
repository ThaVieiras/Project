<?php include 'layouts/header.php'; ?>

<main class="w-100 m-auto result-container">
    <div class="text-center">
        <?php
        if (isset($_POST['data_nascimento']) && !empty($_POST['data_nascimento'])) {
            $data_nascimento_str = $_POST['data_nascimento'];
            $signos_xml = simplexml_load_file('signos.xml');
            $data_nascimento_obj = new DateTime($data_nascimento_str);

            $signo_encontrado_nome = null;
            $signo_encontrado_desc = null;

            foreach ($signos_xml->signo as $signo) {
                $ano_nascimento = $data_nascimento_obj->format('Y');
                $data_inicio_obj = DateTime::createFromFormat('d/m/Y', $signo->dataInicio . '/' . $ano_nascimento);
                $data_fim_obj = DateTime::createFromFormat('d/m/Y', $signo->dataFim . '/' . $ano_nascimento);

                if ($signo->signoNome == "Capricórnio") {
                    if ($data_nascimento_obj->format('m') == 1) {
                         if ($data_nascimento_obj <= $data_fim_obj) {
                            $signo_encontrado_nome = $signo->signoNome;
                            $signo_encontrado_desc = $signo->descricao;
                            break;
                         }
                    } else {
                         if ($data_nascimento_obj >= $data_inicio_obj) {
                            $signo_encontrado_nome = $signo->signoNome;
                            $signo_encontrado_desc = $signo->descricao;
                            break;
                         }
                    }
                } else {
                    if ($data_nascimento_obj >= $data_inicio_obj && $data_nascimento_obj <= $data_fim_obj) {
                        $signo_encontrado_nome = $signo->signoNome;
                        $signo_encontrado_desc = $signo->descricao;
                        break;
                    }
                }
            }

            if ($signo_encontrado_nome) {
                echo "<h1 class='h3 mb-3 fw-normal'>Seu signo é...</h1>";
                echo "<div class='card'><div class='card-body'>";
                echo "<h2 class='card-title'>{$signo_encontrado_nome}</h2>";
                echo "<p class='card-text'>{$signo_encontrado_desc}</p>";
                echo "</div></div>";
            } else {
                echo "<p class='alert alert-danger'>Não foi possível determinar o seu signo.</p>";
            }
        } else {
            echo "<p class='alert alert-warning'>Por favor, informe uma data de nascimento válida.</p>";
        }
        ?>
        <a href="index.php" class="btn btn-secondary w-100 py-2 mt-4">Voltar</a>
    </div>
</main>

</body>
</html>