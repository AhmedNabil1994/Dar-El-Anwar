create table role_has_permissions
(
    permission_id bigint unsigned not null,
    role_id       bigint unsigned not null,
    primary key (permission_id, role_id)
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

create index role_has_permissions_role_id_foreign
    on role_has_permissions (role_id);

