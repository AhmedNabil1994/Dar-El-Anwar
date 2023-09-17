create table order_billing_addresses
(
    id                      bigint unsigned auto_increment
        primary key,
    order_id                bigint                   not null,
    country_id              bigint                   null,
    state_id                bigint                   null,
    city_id                 bigint                   null,
    first_name              varchar(100)             not null,
    last_name               varchar(100)             not null,
    email                   varchar(120)             not null,
    street_address          varchar(191)             not null,
    zip_code                varchar(191)             null,
    phone_number            varchar(191)             null,
    set_as_shipping_address varchar(10) default 'no' not null comment 'yes, no',
    created_at              timestamp                null,
    updated_at              timestamp                null
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

