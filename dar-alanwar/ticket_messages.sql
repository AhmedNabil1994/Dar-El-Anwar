create table ticket_messages
(
    id                  bigint unsigned auto_increment
        primary key,
    ticket_id           bigint unsigned null,
    sender_user_id      bigint unsigned null,
    reply_admin_user_id bigint unsigned null,
    message             longtext        null,
    file                varchar(191)    null,
    created_at          timestamp       null,
    updated_at          timestamp       null
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

