create table chat_messages
(
    id                bigint unsigned auto_increment
        primary key,
    incoming_user_id  bigint unsigned   null,
    outgoing_user_id  bigint unsigned   null,
    message           longtext          null,
    view              tinyint default 2 null comment '1=seen,2=not seen',
    created_user_type tinyint           null comment '1=student,2=instructor',
    created_at        timestamp         null,
    updated_at        timestamp         null
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

