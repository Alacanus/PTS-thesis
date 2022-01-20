<?php

function register_user(string $email, string $username, string $password, string $fname, string $lname, bool $is_active = false): bool
{
    $sql = 'INSERT INTO users(username, email, password, firstname, lastname, active)
            VALUES(:username, :email, :password, :firstname, :lastname, :is_active)';

    $statement = db()->prepare($sql);

    $statement->bindValue(':username', $username, PDO::PARAM_STR);
    $statement->bindValue(':email', $email, PDO::PARAM_STR);
    $statement->bindValue(':firstname', $fname, PDO::PARAM_STR);
    $statement->bindValue(':lastname', $lname, PDO::PARAM_STR);
    $statement->bindValue(':password', password_hash($password, PASSWORD_BCRYPT), PDO::PARAM_STR);
    $statement->bindValue(':is_active', (int)$is_active, PDO::PARAM_INT);

    return $statement->execute();
}