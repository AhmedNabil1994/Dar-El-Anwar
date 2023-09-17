create table order_items
(
    id                   bigint unsigned auto_increment
        primary key,
    order_id             bigint                     not null,
    user_id              bigint                     not null,
    owner_user_id        bigint                     null,
    bundle_id            bigint unsigned            null,
    course_id            bigint                     null,
    product_id           bigint                     null,
    consultation_slot_id bigint unsigned            null,
    consultation_date    varchar(191)               null,
    unit                 int           default 1    not null,
    unit_price           decimal(8, 2) default 0.00 not null,
    admin_commission     decimal(8, 2) default 0.00 not null,
    owner_balance        decimal(8, 2) default 0.00 not null,
    sell_commission      int           default 0    not null comment 'How much percentage get admin and calculate in admin_commission',
    type                 tinyint       default 1    not null comment '1=course, 2=product, 3=bundle course, 4=consultation',
    created_at           timestamp                  null,
    updated_at           timestamp                  null
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

