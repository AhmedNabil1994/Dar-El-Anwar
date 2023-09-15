create table contact_us
(
    id                  bigint unsigned auto_increment
        primary key,
    name                varchar(191)    not null,
    email               varchar(191)    not null,
    contact_us_issue_id bigint unsigned null,
    message             text            null,
    created_at          timestamp       null,
    updated_at          timestamp       null
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

