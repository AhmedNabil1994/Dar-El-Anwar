create table countries
(
    id         int unsigned auto_increment
        primary key,
    name_ar    varchar(191) not null,
    name_en    varchar(191) not null,
    name_fr    varchar(191) not null,
    code       varchar(191) not null,
    created_at timestamp    null,
    updated_at timestamp    null,
    constraint countries_code_unique
        unique (code)
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

