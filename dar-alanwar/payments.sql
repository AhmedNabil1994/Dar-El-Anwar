create table payments
(
    id              bigint unsigned auto_increment
        primary key,
    amount          decimal(10, 2)                           not null,
    status          enum ('paid', 'unpaid') default 'unpaid' not null,
    subscription_id bigint unsigned                          not null,
    created_at      timestamp                                null,
    updated_at      timestamp                                null
)
    collate = utf8mb4_unicode_ci;

