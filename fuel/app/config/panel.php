<?php
return [
    // Enable/Disabled the registration page
    'registration' => true,

    // Force use to have an invite code when register
    'invitation' => false,

    // Limit the number of user connected to server
    'queue' => false,
    'max_connected' => 0, // need queue true

    // Alow anyone to use guest account with retricted permissions
    // No download and no watching
    'guest' => false,

    // Enable/Disabled the achievements
    'achievements' => false,

    // Allow anyone to add plex server
    'add_server' => true,

    // Allow user to create sub-account
    'sub_accounts' => true,
];