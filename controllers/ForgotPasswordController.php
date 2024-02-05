<?php
// controllers/ForgotPasswordController.php

include_once 'models/UserModel.php';

class ForgotPasswordController {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function resetPasswordRequest($email) {
        if ($this->model->checkEmailExists($email)) {
            $token = bin2hex(random_bytes(50));
            if ($this->model->updateResetToken($email, $token)) {
                return ['token' => $token, 'success' => true];
            }
        }
        return ['success' => false];
    }
}
?>
