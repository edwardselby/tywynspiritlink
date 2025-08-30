<?php

$parameters = array(
    'db_driver' => 'pdo_mysql',
    'db_host' => getenv('MAUTIC_DB_HOST') ?: 'mysql',
    'db_port' => '3306',
    'db_name' => getenv('MAUTIC_DB_NAME') ?: 'mautic',
    'db_user' => getenv('MAUTIC_DB_USER') ?: 'mautic',
    'db_password' => getenv('MAUTIC_DB_PASSWORD') ?: '',
    'db_table_prefix' => null,
    'db_backup_tables' => 0,
    'db_backup_prefix' => 'bak_',
    
    'cache_adapter' => 'mautic.cache.adapter.redis',
    'cache_prefix' => 'app_',
    'cache_lifetime' => '86400',
    
    'redis_host' => getenv('REDIS_HOST') ?: 'redis',
    'redis_port' => getenv('REDIS_PORT') ?: '6379',
    'redis_password' => null,
    'redis_timeout' => null,
    'redis_persistent' => null,
    'redis_db_id' => null,
    
    'site_url' => getenv('MAUTIC_SITE_URL') ?: 'http://localhost:8080',
    'secret_key' => getenv('MAUTIC_SECRET_KEY') ?: 'changeme_generate_random_32_chars',
    
    'mailer_from_name' => getenv('MAUTIC_FROM_NAME') ?: 'Mautic',
    'mailer_from_email' => getenv('MAUTIC_FROM_EMAIL') ?: 'email@example.com',
    'mailer_transport' => 'smtp',
    'mailer_host' => getenv('SMTP_HOST') ?: 'localhost',
    'mailer_port' => getenv('SMTP_PORT') ?: '25',
    'mailer_user' => getenv('SMTP_USER') ?: null,
    'mailer_password' => getenv('SMTP_PASSWORD') ?: null,
    'mailer_encryption' => getenv('SMTP_ENCRYPTION') ?: null,
    'mailer_auth_mode' => 'plain',
    'mailer_spool_type' => 'memory',
    
    'default_timezone' => getenv('TZ') ?: 'UTC',
    'locale' => 'en_US',
    
    'cors_restrict_domains' => true,
    'cors_valid_domains' => array(),
    
    'trusted_hosts' => array(),
    'trusted_proxies' => array('0.0.0.0/0'),
    
    'do_not_track' => false,
    'track_contact_by_ip' => false,
    'track_by_fingerprint' => false,
    'track_by_tracking_url' => true,
    
    'email_frequency_number' => null,
    'email_frequency_time' => null,
    
    'parallel_import_limit' => 1,
    'background_import_if_more_rows_than' => 0,
    
    'max_entity_lock_time' => 0,
    'enable_clickthrough' => true,
    
    'link_shortener_url' => null,
    'shortener_height' => 480,
    'shortener_width' => 640
);