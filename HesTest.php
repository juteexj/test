<?php

namespace Funct\Test;

use Funct;

function getGirlFriends($users)
{
    $copyUsers = $users;

    $friends = array_map(function ($friend) {
        return $friend['friends'];
    }, $copyUsers);
    $friends = Funct/Collection/flatten($friends);

    $girlFriends = array_filter($friends, function ($friend) {
        return ($friend['gender'] === 'female');
    });

    return array_values($girlFriends);
}

getGirlFriends($users = [
    ['name' => 'Tirion', 'friends' => [
        ['name' => 'Mira', 'gender' => 'female'],
        ['name' => 'Ramsey', 'gender' => 'male']
    ]],
    ['name' => 'Bronn', 'friends' => []],
    ['name' => 'Sam', 'friends' => [
        ['name' => 'Aria', 'gender' => 'female'],
        ['name' => 'Keit', 'gender' => 'female']
    ]],
    ['name' => 'Rob', 'friends' => [
        ['name' => 'Taywin', 'gender' => 'male']
    ]],
]);
