create table stores
(
    id              bigint unsigned auto_increment
        primary key,
    product_code    varchar(191)  not null,
    product_barcode varchar(191)  null,
    category        varchar(191)  not null,
    unit            varchar(191)  not null,
    price           decimal(8, 2) not null,
    quantity        int           not null,
    supplier        varchar(191)  null,
    receiver        varchar(191)  null,
    description     text          null,
    image           varchar(191)  null,
    created_at      timestamp     null,
    updated_at      timestamp     null,
    remain          decimal(8, 2) null,
    branch_id       int           null,
    creditor        varchar(250)  null,
    student_id      varchar(255)  null
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

