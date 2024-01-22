<?php
    function alertas_error($mensagem)
    {
        $tipo = "alert-danger";
        echo '<div class="alert ' . $tipo . ' alert-dismissible fade show" role="alert">' . $mensagem . '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    }
?>