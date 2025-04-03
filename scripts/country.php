<?php
defined('CONTROL') or  die('Acesso Inválido');


$api = new ApiConsumer();
$country = $_GET['country_name'] ?? null;

if (!$country) {
    header('Location: ?route=home');
    die();
}
// get country data

$country_data = $api->get_country($country);
?>



<div class="container mt-5 d-flex flex-column align-items-center">
    <div class="d-flex flex-column flex-md-row align-items-center gap-4 mb-4">
        <!-- Flag Card -->
        <div class="card p-2 shadow">
            <img
                src="<?= $country_data[0]['flags']['png'] ?>"
                alt="Bandeira de <?= $country_data[0]['name']['common'] ?>"
                class="img-fluid">
        </div>

        <!-- Country Information-->
        <div class="text-center text-md-start">
            <h1 class="display-4 fw-bold"><?= $country_data[0]['name']['common'] ?></h1>
            <p class="mb-1">Capital:</p>
            <h4 class="mb-3"><?= $country_data[0]['capital'][0] ?></h4>
        </div>
    </div>

    <!-- Additional Details -->
    <div class="row justify-content-center text-center mt-3">
        <div class="col-md-8">
            <div class="d-flex flex-wrap justify-content-center gap-4">
                <div>
                    <p class="mb-1">Região:</p>
                    <strong><?= $country_data[0]['region'] ?></strong>
                </div>
                <div>
                    <p class="mb-1">Sub-Região:</p>
                    <strong><?= $country_data[0]['subregion'] ?></strong>
                </div>
                <div>
                    <p class="mb-1">População:</p>
                    <strong><?= number_format($country_data[0]['population'], 0, ',', '.') ?></strong> habitantes
                </div>
                <div>
                    <p class="mb-1">Área:</p>
                    <strong><?= number_format($country_data[0]['area'], 0, ',', '.') ?></strong> km²
                </div>
            </div>
        </div>
    </div>

    <!-- Back Button -->
    <div class="mt-5 text-center">
        <a href="?route=home" class="btn btn-primary px-5">Voltar</a>
    </div>
</div>