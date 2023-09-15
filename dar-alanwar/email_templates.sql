create table email_templates
(
    id         bigint unsigned auto_increment
        primary key,
    uuid       char(36)          not null,
    name       varchar(191)      not null,
    subject    varchar(191)      not null,
    body       mediumtext        not null,
    status     tinyint default 1 not null comment '0=inactive, 1-active',
    created_at timestamp         null,
    updated_at timestamp         null,
    constraint email_templates_uuid_unique
        unique (uuid)
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

