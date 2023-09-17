create table model_has_permissions
(
    permission_id bigint unsigned not null,
    model_type    varchar(191)    not null,
    model_id      bigint unsigned not null
)
    collate = utf8mb4_unicode_ci;

