<?php

function generateUuidV4() {
    $data = random_bytes(16);

    // Set version to 4 (random UUID)
    $data[6] = chr((ord($data[6]) & 0x0F) | 0x40);

    // Set variant to DCE 1.1
    $data[8] = chr((ord($data[8]) & 0x3F) | 0x80);

    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}
