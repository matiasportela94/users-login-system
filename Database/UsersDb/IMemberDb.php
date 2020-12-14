<?php 

    namespace Database\UsersDb;

    use Models\Users\Member as Member;

    interface IMemberDb
    {
        function getAll();
        function add(Member $member);
        function delete(int $memberId);
        function update(Member $member);
        function mapping($value);
    }

?>