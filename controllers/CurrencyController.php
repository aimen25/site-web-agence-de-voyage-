<?php
class CurrencyController {
    public function changeCurrency($currency) {
        $_SESSION['currency'] = $currency;
        $this->redirectToPreviousPage();
    }

    private function redirectToPreviousPage() {
        $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php';
        header("Location: $redirect");
        exit();
    }
}
?>
