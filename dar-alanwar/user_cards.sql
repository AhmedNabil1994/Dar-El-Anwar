create table user_cards
(
    id               bigint unsigned auto_increment
        primary key,
    uuid             char(36)     not null,
    user_id          bigint       not null,
    card_number      varchar(191) not null,
    card_holder_name varchar(191) not null,
    month            int          not null,
    year             year         not null,
    created_at       timestamp    null,
    updated_at       timestamp    null,
    constraint user_cards_uuid_unique
        unique (uuid)
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

