create table languages
(
    id               bigint unsigned auto_increment
        primary key,
    language         varchar(191)         not null,
    iso_code         varchar(191)         not null,
    flag             varchar(191)         null,
    rtl              tinyint    default 0 not null,
    status           tinyint(1) default 1 not null comment '1=active,2=inactive',
    default_language varchar(191)         null comment 'on,off',
    created_at       timestamp            null,
    updated_at       timestamp            null,
    constraint languages_iso_code_unique
        unique (iso_code),
    constraint languages_language_unique
        unique (language)
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

