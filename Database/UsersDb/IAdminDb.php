<?php 

    namespace Database\UsersDb;

    use Models\Users\Admin as Admin;

    interface IAdminDb
    {
        function getAll();
        function add(Admin $admin);
        function delete(int $adminId);
        function update(Admin $admin);
        function mapping($value);
    }

?>