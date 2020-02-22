<?php
const ACCESS_PROFILE = 1;   // 000001
const ACCESS_COMMENTS = 2;  // 000010
const ACCESS_VIDEO = 4;     // 000100
const ACCESS_AUDIO = 8;     // 001000
const ACCESS_CHAT = 16;     // 010000
const ACCESS_PHOTO = 32;    // 100000
const ACCESS_LIVE = 64;    // 100000

$accessTable = [
    'profile' => ACCESS_PROFILE,
    'comments' => ACCESS_COMMENTS,
    'video' => ACCESS_VIDEO,
    'audio' => ACCESS_AUDIO,
    'chat' => ACCESS_CHAT ,
    'photo' => ACCESS_PHOTO ,
];

echo '<pre>';
print_r(array_map(function(int $access){
    return decbin($access);
}, $accessTable));


$userAccessMask = ACCESS_PROFILE | ACCESS_VIDEO | ACCESS_CHAT;

print_r([
    '$userAccessMask' => $userAccessMask,
    '$userAccessMaskBin' => decbin($userAccessMask),
]);

function isAccessGranted(int $userMask, $access)
{
    return $userMask & $access;
}

foreach ($accessTable as $accessName => $accessBit) {
    echo $accessName . ': ' . (isAccessGranted($userAccessMask, $accessBit) ? 'да' : 'нет') . '<br />';
}

// ** pack int

$userGender = 12345;
$userAge = 45;

$ageGenderMask = $userGender << 32 | $userAge;

$extractedAge = $ageGenderMask & 0xFFFFFFFF;
$extractedGender = $ageGenderMask >> 32;

var_dump([
    '$userGender-bin' => decbin($userGender),
    '$userAge-bin' => decbin($userAge),
    '$ageGenderMask' => $ageGenderMask,
    '$ageGenderMask-bin' => decbin($ageGenderMask),
    '0xFFFFFFFF' => 0xFFFFFFFF,
    '0xFFFFFFFF-bin' => decbin(0xFFFFFFFF),
    '$extractedAge' => $extractedAge,
    '$extractedGender' => $extractedGender,
]);