create table admin_has_permissions
(
    permission_id bigint unsigned not null,
    model_type    varchar(191)    not null,
    model_id      bigint unsigned not null,
    primary key (permission_id, model_id, model_type)
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

create index model_has_permissions_model_id_model_type_index
    on admin_has_permissions (model_id, model_type);

