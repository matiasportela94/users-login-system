<?php 

    namespace Database\ResetPasswordDb;

    use Models\ResetPassword\ResetPassword as ResetPassword;

    interface IResetPasswordDb
    {
        function add(ResetPassword $email);
    }
?>