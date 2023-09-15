create table cart_management
(
    id                          bigint unsigned auto_increment
        primary key,
    user_id                     bigint unsigned            null,
    course_id                   bigint unsigned            null,
    product_id                  bigint unsigned            null,
    consultation_slot_id        bigint unsigned            null,
    consultation_details        text                       null,
    consultation_date           varchar(191)               null,
    consultation_available_type varchar(191)               null,
    bundle_id                   bigint unsigned            null,
    bundle_course_ids           text                       null,
    promotion_id                bigint unsigned            null,
    coupon_id                   bigint unsigned            null,
    main_price                  decimal(8, 2) default 0.00 not null,
    price                       decimal(8, 2) default 0.00 not null,
    discount                    decimal(8, 2) default 0.00 not null,
    created_at                  timestamp                  null,
    updated_at                  timestamp                  null,
    reference                   varchar(191)               null
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

