create table governorates
(
    id                  int unsigned auto_increment
        primary key,
    governorate_name_ar varchar(191) not null,
    governorate_name_en varchar(191) not null,
    created_at          timestamp    null,
    updated_at          timestamp    null
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

