create table password_resets
(
    email      varchar(191) not null,
    token      varchar(191) not null,
    created_at timestamp    null
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

create index password_resets_email_index
    on password_resets (email);

