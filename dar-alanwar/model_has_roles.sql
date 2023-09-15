create table model_has_roles
(
    role_id    bigint unsigned not null,
    model_type varchar(191)    not null,
    model_id   bigint unsigned not null,
    primary key (role_id, model_id, model_type)
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

create index model_has_roles_model_id_model_type_index
    on model_has_roles (model_id, model_type);

