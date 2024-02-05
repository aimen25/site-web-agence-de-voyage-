<?php function convertCurrency($amount, $from, $to) {
    $apiKey = '0b74b738a419e899b665f7ee';
    $apiUrl = "https://v6.exchangerate-api.com/v6/$apiKey/pair/$from/$to";

    try {
        $response = file_get_contents($apiUrl);
        if ($response === FALSE) {
            throw new Exception("Erreur lors de la récupération des données de l'API.");
        }

        $data = json_decode($response, true);
        if ($data['result'] == 'error') {
            throw new Exception("Erreur de l'API : " . $data['error-type']);
        }

        $rate = $data['conversion_rate'];
        return round($amount * $rate, 4);
    } catch (Exception $e) {
        // Gérer l'exception ici
        return "Erreur : " . $e->getMessage();
    }
}
?>