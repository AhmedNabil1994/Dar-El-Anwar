create table booking_histories
(
    id                     bigint unsigned auto_increment
        primary key,
    uuid                   char(36)          not null,
    order_id               bigint unsigned   not null,
    order_item_id          bigint unsigned   not null,
    instructor_user_id     bigint unsigned   not null,
    student_user_id        bigint unsigned   not null,
    consultation_slot_id   bigint unsigned   not null,
    date                   varchar(191)      not null,
    day                    tinyint           not null comment '0=sunday,1=monday,2=tuesday,3=wednesday,4=thursday,5=friday,6=saturday',
    time                   varchar(191)      not null,
    duration               varchar(191)      not null,
    status                 tinyint           not null comment '0=Pending,1=Approve,2=Cancel,3=Completed',
    type                   tinyint default 1 not null comment '1=In-person,2=Online',
    start_url              mediumtext        null,
    join_url               mediumtext        null,
    meeting_id             varchar(191)      null,
    meeting_password       varchar(191)      null,
    meeting_host_name      varchar(191)      null comment 'zoom,bbb,jitsi',
    moderator_pw           varchar(191)      null comment 'use only for bbb',
    attendee_pw            varchar(191)      null comment 'use only for bbb',
    cancel_reason          mediumtext        null,
    send_back_money_status tinyint default 0 null comment '1=Yes, 0=No',
    back_admin_commission  varchar(191)      null comment 'Admin Commission',
    back_owner_balance     varchar(191)      null comment 'Instructor Commission',
    created_at             timestamp         null,
    updated_at             timestamp         null,
    constraint booking_histories_uuid_unique
        unique (uuid)
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

