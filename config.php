<?php
declare(strict_types=1);

date_default_timezone_set('Africa/Casablanca');

const SITE_NAME = 'Omary';
const SITE_TAGLINE = "Apprendre en s'amusant";
const ADMIN_PASSWORD = 'Omar@2026'; // À remplacer plus tard par une version hashée
const GALLERY_DIR = __DIR__ . '/uploads/gallery/';
const GALLERY_URL = 'uploads/gallery/';
const MAX_UPLOAD_SIZE = 5 * 1024 * 1024; // 5 Mo

const ALLOWED_IMAGE_TYPES = [
    'image/jpeg' => 'jpg',
    'image/png'  => 'png',
    'image/gif'  => 'gif',
    'image/webp' => 'webp',
];

if (session_status() === PHP_SESSION_NONE) {
    session_set_cookie_params([
        'httponly' => true,
        'samesite' => 'Lax',
        'secure' => isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off',
    ]);
    session_start();
}
