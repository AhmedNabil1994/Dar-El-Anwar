create table metas
(
    id               bigint unsigned auto_increment
        primary key,
    uuid             char(36)     not null,
    url              varchar(191) null,
    page_name        varchar(191) null,
    meta_title       mediumtext   null,
    meta_description mediumtext   null,
    meta_keyword     mediumtext   null,
    created_at       timestamp    null,
    updated_at       timestamp    null,
    constraint metas_uuid_unique
        unique (uuid)
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

