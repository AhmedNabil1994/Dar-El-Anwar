create table parent_infos
(
    id                      int unsigned auto_increment
        primary key,
    student_id              bigint unsigned      not null,
    name                    varchar(191)         not null,
    profession              varchar(191)         null,
    national_id             varchar(191)         not null,
    phone_number            varchar(191)         null,
    whatsapp_number         varchar(191)         null,
    follow_up_person        varchar(191)         null,
    relationship            varchar(191)         null,
    student_pickup_optional tinyint(1) default 0 not null,
    parents_marital_status  varchar(191)         null,
    parents_id_card         varchar(191)         null,
    created_at              timestamp            null,
    updated_at              timestamp            null,
    email                   varchar(250)         null,
    constraint parent_infos_father_national_id_unique
        unique (national_id)
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

